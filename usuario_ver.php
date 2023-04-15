<?php

require('verifica_login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');

$usr = new Aluno();

$nome = $_GET['nome']?? false;
$info = $usr->getByname($id);

 


echo $twig->render('usuarios_ver.html', [], );