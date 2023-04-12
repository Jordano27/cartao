<?php

require('verifica_login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');

$usr = new Usuario();

$id = $_GET['id']?? false;
$info = $usr->getById($id);

 


echo $twig->render('usuarios_ver.html', [], );