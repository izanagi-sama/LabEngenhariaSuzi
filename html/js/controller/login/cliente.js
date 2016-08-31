app.controller("LoginClienteController", function($scope, $location, store, jwtHelper, LoginService) {
    $scope.dataClienteLogin = {
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
        $scope.dataClienteLogin.erro.email.invalido = $scope.loginForm.emailInput.$error.email === true; //evita undefined
        $scope.dataClienteLogin.erro.email.requerido = $scope.loginForm.emailInput.$error.required === true;
            
        $scope.dataClienteLogin.erro.senha.tamanho = $scope.loginForm.senhaInput.$error.minlength === true;
        $scope.dataClienteLogin.erro.senha.requerido = $scope.loginForm.senhaInput.$error.required === true;
        
        return $scope.loginForm.$valid;
    }
        
    $scope.login = function(usuario) {
        //verificações:
        if(!loginValido()) return;
        
        $scope.dataClienteLogin.loading += 1;
        var resposta = LoginService.loginCliente(usuario.email, usuario.senha);
            resposta.then(function(data) {
            if(data.resultado == true) {
                $scope.isLoged = true;
                store.set('jwt', data.jwt);
                $scope.dataMain.usuario = jwtHelper.decodeToken(data.jwt).data;
                $location.path('/cliente');
                $scope.dataClienteLogin.loading -= 1;
            } else {
                $scope.dataClienteLogin.erro.mensagem = "Erro no login: " + data.mensagem;
                $scope.dataClienteLogin.loading -= 1;
            }
        });
    };
});