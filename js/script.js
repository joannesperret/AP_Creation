/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 
 * script.js
 */
// Fonction d'affichage/ masquage du mot de passe
// Fonction commune à l'authentification et à l'inscription

$(document).ready(function() {
	// Ciblage de l''id 'diff-acc'
	// Réponse à l'évènement click
    $('#diff-acc').click(function() {
		// Si la propriété est cochée, le type devient 'text'
		// ce qui affiche le mot de passe
        if ($(this).prop('checked')) {
            $('#password').prop("type", "text");
            $('#password2').prop("type", "text");
            $('#password3').prop("type", "text");
        }
		// Si la propriété n'est pas cochée, le type devient 'password'
		// ce qui masque le mot de passe
        else {
            $('#password').prop("type", "password");
            $('#password2').prop("type", "password");
            $('#password3').prop("type", "password");
        }
    });
});
