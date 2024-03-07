<?php
//fait la requete

    if(isset($_SESSION["requete_modif_user_demander"]) && $_SESSION["requete_modif_user_demander"]==true)
    {
        /* $requete = $connexion->prepare("INSERT INTO Utilisateur () VALUES () WHERE condition = :valeur");
        $valeur = "valeur_reelle";
        $requete->bindParam(':valeur', $valeur);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); */
    }

echo " <br> <br>  code carte etudiant : ".$_GET["codeCarteEtudiante"]." <br> ";
$requete = $connexion->query("SELECT * FROM Utilisateur WHERE codeCarteEtudiante=".$_GET["codeCarteEtudiante"]." ; ");
$info_user_res_requeste = $requete->fetchAll(PDO::FETCH_ASSOC);

$info_user_res_requeste=$info_user_res_requeste[0];
echo "<br> la requete a été effectuer <br>";

?>

 


<p id="title_up">information utilsiateur</p>

<div id="barre_noire_fine_expand"></div>
<br>

<div id="les_info_user_container">
    <table border="1" id="table_info_user">
        <thead>
            <tr class="tr_info_user">
                <th class="th_info_user td_info_user">Colonne 1</th>
                <th class="th_info_user td_info_user">Colonne 2</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr_info_user">
                <td class="td_info_user">nom</td>
                <td hidden><input type="text" class="input_info_user" id="info_user_code_carte_etudiant" value="<?php echo $info_user_res_requeste["codeCarteEtudiante"]; ?>"></td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_nom" value="<?php echo $info_user_res_requeste["nom"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">prenom</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_prenom" value="<?php echo $info_user_res_requeste["prenom"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">date naissance</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_date_naissance" value="<?php echo $info_user_res_requeste["dateNaiss"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">moyen de transport 1</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_transport_1" value="<?php echo $info_user_res_requeste["moyenTransportPrincipal"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">moyen de transport 2</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_transport_2" value="<?php echo $info_user_res_requeste["moyenTransportSecondaire"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">numeros de telephone</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_num_tel" value="<?php echo $info_user_res_requeste["numTel"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">mail</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_mail" value="<?php echo $info_user_res_requeste["mail"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">adresse utilisateur</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_adresse" value="<?php echo $info_user_res_requeste["adresseUtilisateur"]; ?>"></td>
            </tr>
            <tr class="tr_info_user">
                <td class="td_info_user">sexe</td>
                <td class="td_info_user"><input type="text" class="input_info_user" id="info_user_sexe" value="<?php echo $info_user_res_requeste["sexe"]; ?>"></td>
            </tr>

      </tbody>
    </table>
</div>


<br>
<button type="button" class="but_admin_lst center_but" onclick="balancer_modif()">valider les modification</button>

<div id="tes_rep"></div>

