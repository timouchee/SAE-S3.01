



//===============pour la pop up DEBUT===========================
document.addEventListener('DOMContentLoaded', function() {
  // Afficher la popup et la superposition
  var popupOverlay = document.getElementById('popup-overlay');
  var popupContainer = document.getElementById('popup-container');
  var btnOui = document.getElementById('btn-oui');
  var btnNon = document.getElementById('btn-non');

  popupOverlay.style.display = 'block';
  popupContainer.style.display = 'block';

  // Désactiver les clics sur la superposition
  popupOverlay.style.pointerEvents = 'auto';
 
  // Écouter les événements des boutons
  btnOui.addEventListener('click', function() {
      // Si l'utilisateur clique sur "Oui", fermer la popup et la superposition
      popupOverlay.style.display = 'none';
      popupContainer.style.display = 'none';
  });

  btnNon.addEventListener('click', function() {
      // Si l'utilisateur clique sur "Non", rediriger vers une autre page
      window.location.href = "siteWebDemo_utilisateur.php";
  });
});

//===============pour la pop up FIN===========================

var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;
//alert("haya");

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}




function trouver_user() {
  // Récupère la valeur de la barre de recherche
  var searchValue = $('#barre_de_recherche_utilisateur').val();

  // Effectue la requête AJAX
  $.ajax({
    type: 'POST',
    url: 'search_client_ajax.php', // Fichier PHP qui traitera la recherche
    data: {
      search: searchValue,
      nom_requete_ajax: 'chercher_user_pour_info'
    },
    success: function(response) {
      // Met à jour les résultats dans la div #results
      $('#results').html(response);
    }
  });
}


function redirigerVersSwitchAdmin(codeCarteEtudiante) {
  var url = 'switch_admin.php?quelle_page=admin_user_info&codeCarteEtudiante=' + codeCarteEtudiante;
  window.location.href = url;
}


function balancer_modif() {
  // Sérialise toutes les valeurs du formulaire sous forme d'un tableau d'objets
  var formDataArray = $('#table_info_user input').map(function() {
    return {
      name: $(this).attr('name'),
      value: $(this).val()
    };
  }).get();

  

  // Ajoute la variable supplémentaire
  var nom_requete_ajax = 'session_insert_valeu_info_user';

  // Effectue la requête AJAX
  $.ajax({
    type: 'POST',
    url: 'search_client_ajax.php', // Fichier PHP qui traitera la recherche
    data: {formDataArray,nom_requete_ajax},
    success: function(response) {
      // Met à jour les résultats dans la div #results
      $('#tes_rep').html(response);
    }
  });
}


//===============pour la gestion d'erreur===========================

function erreurRedTout() {
  console.log('oui');
  document.getElementById('identifier').style.borderColor = 'red';
  document.getElementById('password').style.borderColor = 'red';
}

function erreurRedMDP() {
  console.log("non");
  document.getElementById('identifier').style.borderColor = 'black';
  document.getElementById('password').style.borderColor= 'red';
}

//apparition auto pop up explicative
document.addEventListener('DOMContentLoaded', function () {
var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
myModal.show();});
