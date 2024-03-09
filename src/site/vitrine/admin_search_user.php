
<p id="title_up">information utilisateur</p>

<div id="barre_noire_fine_expand"></div>
<br>
<!-- Barre de recherche -->

<!-- Résultats de la recherche -->
<!--  -->

<div id="lst_but">
  <form action="switch_admin.php" method="get">  
    <input hidden type="text" name="quelle_page"  value="admin_accueil">
    <button type="submit" class="but_user but_retour_barre_recherche"  >Retour</button>
  </form>
  <br>
  <input type="text" id="barre_de_recherche_utilisateur" placeholder="Recherche" oninput="trouver_user()">
  <br>
  <br>
  <div id="results"></div>
  
</div> 

<?php
  if(isset($_SESSION["requete_modif_user_demander"]) && $_SESSION["requete_modif_user_demander"]==true)
  {

      $requete = $connexion->prepare("UPDATE Utilisateur SET 
          nom = :nom,
          prenom = :prenom, 
          dateNaiss = :dateNaiss,
          moyenTransportPrincipal = :moyenTransportPrincipal,
          moyenTransportSecondaire = :moyenTransportSecondaire,
          numTel = :numTel,
          adresseUtilisateur = :adresseUtilisateur,
          mail = :mail,
          sexe = :sexe
          WHERE codeCarteEtudiante = :codeCarteEtudiante"); 
      
      $requete->bindParam(':nom', $_SESSION["nom"]);
      $requete->bindParam(':prenom', $_SESSION["prenom"]);
      $requete->bindParam(':dateNaiss', $_SESSION["dateNaiss"]);
      $requete->bindParam(':moyenTransportPrincipal', $_SESSION["moyenTransportPrincipal"]);
      $requete->bindParam(':moyenTransportSecondaire', $_SESSION["moyenTransportSecondaire"]);
      $requete->bindParam(':numTel', $_SESSION["numTel"]);
      $requete->bindParam(':adresseUtilisateur', $_SESSION["adresseUtilisateur"]);
      $requete->bindParam(':mail', $_SESSION["mail"]);
      $requete->bindParam(':sexe', $_SESSION["sexe"]);
      $requete->bindParam(':codeCarteEtudiante', $_SESSION["code_carte_etudiant"]); 

      print_r($requete) ;

      $requete->execute();

      echo "<br> la requete update a été effectuer <br>";
  }
  else
  {
    echo "<br> la requete ne passe pas <br>";
  }
?>



