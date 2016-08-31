app.factory('EspecialidadeService', function($http) {
    var urlEspecialidade = "/php/especialidades.php";
    
    var getEspecialidades = function(filtro) {
        return $http.get(urlEspecialidade).then(
            function sucesso(respostaServidor) {
                return respostaServidor.data;
            },
            function erro(respostaServidor) {
                return {resultado : false, mensagem: "Erro ao se comunicar com a servidor"};
            });
    };
    
    return {
        getEspecialidades: getEspecialidades
    };
});