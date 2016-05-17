<?php
session_start();

include('filter/guess_filter.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');

//si le formulaire a été soumis
if(isset($_POST['login'])){
    //si tous les champs ont été remplis
    if(not_empty(['identifiant', 'password'])){
        extract($_POST);
        $q = $db->prepare("SELECT id, pseudo FROM users
                          WHERE (pseudo = :identifiant OR email = :identifiant)
                          AND password = :password AND active = '0'");
        $q->execute([
            'identifiant' => $identifiant,
            'password' =>sha1($password)
        ]);

        $userHasBeenFound = $q->rowCount();

        if($userHasBeenFound){
            $user = $q->fetch(PDO::FETCH_OBJ);
            $_SESSION['user_id'] = $user->id;
            $_SESSION['pseudo'] = $user->pseudo;
            redirect('profile.php?id='.$user->id);
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
