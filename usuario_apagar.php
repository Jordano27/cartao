<?php


   require ('twig_carregar.php');
   require('pdo.inc.php');

   if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $id =$_POST['id'] ?? false;
      if($id)
      {  $sql = $conex->prepare('UPDATE usuarios SET ativo= 0 WHERE id = ? ');
         $sql -> execute([$id]);
      }
         
      header('location:usuarios.php');
      die;
   }


   $id = $_GET['id'] ?? false;
   $sql = $conex->prepare('SELECT * FROM usuarios WHERE id = ? ');
   $sql -> execute([$id]);
   $usuarios = $sql->fetch(PDO :: FETCH_ASSOC);


   echo $twig->render('usuario_apagar.html', ['usuario'=> $usuarios,]);