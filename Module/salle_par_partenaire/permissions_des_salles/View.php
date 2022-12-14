<!--Style du permissions_des_salles -->
<link href="../../Module/salle_par_partenaire/permissions_des_salles/style.css" rel="stylesheet" />
<!--Style du etiquette_salle_de_sport -->
<link href="../../Style/Toggleswitch/permissions_des_salles.css" rel="stylesheet" />

<!--View permissions_des_salles-->
<section class="permissions_des_salles">

    <span id="permission_moins">
        <button id="permission_moins_js">Permission</button>
        <span class="material-symbols-outlined">do_not_disturb_on</span>
        <span>

            <!--On crée le formulaire de modification des permissions-->
            <form method="POST" action="../../Module/salle_par_partenaire/etiquette_salle_de_sport/Back_end.php">

                <section class="box_bouton_actif_inactif">

        <!--Tableau des permissions-->
        <?php 
        require_once '../../Module/salle_par_partenaire/Commun/Tableau_permissions.php'; 

                    // on fait défiler les permissions du tableau
                    for ($i=0; $i < 10; $i++) {

                    foreach ($pdo->query('SELECT * FROM `api_install_perm` WHERE `salle_id` LIKE "'.$salle_de_sport3['salle_id'].'" AND "'.$permissions[$i].'" LIKE "'.$permissions[$i].'"  ', PDO::FETCH_ASSOC) as $api_install_perm) {

                    // on regarde si la permission est actif_inactif
                    if($api_install_perm[$permissions[$i]]==1 && $Salle_active['Salle_active']==1 && $client_actif==1){
                       $checked= "checked";
                       } else {
                       $checked= "unchecked";
                    }
                    ?>

                    <!--Section bouton_actif_inactif-->
                    <section class="bouton_actif_inactif">

                        <label class="toggleSwitch_permissions_des_salles nolabel" onclick="">

                            <input type="checkbox" id="<?php echo $permissions[$i]; ?>"
                                name="<?php echo $permissions[$i]; ?>" value="1" <?php echo $checked; ?> />
                            <span>
                                <span>Inactif</span>
                                <span>Actif</span>
                            </span>
                            <a></a>
                        </label>
                        <?php echo $permissions[$i]; ?>

                    </section>

                    <?php 
                      };
                    }; 
                    ?>

                    <input id="<?php $lecture_seule ?>" name="modification_permission"
                        class="btn btn-outline-success btn-lg" type="submit" value="Valider">

                </section>
</section>



<!--on envoie en POST le salle_id pour le formulaire de modification des permissions-->
<input name="salle_id" id="salle_id" class="display_none" type="text"
    value="<?php echo $salle_de_sport3['salle_id'] ?>">

<!--on envoie en POST le client_id pour ne pas perturber le code précèdent-->
<input name="client_id" id="client_id" class="display_none" type="text"
    value="<?php echo $salle_de_sport3['client_id'] ?>">


</form>

<!--traitement du formulaire inscription_partenaire-->
<?php
if(isset($_POST['modification_permission'])){
  require_once '../../Module/salle_par_partenaire/etiquette_salle_de_sport/Back_end.php';
}
?>