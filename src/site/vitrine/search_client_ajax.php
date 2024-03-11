<?php session_start();

    switch ($_POST['nom_requete_ajax']) 
    {
        case 'chercher_user_pour_info':
            # code...
            // Remplace ces valeurs par les tiennes
            $serveur = "lakartxela.iutbayonne.univ-pau.fr";
            $nomUtilisateur = "nconguisti_bd";
            $motDePasse = "nconguisti_bd";
            $nomBaseDeDonnees = "nconguisti_bd";
        
            try {
                // Connexion à la base de données avec PDO
                $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $nomUtilisateur, $motDePasse);
        
                
                $requete = $connexion->query("SELECT * FROM Utilisateur");
                $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); 
            } 
            catch (PDOException $e) 
            {
                echo "Erreur : " . $e->getMessage();
            }
         
            
            
            foreach ($resultats as $ligne) 
            {
                $search_value = $_POST['search']==''?"7":$_POST['search'];
                
                
                if (strpos(strtoupper($ligne["nom"]), strtoupper($search_value)) !== false || strpos(strtoupper($ligne["prenom"]), strtoupper($search_value)) !== false)        { 
                    echo "<div id='item_user'>";
                    echo    "<div id='info_utilisateur'>" . $ligne["nom"] ." <br>". $ligne["prenom"];            
                    echo    "</div>";
                
                    echo    "<div id='numero_telephone'>";
                    echo        "<p>".$ligne["codeCarteEtudiante"]."</p>";
                    echo    "</div>";
                
                    echo    "<div id='actions'>";
                    echo      "<button class='but_user' type='button'>Sélectionner</button>";
                    echo      "<br>";            
                    echo      "<button class='but_user' type='button' onclick='redirigerVersSwitchAdmin(" .$ligne["codeCarteEtudiante"].")'> Plus d info</button>";
                    echo    "</div>";
                    echo "</div>";
                    echo "<br> <br> <br>";
                }
         
            
            } 
            break;
            
            case 'session_insert_valeu_info_user':
                //print_r($_POST);

            $_SESSION["requete_modif_user_demander"]=true;
            $_SESSION["code_carte_etudiant"] = $_POST['formDataArray'][0]['value'];
            $_SESSION["nom"] = $_POST['formDataArray'][1]['value'];
            $_SESSION["prenom"] = $_POST['formDataArray'][2]['value'];
            $_SESSION["dateNaiss"] = $_POST['formDataArray'][3]['value'];
            $_SESSION["moyenTransportPrincipal"] = $_POST['formDataArray'][4]['value'];
            $_SESSION["moyenTransportSecondaire"] = $_POST['formDataArray'][5]['value'];
            $_SESSION["numTel"] = $_POST['formDataArray'][6]['value'];
            $_SESSION["mail"] = $_POST['formDataArray'][7]['value'];
            $_SESSION["adresseUtilisateur"] = $_POST['formDataArray'][8]['value'];
            $_SESSION["sexe"] = $_POST['formDataArray'][9]['value'];

            print_r($_SESSION);

            break;



        default:
            # code...
            break;
    }

      

  ?>