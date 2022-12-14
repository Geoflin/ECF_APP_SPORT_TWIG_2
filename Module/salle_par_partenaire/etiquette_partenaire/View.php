<!--Style etiquette_partenaire -->
<link href="../../Module/salle_par_partenaire/etiquette_partenaire/style.css" rel="stylesheet" />
<!--Style bouton actif/inactif -->
<link href="../../Style/Toggleswitch/etiquette_partenaire.css" rel="stylesheet" />

<!--On crée le formulaire de modification du statut du partenaire-->
<form name="statut_partenaire" method="POST" action="../../Module/salle_par_partenaire/etiquette_salle_de_sport/Back_end.php" onsubmit="return script_etiquette_partenaire()">

    <!--View etiquette_partenaire-->
    <section class="etiquette_partenaire <?php echo $_POST['partenaire'] ?>">

        <!--Span reliant image_client_et_information_client-->
        <span class="image_client_et_information_client">

            <!--Section image_client-->
            <section class="image_client">
                <img src="../../Img/marque_de_sport.png" width="200" height="170">
            </section>


            <?php   
//on recupère l'id du partenaire
require_once '../../Module/salle_par_partenaire/recuperer_id_partenaire.php';
?>


            <?php
  //On recupère les informations grâce à l'ID du partenaire sur lesquel nous avons cliqué
  foreach ($pdo->query('SELECT * FROM api_clients WHERE client_id LIKE "'.$client_id.'" ', PDO::FETCH_ASSOC) as $api_clients) { 
?>

            <!--Section information_client-->
            <section class="information_client">
                <div>id: <?php echo $api_clients['client_id']?></div>
                <div><?php echo $api_clients['client_name'] ?></div>
                <div><?php echo $api_clients['full_description'] ?></div>
            </section>

            <!--Section information_client-->
            <section class="information_client_2">
                <div><?php echo $api_clients['urll'] ?></div>
                <div><?php echo $api_clients['mail'] ?></div>
            </section>
        </span>

        <?php 
if($api_clients['actif']=='1'){
   $checked_partenaire_actif= "checked";
   $marque_active_ou_desactive= "désactivée";
   $value='1';
} else {
   $checked_partenaire_actif= "unchecked";
   $marque_active_ou_desactive= "activée";
   $value='0';
}
?>

        <!--Section bouton_actif_inactif-->
        <section class="bouton_actif_inactif disabled">

            <label class="toggleSwitch nolabel" onclick="return checkbox()">
                <input class="" type="checkbox" id="actif" name="actif" value="1" <?php echo $checked_partenaire_actif; ?> onchange="this.value = this.checked ? '1' : '0'" />
                <span>
                    <span>Inactif</span>
                    <span>Actif</span>
                </span>
                <a></a>
            </label>

            <input name="modification_statut_partenaire" class="btn btn-outline-success btn-lg partenaire" type="submit" value="Valider">            

            <!-- On indique la page de template de mail à ouvrir -->
<input class="display_none" type="text" id="checked_partenaire_actif" name="checked_partenaire_actif" value="<?php echo $checked_partenaire_actif ?>">





<!--on envoie en POST le salle_id pour le formulaire de modification des permissions-->
<input name="salle_id" id="salle_id" class="display_none" type="text"
    value="<?php echo $salle_de_sport3['salle_id'] ?>">

<!--on envoie en POST le mail et le client_name pour le mail de modification-->
<input name="mail" id="mail" class="display_none" type="mail" value="<?php echo $api_clients['mail'] ?>">

<!--on envoie en POST le mail et le client_name pour le mail de modification-->
<input name="client_name" id="client_name" class="display_none" type="text"
    value="<?php echo $api_clients['client_name'] ?>">

<!--on envoie en POST le client_id pour ne pas perturber le code précèdent-->
<input name="client_id" id="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">


<input type="text" id="marque_active_ou_desactive" class="display_none" name="marque_active_ou_desactive"
    value="<?php echo $marque_active_ou_desactive ?>">

<!-- On indique la page de template de mail à ouvrir -->
<input class="display_none" type="text" id="template" name="template" value="marque_de_sport_activee_desactivee">

</section>


</form>

<?php require_once '../../Module/salle_par_partenaire/permission_globale/View.php' ?>

<?php }; ?>

<script src="../../Module/salle_par_partenaire/etiquette_partenaire/script_etiquette_partenaire.js"></script>

</body>
