app.controller("LoginFreelancerController", function($scope, $location, LoginService, store, jwtHelper) {
    $scope.dataLoginFreelancer = {};
    $scope.usuario = {};
    
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
                $scope.dataMain.loading = false;
                alert("Login Invalido");
            }
        });
    };
    
});