<main class="main-content">
    <section class="container">
        <h1 class="mb-1">Ingresar al Panel de Administración</h1>

        <form action="acciones/log-in.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-fila">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn color-btn size-btn mt-1">Ingresar</button>
        </form>
    </section>
</main>
