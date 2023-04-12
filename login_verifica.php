<?php
require('pdo.inc.php');
    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];

    //cria aconsulta e aguarda os dados;
    $sql = $conex ->prepare('select * from alunos where nome = :name ');

//adiciona os dados na consulta

$sql->bindParam(':name', $nome);

$sql->execute();

//Se encontrou o usuário;

if ($sql->rowCount()) {
        //echo "login feito com sucesso"

$nome  = $sql->fetch(PDO::FETCH_OBJ);

    //verificar se a senha esta correta

    /*if(!password_verify($datanasc, $nome->datanasc)){

          
       header('location:login.php?erro=1');
       die;

    }
*/
if($datanasc == $nome->datanasc){

          
    session_start();
    $_SESSION ['nome'] = $nome->nome;
    header('location:boasvindas.php');
    die;

    }}

    header('location:login.php?erro=1');
    die;
