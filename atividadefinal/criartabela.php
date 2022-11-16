<?php
$host = "localhost";
$dbname = $_POST['banco'];
$user = "root";
$pass = "";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);    
} catch (PDOException $th) {
}

if($conexao){
    $texto="CREATE TABLE IF NOT EXISTS ".$_POST['tabela']." (
        ".$_POST['campo']." ".$_POST['tipo1']." NOT NULL AUTO_INCREMENT,
        ".$_POST['campo']." ".$_POST['tipo2']." NOT NULL AUTO_INCREMENT,
        ".$_POST['campo']." ".$_POST['tipo3']." NOT NULL AUTO_INCREMENT,
        ".$_POST['campo']." ".$_POST['tipo4']." NOT NULL AUTO_INCREMENT,
        ".$_POST['campo']." ".$_POST['tipo5']." NOT NULL AUTO_INCREMENT,
        PRIMARY KEY ( ".$_POST['campo']." )
    )";
     $acao = $conexao->prepare($texto);

     try {        
        $acao->execute();
        echo "Tabela ".$_POST['banco']." criada com sucesso.";
    } catch (PDO $th) {
        echo $th.getMessage();
    }    
}
 
