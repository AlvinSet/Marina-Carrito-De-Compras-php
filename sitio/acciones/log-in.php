<?php

use App\Authentication\Authentication;

require_once __DIR__ . '/../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$authentication = new Authentication();

if(!$authentication->logIn($email, $password)){
    $_SESSION['oldData'] = $_POST;
    $_SESSION['failMessage'] = "Las credenciales ingresadas no coinciden con nuestros registros.";
    header('Location: ../index.php?section=log-in-view');
    exit;
}

$_SESSION['successMessage'] = "Sesión iniciada con éxito. ¡Te damos la bienvenida";

header('Location: ../index.php?section=profile-view');
exit;
