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
            type: "POST",
            // la requête est transmise au contrôleur 'VilleDUnCPObjet.php'
            url: "VilleDUnCPObjet.php",                       
            
            data: { id: $("#itCP").val() },
            dataType: "text",
            success: function(data) {
                $("#pResultat").html(data);
            },
            error: function(xhr, statut, erreur) {
                $("#pResultat").html(erreur);
            }
        });     
    }

    
    function afficherVille(){
        // fonction de déclenchement de la requête Ajax si la CP saisi fait 5 caractères
        if($("#itCP").val().length===5){chercherVille();}
    }

  
    $(document).ready(init);