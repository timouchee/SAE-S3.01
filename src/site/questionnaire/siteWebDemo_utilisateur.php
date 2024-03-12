<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>

    <link rel="stylesheet" href="siteWebDemo.css">
    
</head>
<body>
<header>
    <div class="div1">
        <div class="div2">           
        
        </div>
            <div class="div3">
                <img src="../vitrine/titre.jpg" alt="Image centrée">
            </div>
        </div>
    </div>
</header>
<div class = "div_du_centre">
    <h1>Questionnaire</h1>
    <form action="siteWebDemo_preference.php" method="post">
    <!-- <form action="" method="post"> -->
        <!-- Partie Utilisateur -->
        <h2>Informations Utilisateur</h2>
        <!-- Conteneur principal pour aligner en colonne -->
        <div class="info-utilisateur-container">
            <!-- mail -->
            <label class="label-utilisateur" for="mail">Mail: </label>
            <input type="email" id="mail" name="mail" class="info-utilisateur" required>
            <br>
            <!-- mdp -->
            <label class="label-utilisateur" for="mdp">Mot de passe: </label>
            <input type="password" name="mdp" id="mdp" required>
            <br>
            <!-- Sexe -->
            <label class="label-utilisateur" for="sexe">En tant que: </label>
            <ul>
                <li>
                    <label for="title_1">
                    <input type="radio" id="sexe" name="title" value="M." required/>
                    Monsieur
                    </label>
                </li>
                <li>
                    <label for="title_2">
                    <input type="radio" id="sexe" name="title" value="Mme." required/>
                    Madame
                    </label>
                </li>
            </ul>
            <br>
            <!-- Nom -->
            <label class="label-utilisateur" for="nom">Nom: </label>
            <input type="text" id="nom" name="nom" class="info-utilisateur" type="texte" required>
            <br>
            <!-- Prenom -->
            <label class="label-utilisateur" for="prenom">Prénom: </label>
            <input type="text" id="prenom" name="prenom" class="info-utilisateur" required>
            <br>
            <!-- date de naissance -->
            <label class="label-utilisateur" for="dateNaiss">Date de naissance (jj/mm/aaaa): </label>
            <input type="text" id="dateNaiss" name="dateNaiss" class="info-utilisateur" required>
            <br>
            <!-- adresse -->
            <label class="label-utilisateur" for="adresse">Adresse (Ville, numeroRue nomRue): </label>
            <input type="text" id="adresse" name="adresse" class="info-utilisateur" required>
            <br>
            <!-- moyen de transport -->
            <label for="choixMoyenTransport">Choisissez le moyen de transport: </label>
            <select id="choixMoyenTransport" name="choixMoyenTransport" class="info-utilisateur-select" required>
                <option value="0">Pied</option>
                <option value="1">Vélo</option>
                <option value="2">Moto</option>
                <option value="3">Voiture</option>
            </select>
        </div>
       
        <button type="submit" class = "btn_submit">soumetre</button>
        </form>
</div>
<!-- </form> -->

<script src="siteWebDemo.js"></script>
</body>
</html>


