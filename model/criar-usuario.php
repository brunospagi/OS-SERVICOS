<?php

require_once 'config.php';

$usuario = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$tipo = 'user';

$salt = '123456';
$password = sha1($senha.$salt);

$sql ="INSERT INTO usuarios (login, senha, nome, tipo)
VALUES ('$usuario', '$password', '$nome', '$tipo' )";

$status = $db->exec($sql);

if ($status > 0)
{
    echo '{"status": "ok"}';
} else {
    echo '{"status": "erro", "msg": "O servidor está indisponível no momento"}';
}



