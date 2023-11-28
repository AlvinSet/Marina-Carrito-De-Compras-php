<?php

use App\Authentication\Authentication;

require_once __DIR__ . '/../../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

// TODO: Validar...

$authentication = new Authentication();

if(!$authentication->logIn($email, $password)){
    $_SESSION['failMessage'] = "Las credenciales ingresadas no coinciden con nuestros registros.";
    header('Location: ../index.php?section=login-view');
    exit;
}

$_SESSION['successMessage'] = "Sesión iniciada con éxito. ¡Te damos la bienvenida";

header('Location: ../index.php?section=home');
exit;
