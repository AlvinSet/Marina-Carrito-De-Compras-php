<?php

use App\Models\Category;

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

$categories = (new Category())->allCategories();
?>



<main>
    <div class="contact-container-background">
        <section class="d-flex flex-column justify-content-evenly align-items-center titles-admin-cont">
            <h1 class="h title-section-admin">Crear Producto</h1>
        </section>
        <div class="product-form container d-flex justify-content-center">
            <form action="acciones/publish-product.php" method="POST" enctype="multipart/form-data" class="col-md-10 row g-2 d-flex flex-row align-items-end justify-content-end">
                <div class="col-md-5">
                    <label for="name_product">Nombre del Producto: <span class="form-help" id="help-product-name">(Debe tener al menos 3 caracteres.)</span></label>
                    <input type="text" id="name_product" name="name_product" class="form-control"
                    value="<?= $oldData['name_product'] ?? '';?>"
                    aria-describedby="help-product-name <?= isset($mistakes['product']) ? 'name-error' : '';?>"
                    <?php
                    if(isset($mistakes['product'])):
                    ?>
                    aria-invalid="true"
                    <?php
                    endif;
                    ?>
                    >
                    

                    <?php
                if(isset($mistakes['product'])):
                ?>
                    <div class="msg-error" id="name-error"><?= $mistakes['product'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-5">
                    <label for="price">Precio:</label>
                    <input type="number" id="price" 
                    value="<?= $oldData['price'] ?? '';?>"
                    name="price" class="form-control" 
                    <?php
                    if(isset($mistakes['price'])):
                    ?>
                    aria-invalid="true"
                    aria-describedby="price-error"
                    <?php
                    endif;
                    ?>
                    >

                    <?php
                if(isset($mistakes['price'])):
                ?>
                    <div class="msg-error" id="price-error"><?= $mistakes['price'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-5">
                    <label for="weight">Peso: <span class="form-help" id="help-product-name"> (gramos)</span></label>
                    <input type="number" id="weight" 
                    value="<?= $oldData['weight'] ?? '';?>"
                    name="weight" class="form-control"
                    <?php
                    if(isset($mistakes['weight'])):
                    ?>
                    aria-invalid="true"
                    aria-describedby="weight-error"
                    <?php
                    endif;
                    ?>
                    >

                    <?php
                if(isset($mistakes['weight'])):
                ?>
                    <div class="msg-error" id="weight-error"><?= $mistakes['weight'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-5">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" 
                    value="<?= $oldData['stock'] ?? '';?>"
                    name="stock" class="form-control" 
                    <?php
                    if(isset($mistakes['stock'])):
                    ?>
                    aria-invalid="true"
                    aria-describedby="stock-error"
                    <?php
                    endif;
                    ?>
                    >

                    <?php
                if(isset($mistakes['stock'])):
                ?>
                    <div class="msg-error" id="stock-error"><?= $mistakes['stock'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-10">
                    <label for="detail_product">Descripción del Producto:</label>
                    <textarea class="form-control" name="detail_product" id="detail_product" cols="20" rows="5"  placeholder="Escribir Detalle del Nuevo Producto"
                    <?php
                    if(isset($mistakes['detail_product'])):
                    ?>
                    aria-invalid="true"
                    aria-describedby="detail-error"
                    <?php
                    endif;
                    ?>
                    ><?= $oldData['detail_product'] ?? '';?></textarea>

                    <?php
                if(isset($mistakes['detail_product'])):
                ?>
                    <div class="msg-error" id="detail-error"><?= $mistakes['detail_product'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-10">
                    <label for="img">Imagen del Producto: 
                    <span class="form-help" id="help-product-name"> (opcional)</span>
                    </label>
                    <input type="file" id="img" name="img" class="form-control">
                </div>
                <div class="col-md-10">
                    <label for="img_description">Descripción de la Imagen: <span class="form-help" id="help-product-name"> (opcional)</span>
                    </label></label>
                    <input type="text" id="img_description"
                    value="<?= $oldData['img_description'] ?? '';?>"
                    name="img_description" class="form-control">
                </div>
                <div class="col-md-10">
                    <label for="category_fk">Categoría:</label>
                    <select name="category_fk" id="category_fk">
                    <?php
                    foreach($categories as $category):
                    ?>
                    <option value="<?=$category->getCategory_id(); ?>"
                    <?=$category->getCategory_id() == ($oldData['category_fk'] ?? null) ? 'selected' : ''; ?>>
                    <?=$category->getCategory(); ?>
                </option>
                    <?php
                    endforeach;
                    ?>
                    </select>
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