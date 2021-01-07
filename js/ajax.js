/* 
 * ajax.js
 * requête asynchrone permettant de récupérer les noms de villes d'un code postal saisi
 */

    // Execution de la fonction après clic du bouton #btVoir
    // ------------
    function init() {
        $("#btVoir").click(voir);
    }
    // fonction ajax de recherche de la ville associée au CP saisi pour alimentation du select
    // ------------
    function voir() {
        $.ajax({
            type: "GET",
		// la requête est transmise au contrôleur 'VilleDUnCP'
            url: "controls/VilleDUnCP.php",
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

    // ---------------------
    $(document).ready(init);