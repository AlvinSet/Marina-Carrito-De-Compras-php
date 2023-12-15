<?php

if(isset($_SESSION['oldData'])) {
    $oldData = $_SESSION['oldData'];
    unset($_SESSION['oldData']);
} else {
    $oldData = [];
}

?>
<main class="main-content">
    <section class="container">
        <h1 class="mb-1">iniciar Sesión</h1>

        <form action="acciones/log-in.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input value="<?= $oldData['email'] ?? '';?>" type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-fila">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn color-btn size-btn mt-1">Ingresar</button>
        </form>
    </section>
</main>
