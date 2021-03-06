<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php  
    $pageName = "La nîmes'alerie";
    @include_once 'component/doctype.php';
?>
<body>

    <?php
    // Import du header -----------------------------------------------------------------------------------------------------------------
        @include_once 'component/header/affichageHeader.php';
    ?>
    <main>

        <!-- carousel écran large -->
        <section id="carousel_part">
            <div class="d-none d-sm-block">
                <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/caroussel/carroussel_crocs.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption lna_carousel_1 d-block">
                          <h5>L'alimentation saine <br> pour chiens et chats heureux</h5>
                          <p>Fabriqué en France. Naturelle. Adaptée à son profil.</p>
                          <a href="#" class="lna_btn_main lna_btn_carousel_dark">Voir la gamme de produits</a>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="img/caroussel/caroussel_space.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption lna_carousel_2 d-flex">
                          <p>-25%</p>
                          <h5>sur l'envoye de votre animal dans l'espace</h5>
                          <p>Avec le code <b>MERCIELON25 </b> </p>
                          <a href="#" class="lna_btn_main lna_btn_carousel_fade">En savoir plus</a>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- carousel mobile -->
            <div class="container d-sm-none">
                <div class="card">
                    <div class="card-illustration">
                        <div class="lna_carousel_img img_crocs"></div>
                        <div class="overlay">
                            <span class="text-light">L'alimentation saine pour chiens & chats heureux</span>
                            <a href="#" class="lna_btn_main lna_btn_light">Voir la gamme de produits</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-illustration">
                        <div class="lna_carousel_img img_space"></div>
                        <div class="overlay">
                            <p class="text-light">-25%</p>
                            <span class="text-light">sur l'envoye de votre animal dans l'espace.</span>
                            <a href="#" class="lna_btn_main lna_btn_light">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- section nouveau produit -->
        <section id="new_order" class="order">

            <div class="container container">
            <h2>Commander à nouveau</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium quis doloremque non.</p>
            <div class="lna_separation"></div>
            <!-- carousel des produits -->
                <div class="lna_container_flex">
                    <!-- fleche gauche -->
                    <div class="lna_arrow"></div>
                    <!-- boucle d'affichage des produits -->
                        <?php
                            @include 'component/productCard/affichageProduits.php';
                        ?>
                    <!-- fleche droite -->
                    <div class="lna_arrow"></div>
                </div>
            </div>


        </section>

        <!-- section meilleur vente -->
        <section id="best_seller" class="order">

            <div class="container container">
            <h2>Meilleures ventes</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium quis doloremque non.</p>
            <div class="lna_separation"></div>
            <!-- carousel des produits -->
                <div class="lna_container_flex">
                    <!-- fleche gauche -->
                    <div class="lna_arrow"></div>
                    <!-- boucle d'affichage des produits -->
                    <?php
                        @include 'component/productCard/affichageProduits.php';
                    ?>
                    <!-- fleche droite -->
                    <div class="lna_arrow"></div>
                </div>
            </div>

        </section>

        <!-- section bandeau réassurant -->
        <section id="reinsurance">

            <div class="container container">
                <div class="row">
                    <div class="col-6 col-xl-3">
                        <div class="lna_reinsurance_img lna_reinsurance_livraison"></div>
                        <p>Livraison <strong>OFFERTE</strong> à partir de 59€</p>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="lna_reinsurance_img lna_reinsurance_expedition"></div>
                        <p>Expédié en <b>48H</b> jours ouvrés</p>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="lna_reinsurance_img lna_reinsurance_client"></div>
                        <p>Service client 6 jours sur 7</p>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="lna_reinsurance_img lna_reinsurance_delivery"></div>
                        <p>Satisfait ou remboursé</p>
                    </div>
                </div>
            </div>

        </section>

        <!-- section marque -->
        <section id="mark" class="order">

            <div class="container container">
                <h2>Les marques</h2>
                <p>TOUTES LES MARQUES</p>
                <div class="lna_separation"></div>
            
                <div class="lna_container_flex">

                    <?php
                    @include 'component/markCard/markCard.php';
                    ?>
                </div>
            </div>

        </section>

        <!-- section elon musk -->
        <section id="space">
            <div class="lna_space_flex container">
                <!-- image -->
                    <div class="lna_overflow_img d-sm-none">
                        <!-- image espace -->
                        <div class="lna_space_img"></div>
                        <!-- image chien -->
                        <div class="lna_space_dog_img"></div>
                    </div>
                    <div class="d-none d-sm-block">
                        <div class="lna_overflow_img">
                            <!-- image espace -->
                            <div class="lna_space_img"></div>
                            <!-- image chien -->
                            <div class="lna_space_dog_img"></div>
                        </div>
                    </div>
                    <div class="container container-sm">
                            <!-- article sur l'envoye d'animaux dans l'espace -->
                            <div class="lna_overflow_text">
                                <article>
                                    <h3>Grâce à Elon Musk, la Nimes’alerie peut désormais envoyer votre ami à quatre pattes dans l’espace</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit vestibulum orci faucibus egestas morbi dictum quis suscipit. Lectus nunc suspendisse sed erat ut. Maecenas vitae, vel nibh ullamcorper nulla eu. Diam sollicitudin sollicitudin natoque amet mi at ultrices. Erat mauris pellentesque vestibulum a etiam erat. Sit habitant proin magna habitant pharetra, pulvinar faucibus mi sed. Diam viverra lobortis habitasse velit sagittis ac quis massa quam. Sit lectus aliquet porttitor vitae egestas mattis odio egestas elementum. Turpis nulla pharetra dolor tellus duis.</p>
                                </article>
                            </div>
                    </div>
            </div>
        </section>

        <!-- section avis client -->
        <section id="client_opinion" class="order">

            <div class="container container-sm">
                <h2>Ce que nos clients disent</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium quis doloremque non.</p>
                <div class="lna_separation"></div>

                <div class="lna_container_flex">
                <!-- carte client -->
                    <?php
                        @include 'component/avisCard/affichageAvis.php';
                    ?>
                </div>
            </div>

        </section>

    </main>

    <?php
    // Import du footer et script js ----------------------------------------------------------------------------------------------------
        @include 'component/footer/affichageFooter.php';
    ?>
</body>
</html>