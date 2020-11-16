/* 
 * ajax.js
 */

    // Execution de la fonction après clic du bouton #btVoir
    // ------------
    function init() {
        $("#btVoir").click(voir);
    }
    // fonction ajax de recherche de la ville pour alimentation du select
    // ------------
    function voir() {
        $.ajax({
            type: "GET",
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