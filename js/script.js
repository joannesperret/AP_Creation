/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Fonction d'affichage/ masquage du mdp

$(document).ready(function() {
    $('#diff-acc').click(function() {
        if ($(this).prop('checked')) {
            $('#password').prop("type", "text");
            $('#password2').prop("type", "text");
            $('#password3').prop("type", "text");
        }
        else {
            $('#password').prop("type", "password");
            $('#password2').prop("type", "password");
            $('#password3').prop("type", "password");
        }
    });
});
