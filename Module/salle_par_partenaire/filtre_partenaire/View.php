<?php if($isAdmin== 'oui' || $partenaire=='oui'){ ?>
  
  <!--Style du filtre_partenaire -->
  <link href="../../Module/salle_par_partenaire/filtre_partenaire/style.css" rel="stylesheet" />

  <!--View filtre partenaire-->
  <section class="filtre_partenaire">

      <row_1>

          <!--Filtre client_name-->
          <button type="button" class="aide btn btn-outline-success btn-lg">
              <form class="form" method="post" action="">

                  <span class="aide">
                      <label id="Nom" for="Nom">Nom:</label>
                      <input class="aide2" type="search" name="Nom_2">
                  </span>

                  <!--On transmet des informations au module etiquette_salle_de_sport de la page pour ne pas perturber son fonctionnement-->
                  <input name="client_actif" class="display_none" type="text" value="<?php echo $api_clients['actif'] ?>">
                  <input name="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">
                  <input name="filtre" class="aide2 btn btn-outline-success btn-lg" type="submit" value="Chercher">

              </form>
          </button>

<row2>
          <!--Filtre client_actif-->
          <form class="form" method="post" action="">

              <!--On transmet des informations au module etiquette_salle_de_sport de la page pour ne pas perturber son fonctionnement-->
              <input name="client_actif" class="display_none" type="text" value="<?php echo $api_clients['actif'] ?>">
              <input name="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">
              <input name="salle_id" id="salle_id" class="display_none" type="text" value="<?php echo $_POST['salle_id'] ?>">

              <button name="actif" type="submit" class="btn btn-outline-success btn-lg">actif</button>

          </form>

          <!--Filtre client_tout-->
          <form class="form" method="post" action="">

              <!--On transmet des informations au module etiquette_salle_de_sport de la page pour ne pas perturber son fonctionnement-->
              <input name="client_actif" class="display_none" type="text" value="<?php echo $api_clients['actif'] ?>">
              <input name="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">

              <button type="submit" class="btn btn-outline-success btn-lg" name="tout">tout</button>

          </form>

          <!--Filtre client_inactif-->
          <form class="form" method="post" action="">

              <!--On transmet des informations au module etiquette_salle_de_sport de la page pour ne pas perturber son fonctionnement-->
              <input name="client_actif" class="display_none" type="text" value="<?php echo $api_clients['actif'] ?>">
              <input name="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">

              <button type="submit" class="btn btn-outline-success btn-lg" name="inactif">inactif</button>

          </form>

</row2>


          <!--Filtre client_id-->
          <button type="button" class="aide btn btn-outline-success btn-lg">
              <form class="form" method="post" action="">

                  <span class="aide">
                      <label for="id">Id:</label>
                      <input class="aide2" type="text" name="id_2">
                  </span>

                  <!--On transmet des informations au module etiquette_salle_de_sport de la page pour ne pas perturber son fonctionnement-->
                  <input name="client_actif" class="display_none" type="text" value="<?php echo $api_clients['actif'] ?>">
                  <input name="client_id" class="display_none" type="text" value="<?php echo $client_id ?>">
                  <input name="filtre" class="aide2 btn btn-outline-success btn-lg" type="submit" value="Chercher">

              </form>
          </button>

      </row_1>

  </section>

  <?php } ?>