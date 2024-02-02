
//===============pour la pop up DEBUT===========================
document.addEventListener('DOMContentLoaded', function() {
  // Afficher la popup et la superposition
  var popupOverlay = document.getElementById('popup-overlay');
  var popupContainer1 = document.getElementById('popup-container1');
  var popupContainer2 = document.getElementById('popup-container2');
  var btnSeCo = document.getElementById('btn_se_co');
  var btnPremiereCo = document.getElementById('btn_premiere_co');
  var btnOui = document.getElementById('btn-oui');

  popupOverlay.style.display = 'block';
  popupContainer1.style.display = 'block';

  // Désactiver les clics sur la superposition
  popupOverlay.style.pointerEvents = 'auto';

  // Écouter les événements des boutons
  btnOui.addEventListener('click', function() {
      // Si l'utilisateur clique sur "Se connecter", fermer la popup et la superposition
      //popupOverlay.style.display = 'none';
      popupContainer1.style.display = 'none';
      popupContainer2.style.display = 'block';
  });

  // Écouter les événements des boutons
  btnSeCo.addEventListener('click', function() {
      // Si l'utilisateur clique sur "Se connecter", fermer la popup et la superposition
      popupOverlay.style.display = 'none';
      popupContainer2.style.display = 'none';
  });

  btnPremiereCo.addEventListener('click', function() {
      // Si l'utilisateur clique sur "Non", rediriger vers une autre page
      window.location.href = "../questionnaire/siteWebDemo_utilisateur.php";
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