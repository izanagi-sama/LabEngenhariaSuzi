app.controller("InicioController", function($scope, PlanoService) {
    $scope.dataInicio = {planos: []};
    
    $scope.dataMain.loading = true;
    PlanoService.getPlanos().then(function(data) {
        if(data.planos) {
            $scope.dataInicio.planos = data.planos;
            $scope.dataMain.loading = false;
        }else{
            alert("Erro ao receber dados do servidor");
        }
    });
});