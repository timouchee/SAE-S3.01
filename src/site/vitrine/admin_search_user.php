
<p id="title_up">Information des utilisateurs</p>

<div id="barre_noire_fine_expand"></div>
<br>
<!-- Barre de recherche -->

<!-- Résultats de la recherche -->
<!--  -->

<div id="lst_but">
  <form action="index.php" method="get">  
    <input hidden type="text" name="quelle_page"  value="admin_accueil">
    <input hidden type="text" name="quelle_compte"  value="admin" hidden>
    <button type="submit" class="but_user but_retour_barre_recherche"  >Retour</button>
  </form>
  <br>
  <input type="text" id="barre_de_recherche_utilisateur" placeholder="Entrez un nom d'utilisateur" oninput="trouver_user()">
  <br>
  <br>
  <div id="results"></div>
  
</div> 




