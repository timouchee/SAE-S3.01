



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
      window.location.href = "page-non-connecte.html";
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