app.factory('PlanoService', function($http) {
    var url = "/php/planos.php";
    
    var getPlanos = function() {
        return $http.get(url).then(
            function sucesso(respostaServidor) {
                return respostaServidor.data;
            },
            function erro(respostaServidor) {
                return {resultado : false, mensagem: "Erro ao se comunicar com a servidor"};
            });
    }
    
    return {
        getPlanos: getPlanos
    };
});