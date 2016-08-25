var app = angular.module('mporn', ['ngRoute', 'angular-storage', 'angular-jwt']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/', {
        redirectTo: '/inicio'
    }).when('/inicio', {
        templateUrl: 'views/inicio.html',
        controller: 'InicioController'
    }).when('/loginFreelancer', {
        templateUrl: 'views/login.html',
        controller: 'LoginFreelancerController'
    }).when('/freelancer', {
        templateUrl: 'views/freelancer.html',
        controller: 'FreelancerController'
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
        alert("Erro login não implementado");
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