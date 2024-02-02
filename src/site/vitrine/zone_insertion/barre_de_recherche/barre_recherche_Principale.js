$(document).ready(function() {
  $('#searchbar').on('input', function() {
    // Récupérer la valeur du champ de recherche
    var query = $(this).val();

    // Effectuer la requête AJAX
    $.ajax({
      url: 'blacklist.php',  // Assurez-vous de spécifier le bon chemin vers votre fichier PHP
      method: 'POST',
      data: { query: query },
      dataType: 'json',
      success: function(response) {
        // Gérer la réponse du serveur
        if (response.success) {
          // Cas où tout est sûr
          console.log('Données insérées avec succès');
        } else {
          // Cas où des violations sont détectées
          response.violations.forEach(function(violation) {
            console.log(violation.type + ' détecté : ' + violation.value);
          });
          // Ajoutez ici le code pour traiter les violations, par exemple, afficher des messages d'erreur à l'utilisateur.
        }
      },
      error: function(xhr, status, error) {
        // Gérer les erreurs de la requête AJAX
        console.error('Erreur AJAX:', status, error);
      }
    });
  });
});