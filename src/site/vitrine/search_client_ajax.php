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

                $sqlKeywords = array("SELECT", "UPDATE", "DELETE", "FROM", "WHERE", "AND", "OR", "INSERT", "INTO", "VALUES", "CREATE", "TABLE", "DROP", "ALTER", "INDEX", "VIEW", "JOIN", "INNER", "OUTER", "LEFT", "RIGHT", "FULL", "GROUP", "BY", "ORDER", "HAVING", "LIMIT");
                
                function containsSQLKeywordInArray($formDataArray, $sqlKeywords) 
                {
                    for ($i = 1; $i <= 9; $i++) {
                        $value = $dataArray[$i]['value'];
                
                        foreach ($sqlKeywords as $keyword) {
                            if (stripos($value, $keyword) !== false) {
                                return true;
                            }
                        }
                    } 
                    return false;
                }

                if(containsSQLKeywordInArray( $_POST['formDataArray'],$sqlKeywords))
                {
                    $_SESSION["requete_modif_user_demander"]=false;
                }
                else
                {
                    $_SESSION["code_carte_etudiant"] =  $_POST['formDataArray'][0]['value'];
                    $_SESSION["nom"] = $_POST['formDataArray'][1]['value'];
                    $_SESSION["prenom"] = $_POST['formDataArray'][2]['value'];
                    $_SESSION["dateNaiss"] = $_POST['formDataArray'][3]['value'];
                    $_SESSION["moyenTransportPrincipal"] = $_POST['formDataArray'][4]['value'];
                    $_SESSION["moyenTransportSecondaire"] = $_POST['formDataArray'][5]['value'];
                    $_SESSION["numTel"] = $_POST['formDataArray'][6]['value']; 
                    $_SESSION["mail"] = $_POST['formDataArray'][7]['value'];
                    $_SESSION["adresseUtilisateur"] = $_POST['formDataArray'][8]['value'];
                    $_SESSION["sexe"] = $_POST['formDataArray'][9]['value'];
                    $_SESSION["requete_modif_user_demander"]=true;
                }

                //print_r($_SESSION);
 
            break;

            case 'chercher_bonPlan':
                

                //echo "h zuig^phoujôkte";

                $search_value = $_POST['search'];
                $bypass = false;
                if( $_POST['search']== '')
                {
                    $bypass = true;
                }
    
                $bdd = "nconguisti_bd";
        
                $host = "lakartxela.iutbayonne.univ-pau.fr";
                //$host = "localhost";
                $user = "nconguisti_bd";
                //$user = "root";
                $pass = "nconguisti_bd";
                //$pass = "";
    
                $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
                $link->set_charset("utf8mb4");
    
                //Afichage base
                $query="SELECT idBonPlan, libelleBonPlan, detail, adresseBonPlan, type, image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom
                FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
                ORDER BY type DESC";
                $result = mysqli_query($link, $query);
                $compteEvenement = 0;
    
                while ($data = mysqli_fetch_assoc($result))
                {
                    $idBonPlan = $data["idBonPlan"];
                    $libelleBonPlan = $data["libelleBonPlan"];
                    $detail = $data["detail"];
                    $adresseBonPlan = $data["adresseBonPlan"];
                    $type = $data["type"];
                    $image = $data["image"];
                    $dateOuverture = $data["dateOuverture"];
                    $dateFermeture = $data["dateFermeture"];
                    $heureOuverture = substr($data["heureOuverture"],0,-3);
                    $heureFermeture = substr($data["heureFermeture"],0,-3);
                    $nomVille = $data["nomVille"];
                    $codeCarteEtudiante = $data["codeCarteEtudiante"];
                    $nom = $data["nom"];
                    $prenom = $data["prenom"];
    
                    //Partie code
    
                    //Rectifiation des horaires (on enlève les secondes)
                    $heureOuverture = substr($data["heureOuverture"],0,-3);
                    $heureFermeture = substr($data["heureFermeture"],0,-3);
                    
                    /* echo "<br> '$search_value'  dans :$libelleBonPlan  => ";
                    echo stripos($libelleBonPlan, $search_value); */
    
                    if(stripos($libelleBonPlan, $search_value) !== false || $bypass)
                    {
                        if($type == "Activite")
                        {
                            echo "<a class='carte' href='index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan' >";
                            echo "<div class='card' style='width: 20rem;'>";
                            echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>$libelleBonPlan</h5>";
                            echo "<p class='card-text'> Par $nom $prenom</p>";
                            echo "<p class='card-text horaires'>$heureOuverture h / $heureFermeture h</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</a>";
                        }
        
                        if($type == "Evenement" && $compteEvenement < 1)
                        {
                            echo "<a class='carte' href='detailBonPlan.php?idBonPlan=$idBonPlan' >";
                            echo "<div class='card' style='width: 30rem;'>";
                            echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>$libelleBonPlan</h5>";
                            echo "<p class='card-text'>$detail</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</a>";
                            $compteEvenement +=1;
                        }
                    }
    
                }
    
    
                break;



        default:
            # code...
            break;
    }

      

  ?>