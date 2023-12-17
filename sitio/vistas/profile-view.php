<?php

use App\Authentication\Authentication;

$usuario = (new Authentication())->getUser() ;
?>

<main class="main-content">
    <section class="container">
        
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card-body text-center">
                <h1 class="mb-1">Mi Perfil</h1>
                <ul>
                    <li><?= $usuario->getName(); ?> </li>
                    <li><?= $usuario->getLastname(); ?> </li>
                    <li><?= $usuario->getEmail(); ?> </li>
                    
                </ul>
                </div>
            
            </div>
        </div>

        
    </section>
</main>