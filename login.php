<?php
session_start();
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');

//si le formulaire a été soumis
if(isset($_POST['login'])){
    //si tous les champs ont été remplis
    if(not_empty(['identifiant', 'password'])){
        extract($_POST);
        $q = $db->prepare("SELECT id FROM users
                          WHERE (pseudo = :identifiant OR email = :identifiant)
                          AND password = :password AND active = '0'");
        $q->execute([
            'identifiant' => $identifiant,
            'password' =>sha1($password)
        ]);

        $userHasBeenFound = $q->rowCount();

        if($userHasBeenFound){
            redirect('profile.php');
        }else{
            set_flash('Combinaison id-password incorrecte!','danger');
            save_input_data(); //sauvegarder les infos au niveau de la session le champ login sera préremli s'il recharge la page
        }
    }
}else{
    clear_input_data();
}
?>

<?php require('views/login.view.php'); ?>