<?php

require('config/database.php');
require('includes/functions.php');

    //si le formulaire a été soumis
    if(isset($_POST['register'])){
        //si tous les champs ont été remplis
        if(not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])){
            $errors = []; //tab centenant les erreurs
            extract($_POST);

            if(mb_strlen($pseudo) < 3){
                $errors[] = "le pseudo doit contenir 3 caractères au minimum";
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[] = "adresse mail invalide";
            }
            if(mb_strlen($password) < 6){
                $errors[] = "le mot de passe doit contenir 6 caractères au minimum";
            }else{
                if($password != $password_confirm){
                    $errors[] = "mots de passe non conformes";
                }
            }
            if(is_already_in_use('pseudo', $pseudo, 'users')){
                $errors[] = "Pseudo déjà utilisé";
            }
            if(is_already_in_use('email', $email, 'users')){
                $errors[] = "Adresse email déjà utilisée";
            }
            if(count($errors) == 0){
                //envoyer mail d'activation
            }
        }else{
            $errors[] = "Veuillez remplir tous les champs!";
        }
    }
?>

<?php require('views/register.view.php'); ?>