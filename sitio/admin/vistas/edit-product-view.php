<?php

use App\Models\Category;
use App\Models\Product;

$product = (new Product())->byId($_GET['id']);

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
            <h1 class="h title-section-admin">Editar Producto "<b><?= $product->getName_product();?></b>" </h1>
        </section>
        <div class="container d-flex justify-content-center">
            <form action="acciones/edit-product.php?id=<?= $product->getId_product(); ?>" method="POST" enctype="multipart/form-data" class="col-md-10 row g-2 d-flex flex-row align-items-end justify-content-end">
                <div class="col-md-5">
                    <label for="name_product">Nombre del Producto: <span class="form-help" id="help-product-name"> (Debe tener al menos 3 caracteres.) </span> </label>
                    <input type="text" id="name_product" name="name_product" class="form-control"
                    value="<?= $oldData['name_product'] ?? $product->getName_product();?>"
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
                    value="<?= $oldData['price'] ?? $product->getPrice();?>"
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
                    <label for="weight">Peso (gramos):</label>
                    <input type="number" id="weight" 
                    value="<?= $oldData['weight'] ?? $product->getWeight();?>"
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
                    value="<?= $oldData['stock'] ?? $product->getStock();?>"
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
                    ><?= $oldData['detail_product'] ?? $product->getDetail_product();?></textarea>

                    <?php
                if(isset($mistakes['detail_product'])):
                ?>
                    <div class="msg-error" id="detail-error"><?= $mistakes['detail_product'];?></div>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-10">
                    <p>Imagen Actual</p>
                    <?php
                if(!empty($product->getImg())):
                ?>
                <img src="<?= '../images/products/' . $product->getImg(); ?>" alt="">
                <?php
                else:
                ?>
                <p><i>No tiene una imagen.</i></p>
                <?php
                endif;
                ?>
                </div>
                <div class="col-md-10">
                    <label for="img">Imagen del Producto: (opcional)</label>
                    <input type="file" id="img" name="img" class="form-control"
                    aria-describedby="help-image">
                    <p  id="help-image">Elige una imagen solo si querés cambiar la actual.</p>
                </div>
                <div class="col-md-10">
                    <label for="img_description">Descripción de la Imagen: (opcional)</label>
                    <input type="text" id="img_description"
                    value="<?= $oldData['img_description'] ?? $product->getImg_description();?>"
                    name="img_description" class="form-control">
                </div>
                <div class="col-md-10">
                    <label for="category_fk">Categoría:</label>
                    <select name="category_fk" id="category_fk">
                    <?php
                    foreach($categories as $category):
                    ?>
                    <option value="<?=$category->getCategory_id(); ?>"
                    <?=$category->getCategory_id() == ($oldData['category_fk'] ?? $product->getCategory_fk()) ? 'selected' : ''; ?>>
                    <?=$category->getCategory(); ?>
                </option>
                    <?php
                    endforeach;
                    ?>
                    </select>
                </div>

                
                <div class="col-md-6">
                    <button class="btn color-btn" type="submit">Editar</button>
                </div>
            </form>
            <div>

            </div>
        </div>
        </form>
    </div>
</main>