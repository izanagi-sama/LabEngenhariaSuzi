app.controller("LoginFreelancerController", function($scope, $location, store, jwtHelper, LoginService, FreelancerService) {
    $scope.dataLogin = {
        paginaCadastro: "views/cadastra-freelancer.html",
        erro: {
                mensagem: null,
                email: {
                    requerido: false,
                    invalido: false
                    },
                senha: {
                    requerido: false,
                    tamanho: false
                    }
            },
        loading: 0,
        data: {}
    };
    
    function loginValido() {
        $scope.dataLogin.erro.email.invalido = $scope.loginForm.emailInput.$error.email === true; //evita undefined
        $scope.dataLogin.erro.email.requerido = $scope.loginForm.emailInput.$error.required === true;
            
        $scope.dataLogin.erro.senha.tamanho = $scope.loginForm.senhaInput.$error.minlength === true;
        $scope.dataLogin.erro.senha.requerido = $scope.loginForm.senhaInput.$error.required === true;
        
        return $scope.loginForm.$valid;
    }
        
    $scope.login = function(usuario) {
        //verificações:
        if(!loginValido()) return;
        
        $scope.dataLogin.loading += 1;
        var resposta = LoginService.loginFreelancer(usuario.email, usuario.senha);
            resposta.then(function(data) {
            if(data.resultado == true) {
                $scope.isLoged = true;
                store.set('jwt', data.jwt);
                $scope.dataMain.usuario = jwtHelper.decodeToken(data.jwt).data;
                $location.path('/freelancer');
                $scope.dataLogin.loading -= 1;
            } else {
                $scope.dataLogin.erro.mensagem = "Erro no login: " + data.mensagem;
                $scope.dataLogin.loading -= 1;
            }
        });
    };
});