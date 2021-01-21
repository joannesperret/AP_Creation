/* 
 * ajax.js
 * requête asynchrone permettant de récupérer les noms de villes d'un code postal saisi
 */

     // Execution de la fonction après perte du focus
    // ------------
    function init() {
       $("#itCP").blur(afficherVille);
              
    }
    // fonction ajax de recherche de la ville associée au CP saisi pour alimentation du select
    // ------------
    function chercherVille() {
        $.ajax({
            // la méthode POST est utilisée
            type: "POST",
            // la requête est transmise au contrôleur 'VilleDUnCPObjet.php'
            url: "VilleDUnCPObjet.php",                       
            // le code postal saisi est transmis
            data: { id: $("#itCP").val() },
            dataType: "text",
            // en cas de succés le résultat de la requête est intégré 
            // au Div dont l'id est 'pResultat'
            success: function(data) {
                if(data.length>129){
                console.log(data);
                console.log(data.length);
                $("#pResultat").html(data);
                $("#cpError").html('');
                $("#cpError").removeClass('alert alert-danger');}else{
                $("#cpError").html('Le code postal n\'a pas été trouvé.');
                $("#pResultat").html('');
                $("#cpError").addClass('alert alert-danger');
                }
            },
            // en cas d'erreur, un message est retounrné
            error: function(xhr, statut, erreur) {
                $("#pResultat").html(erreur);
            }
        });     
    }
    // fonction appelée lors de la perte de focus sur le champs de saisi du CP
    function afficherVille(){
        // fonction de déclenchement de la requête Ajax si la CP saisi fait 5 caractères
        if(($("#itCP").val().length===5) && (!isNaN(parseInt($("#itCP").val())))){chercherVille();}
        else{$("#cpError").html('Le code postal est erroné');
            $("#pResultat").html('');
            $("#cpError").addClass('alert alert-danger');
            }
    }

  
    $(document).ready(init);