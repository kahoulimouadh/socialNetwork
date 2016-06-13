<?php
session_start();

include('filter/guess_filter.php');
require "config/database.php";
require "includes/functions.php";

if(!empty($_GET['p']) && is_already_in_use('pseudo', $_GET['p'], 'users') && !empty($_GET['token'])) {
    $pseudo = $_GET['p'];
    $token = $_GET['token'];

    $q = $db->prepare('SELECT email, password FROM users WHERE pseudo = ?');
    $q->execute([$pseudo]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($pseudo.$data->email.$data->password);
    if($token == $token_verif){
        $q = $db->prepare("UPDATE users SET active = '1' WHERE pseudo = ?");
        $q->execute([$pseudo]);
        set_flash('votre compte a été bel et bien activé!');
        redirect('login.php');
    }else{
        set_flash('Paramètres invalides', 'danger');
        redirect('index.php');
    }
}else {
    redirect('index.php');
}
