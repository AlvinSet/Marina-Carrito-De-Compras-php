<main class="main-content">
    <section class="container">
        <h1 class="mb-1">Crear una Cuenta</h1>

        <form action="acciones/sign-up.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input value="<?= $oldData['email'] ?? '';?>" type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-fila">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-fila">
                <label for="confirm-password">Confirmar Contraseña</label>
                <input type="password" name="confirm-password" id="confirm-password" class="form-control">
            </div>
            <button type="submit" class="btn color-btn size-btn mt-1">Crear Cuenta</button>
        </form>
    </section>
</main>
