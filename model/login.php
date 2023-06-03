<?php

require_once 'config.php';

$salt = '123456';

$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha'].$salt);

$sql = "SELECT * FROM usuarios
WHERE login = '$usuario' AND senha = '$senha'";

$resultado = $db ->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if(count($resultado) > 0){
    //usuario logado
    
    $_SESSION['usuario'] = $resultado[0];
    echo '{"status": "ok",'
        . '"tipo": "'.$_SESSION['usuario']['tipo'].'"}';
} else {
    //usuario ou senha incorretos
    echo '{"status": "erro", "msg": "Usuário ou senha incorretos"}';
}