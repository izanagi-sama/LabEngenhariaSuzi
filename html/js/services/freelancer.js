app.factory('FreelancerService', function($http) {
    var urlgetDados = "/php/freelancer/retorna-dados.php";
    var urlSetDados = "/php/freelancer/altera-dados.php";
    var urlCadastra = "/php/freelancer/cadastra.php";

    var getDados = function(filtro) {
        return $http.get(urlgetDados).then(
            function sucesso(respostaServidor) {
                return respostaServidor.data;
            },
            function erro(respostaServidor) {
                return {resultado : false, mensagem: "Erro ao se comunicar com a servidor"};
            });
    };

    var setDados = function(dados) {
        return $http.post(urlSetDados, dados).then(
            function sucesso(respostaServidor) {
                return respostaServidor.data;
            },
            function erro(respostaServidor) {
                return {resultado : false, mensagem: "Erro ao se comunicar com a servidor"};
            });
    };

    var cadastra = function(usuario) {
        return $http.post(urlCadastra, usuario).then(
            function sucesso(respostaServidor) {
                return respostaServidor.data;
            },
            function erro(respostaServidor) {
                return {resultado : false, mensagem: "Erro ao se comunicar com a servidor"};
            });
    };
    
    return {
        getDados: getDados,
        setDados: setDados,
        cadastra: cadastra
    };
});