app.controller("FreelancerController", function($scope, $location, store, jwtHelper, TrabalhoService, FreelancerService) {
    $scope.dataFreelancer = {aba: null, disponiveis: [], andamento: [], concluido: [], dados: {}};
    
    $scope.atualizaFreelancerDados = function() {
        if($scope.dataFreelancer.senha2 != $scope.dataFreelancer.dados.senha) {
            alert("Senhas não conferem"); //TODO: Mensagem mais apropriada
            return;
        }
        $scope.dataMain.loading = true;
        FreelancerService.setDados($scope.dataFreelancer.dados).then(function(data) {
            if(data.resultado) {
                $scope.dataMain.loading = false;
            }else{
                alert("Erro ao receber dados do servidor");
            }
        });
    }
    
    $scope.mudaAba = function(estado){
        $scope.dataFreelancer.aba = estado;
        switch(estado) {
            case 'disponivel':
                $scope.dataMain.loading = true;
                TrabalhoService.getDisponiveis().then(function(data) {
                    if(data.trabalhos) {
                        $scope.dataFreelancer.disponiveis = data.trabalhos;
                        $scope.dataMain.loading = false;
                    }else{
                        alert("Erro ao receber dados do servidor");
                    }
                });
                break;
            case 'andamento':
                $scope.dataMain.loading = true;
                TrabalhoService.getAndamento().then(function(data) {
                    if(data.trabalhos) {
                        $scope.dataFreelancer.andamento = data.trabalhos;
                        $scope.dataMain.loading = false;
                    }else{
                        alert("Erro ao receber dados do servidor");
                    }
                });
                break;
            case 'concluido':
                $scope.dataMain.loading = true;
                TrabalhoService.getConcluido().then(function(data) {
                    if(data.trabalhos) {
                        $scope.dataFreelancer.concluido = data.trabalhos;
                        $scope.dataMain.loading = false;
                    }else{
                        alert("Erro ao receber dados do servidor");
                    }
                });
                break;
            case 'info':
                $scope.dataMain.loading = true;
                FreelancerService.getDados().then(function(data) {
                    if(data) {
                        $scope.dataFreelancer.dados = data;
                        $scope.dataFreelancer.senha2 = $scope.dataFreelancer.dados.senha;
                        $scope.dataMain.loading = false;
                    }else{
                        alert("Erro ao receber dados do servidor");
                    }
                });
                break;
        }
    };
    
    $scope.mudaAba('disponivel');
})