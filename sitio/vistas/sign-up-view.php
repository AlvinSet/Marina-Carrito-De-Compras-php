<?php

if(isset($_SESSION['mistakes'])) {
    $mistakes = $_SESSION['mistakes'];
    unset($_SESSION['mistakes']);
} else {
    $mistakes = [];
}

if(isset($_SESSION['oldData'])) {
    $oldData = $_SESSION['oldData'];
    unset($_SESSION['oldData']);
} else {
    $oldData = [];
}

?>

<main class="main-content">
    <section class="container">
        <h1 class="mb-1">Crear una Cuenta</h1>

        <form action="acciones/sign-up.php" method="post">
            <div class="form-fila">
                <label for="name">Nombre</label>
                <input value="<?= $oldData['name'] ?? '';?>" type="text" name="name" id="name" class="form-control">

                <?php
                if(isset($mistakes['name'])):
                ?>
                    <div class="msg-error" id="name-error"><?= $mistakes['name'];?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila">
                <label for="lastname">Apellido</label>
                <input value="<?= $oldData['lastname'] ?? '';?>" type="text" name="lastname" id="lastname" class="form-control">

                <?php
                if(isset($mistakes['lastname'])):
                ?>
                    <div class="msg-error" id="lastname-error"><?= $mistakes['lastname'];?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila">
                <label for="email">Email</label>
                <input value="<?= $oldData['email'] ?? '';?>" type="email" name="email" id="email" class="form-control">

                <?php
                if(isset($mistakes['email'])):
                ?>
                    <div class="msg-error" id="email-error"><?= $mistakes['email'];?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">

                <?php
                if(isset($mistakes['password'])):
                ?>
                    <div class="msg-error" id="password-error"><?= $mistakes['password'];?></div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-fila">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">

                <?php
                if(isset($mistakes['confirm_password'])):
                ?>
                    <div class="msg-error" id="confirm-password-error"><?= $mistakes['confirm_password'];?></div>
                <?php
                endif;
                ?>
            </div>
            <button type="submit" class="btn color-btn size-btn mt-1">Crear Cuenta</button>
        </form>
    </section>
</main>
