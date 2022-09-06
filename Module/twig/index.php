<?php
require 'vendor/autoload.php';

//Routing
if (isset($_POST['template'])) {
    $page = $_POST['template'];
}

//Rendu du template
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false, //__DIR__.'/tmp'
]);

//On choisi le template à activer
switch($page) {
    case 'Ajout_partenaire':
        //Récupère paramètre mail
        $client_name = $_POST['client_name'];
        $password = $_POST['password'];
        $sendSmtpEmail = array('client_name'=>$client_name, 'password'=>$password, 'mail'=>$_POST['mail']);
        echo $twig->render('Ajout_partenaire.twig', ['params' => $sendSmtpEmail]);
    break; 
    case 'Ajout_salle_de_sport':
        //Récupère paramètre mail
        $client_name = $_POST['client_name'];
        $Nom = $_POST['Nom'];
        $password_salle = $_POST['password_salle'];
        $sendSmtpEmail = array('client_name'=>$client_name, 'nom'=>$Nom, 'mail'=>$_POST['mail'], 'mail_salle'=>$_POST['mail_salle'], 'password_salle'=>$password_salle);
        echo $twig->render('Ajout_salle_de_sport.twig', ['params' => $sendSmtpEmail]);
    break;
    case 'marque_de_sport_activee_desactivee':
        //Récupère paramètre mail
        $client_name = $_POST['client_name'];
        $marque_active_ou_desactive = $marque_active_ou_desactive;
        $sendSmtpEmail = array('client_name'=>$client_name, 'marque_active_ou_desactive'=>$marque_active_ou_desactive, 'mail'=>$_POST['mail']);
        echo $twig->render('marque_de_sport_activee_desactivee.twig', ['params' => $sendSmtpEmail]);
    break;
    case 'salle_active_ou_desactivee':
        $client_name = $_POST['client_name'];
        $nom_salle = $_POST['nom_salle'];
        $salle_active_ou_desactivee = $salle_active_ou_desactivee;
        $sendSmtpEmail = array('client_name'=>$client_name, 'nom_salle'=>$nom_salle, 'salle_active_ou_desactivee'=>$salle_active_ou_desactivee, 'mail_partenaire'=>$_POST['mail_partenaire'], 'mail_structure'=>$_POST['mail_structure']);
        echo $twig->render('salle_de_sport_activee_desactivee.twig', ['params' => $sendSmtpEmail]);
    break;
    case 'modifications_permissions_globales':
        $client_name = $_POST['client_name'];
        $sendSmtpEmail = array('client_name'=>$client_name, 'mail'=>$_POST['mail']);
        echo $twig->render('modifications_permissions_globales.twig', ['params' => $sendSmtpEmail]);
    break;
    //Si aucun des templates ne correspond: on renvoie une erreur 404    
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}