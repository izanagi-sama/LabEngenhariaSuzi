app.controller("LoginFreelancerController", function($scope, $location, store, jwtHelper, LoginService, FreelancerService) {
    $scope.dataLogin = {
        paginaCadastro: "views/cadastra-freelancer.html",
        erro: null,
        cadastrar: false,
        usuarioCadastra: {},
        usuarioLogin: {}
    };
    
    $scope.mostrarTelaCadastrar = function(ativa) {
        if($scope.dataLogin.cadastrar == ativa) return;
        $scope.dataLogin.erro = null;
        $scope.dataLogin.cadastrar = ativa;
    }
    
    $scope.cadastrar = function(usuario, senha2) {
        if(senha2 != usuario.senha) {
            $scope.dataLogin.erro = "Erro: Senhas são diferentes";
            return;
        }
        $scope.dataMain.loading = true;
        var resposta = FreelancerService.cadastra(usuario);
            resposta.then(function(data) {
            if(data.resultado == true) {
                $scope.dataLogin.erro = null;
                $scope.dataLogin.cadastrar = false;
                $scope.dataMain.loading = false;
            } else {
                $scope.dataLogin.erro = "Erro no Cadastro: " + data.mensagem;
                $scope.dataMain.loading = false;
            }
        });
    };
        
    $scope.login = function(usuario) {
        $scope.dataMain.loading = true;
        var resposta = LoginService.loginFreelancer(usuario.login, usuario.senha);
            resposta.then(function(data) {
            if(data.resultado == true) {
                $scope.isLoged = true;
                store.set('jwt', data.jwt);
                $scope.dataMain.usuario = jwtHelper.decodeToken(data.jwt).data;
                $location.path('/freelancer');
                $scope.dataMain.loading = false;
            } else {
                $scope.dataLogin.erro = "Erro no login: " + data.mensagem;
                $scope.dataMain.loading = false;
            }
        });
    };
    
});