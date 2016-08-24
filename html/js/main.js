var app = angular.module('mporn', ['ngRoute', 'angular-storage', 'angular-jwt']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/', {
        redirectTo: '/inicio'
    }).when('/inicio', {
        templateUrl: 'views/inicio.html',
        controller: 'InicioController'
    }).when('/login', {
        templateUrl: 'views/login.html'
        //TODO: controller: 'LoginController'
    }).otherwise({
        redirectTo: '/'
    });
}]);

app.config(function Config($httpProvider, jwtInterceptorProvider) {
    jwtInterceptorProvider.tokenGetter = ['store', function(store) {
        return store.get('jwt');
    }];

    $httpProvider.interceptors.push('jwtInterceptor');
})

app.controller("MainController", function($scope, $location, store, jwtHelper, LoginService) {
    $scope.dataMain = {isLoged: false, loading: false, usuario: {}};
    
    $scope.telaAtiva = function (viewLocation) { 
        return viewLocation === $location.path();
    };
    
    $scope.logout = function() {
        $scope.dataMain.isLoged = false;
        store.remove('jwt');
        $scope.dataMain.usuario = {};
        $location.path('/');
    }

    $scope.login = function(usuario) {
        $scope.dataMain.loading = true;
        var resposta = LoginService.login(usuario.login, usuario.senha);
            resposta.then(function(data) {
            if(data.resposta == "sucesso") {
                $scope.isLoged = true;
                store.set('jwt', data.jwt);
                $scope.dataMain.usuario = jwtHelper.decodeToken(data.jwt).data;
                $location.path('/home');
                $scope.dataMain.loading = false;
            } else {
                $scope.dataMain.loading = false;
                alert("Login Invalido");
            }
        });
    };
    
    var jwt = store.get('jwt');
    if(store.get('jwt') == null){
        //não logado
        $scope.dataMain.isLoged = false;
        $scope.dataMain.usuario = {};
    } else if(jwtHelper.isTokenExpired(jwt)) {
        //logado, mas o login expirou
        $scope.dataMain.isLoged = false;
        $scope.dataMain.usuario = {};
        store.remove('jwt');
    } else {
        //logado e valido
        $scope.dataMain.usuario = jwtHelper.decodeToken(jwt).data;
        $scope.dataMain.isLoged = true;
    }
});