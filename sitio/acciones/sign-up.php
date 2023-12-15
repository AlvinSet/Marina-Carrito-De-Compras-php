<?php

use App\Models\User;
use App\Security\Encryption;

require_once __DIR__ . '/../bootstrap/init.php';

$name = $_POST ['name'];
$lastname = $_POST ['lastname'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$confirm_password = $_POST ['confirm_password'];

//Validation

$mistakes = [];

if(empty($name)) {
    $mistakes['name'] = "El nombre de usuario no debe estar vacío.";
} else if(strlen($name) < 3) {
    $mistakes['name'] = "El nombre de usuario debe tener al menos 3 caracteres.";
}

if(empty($lastname)) {
    $mistakes['lastname'] = "El Apellido de usuario no debe estar vacío.";
} else if(strlen($lastname) < 3) {
    $mistakes['lastname'] = "El Apellido de usuario debe tener al menos 3 caracteres.";
}

if(empty($email)) {
    $mistakes['email'] = "El email no debe estar vacío.";
}

if(empty($password)) {
    $mistakes['password'] = "La contraseña no debe estar vacía.";
}else if(strlen($password) < 5) {
    $mistakes['password'] = "La contraseña debe tener al menos 5 caracteres.";
}

if(empty($confirm_password)) {
    $mistakes['confirm_password'] = "Este campo no debe estar vacío.";
} elseif ( $password !== $confirm_password) {
    $mistakes['confirm_password'] = "Las contraseñas no coinciden.";
} 



if(count($mistakes) > 0) {
    $_SESSION['failMessage'] = "Hay errores en el formulario. Por favor, revisá los campos e intentalo de nuevo.";
    $_SESSION['mistakes'] = $mistakes;
    $_SESSION['oldData']= $_POST;

    header("Location: ../index.php?section=sign-up-view");
    exit;
}

try {
    (new User)->createUser([
        'name'   => $name,
        'lastname'   => $lastname,
        'email'   => $email,
        'password'   => Encryption::hashPassword($password),
        'role_fk'   => 2,
    ]);
    
    $_SESSION['successMessage'] = "Tu cuenta se creó exitosamente. Ahora puedes iniciar sesión.";

    header("Location: ../index.php?section=log-in-view");
    exit;
} catch (\Exception $e) {
    $_SESSION['failMessage'] = "Ocurrió un error inesperado al intentar crear tu cuenta, intenta más tarde";
    $_SESSION['oldData']= $_POST;
    header("Location: ../index.php?section=sign-up-view");
    exit;
    
}
