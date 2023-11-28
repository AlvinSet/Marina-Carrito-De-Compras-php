<main>
    <div class="contact-container-background">
        <section class="d-flex flex-column justify-content-evenly align-items-end contact">
            <h1 class="h title-section">Contacto</h1>
            <p class="slogan text-end p">¿Te gustaria vender tus cultivos en Marina?"</p>
        </section>
        <div class="container d-flex justify-content-end">
            <form action="" method="get" class="col-md-7 row g-2 d-flex flex-row align-items-end justify-content-end">
                <div class="col-md-5">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="last-name">Apellido</label>
                    <input type="text" id="last-name" name="last-name" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="city">Ciudad</label>
                    <input type="text" id="city" name="city" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="province">Provincia</label>
                    <select class="form-select" name="province" id="province">
                        <option value="buenos-aires">Buenos Aires</option>
                        <option value="misiones">Misiones</option>
                        <option value="tierra-fuego">Tierra del Fuego</option>
                        <option value="cordoba">Córdoba</option>

                    </select>
                </div>
                <div class="col-md-10">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-check col-md-10">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Deseo recibir información a mi correo electrónico</label>
                </div>
                <div class="col-md-10">
                    <label for="message">Mensaje</label>
                    <textarea class="form-control" name="message" id="message" cols="20" rows="5" required placeholder="Dejanos saber que productos estas interesado en vender y te contactaremos con toda la información necesaria para ser parte de nuestro equipo!"></textarea>
                </div>
                <div class="col-md-6">
                    <button class="btn color-btn" type="submit">Enviar</button>
                </div>
            </form>
            <div>

            </div>
        </div>
        </form>
    </div>
</main>