<header>
    <!-- banniere -->
    <div class="banner d-flex justify-content-center text-light">
        <!-- banniere gauche -->
        <div class="d-flex justify-content-center lna_banner_position">
            <div class="d-none d-sm-inline-block lna_banner_img lna_img_truck"><span class="d-none">livraison</span></div>
            <p>Livraison offerte dès 59€</p>
        </div>
        <!-- banniere centre -->
        <div class="d-flex justify-content-center lna_banner_position">
            <div class="d-none d-sm-inline-block lna_banner_img lna_img_delivery"><span class="d-none">retour gratuit</span></div>
            <p>Retour gratuit sous 30 jours</p>
        </div>
        <!-- banniere droite -->
        <div class="d-flex justify-content-center lna_banner_position">
            <div class="d-none d-sm-inline-block lna_banner_img lna_img_safe"><span class="d-none">paiement sécurisé</span></div>
            <p>paiement sécurisé</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="logo_search_cut col-12">
                <div class="row">
                    <!-- logo -->
                    <div class="col-3 col-md-2 lna_logo p-0 ps-2 mb-3 mt-2">
                        <h1 class="d-none">La Nîmes'alerie</h1>
                        <img src="img/header/animalerieLogo.png" alt="logo de la nîmes'alerie">
                    </div>
                    <!-- fin logo -->
                    <div class="displaySearchBar col-9 col-md-5 ps-5">
                        <?php
                            if (isset($_SESSION['isConnected'])) {
                                ?>
                                <p class="personalHello">Bonjour <span><?=htmlentities($_COOKIE['name'])?></span></p>
                                <?php
                            }
                        ?>
                        <!-- barre de recherche -->
                        <form action="" method="get" class="<?php 
                        if (isset($_SESSION['isConnected'])) {
                            echo 'mt-0';
                        } else {
                            echo 'mt-4';
                        }
                        ?>">
                            <div class="input-group d-inline-block ">
                                <div class="form-outline">
                                    <input type="search" id="search" class="form-control"
                                        placeholder="Recherche ( nom du produit, marque )" />
                                    <label class="form-label d-none" for="search">barre de recherche</label>
                                </div>
                                <button type="button" class="btn lna_btn_fade d-none d-md-inline-block">
                                    <span class="lna_search_logo"></span></button>
                            </div>
                        </form>
                    </div>
                    <!-- fin barre de recherche -->

                    <!-- icone + menu burger -->
                    <div class="col-7 col-md-4 mt-1">
                        <div class="lna_displayHeaderIcon">
                            <!-- icone account -->
                            <div class="lna_header_icon" data-bs-toggle="modal" data-bs-target="#connectionModal">
                                <div class="lna_account">
                                    <span class="d-none">icone de compte</span>
                                </div>
                                <p class="d-none d-lg-block">
                                    <?php
                                    if (isset($_SESSION['isConnected'])) {
                                        echo "Mon compte";
                                    } else {
                                        echo "Connectez-vous";
                                    }
                                    ?>
                                </p>
                            <?php
                                // Si l'utilisateur est connecté et que la sessionest ouverte
                                    if (isset($_SESSION['isConnected'])) {
                                        include_once 'component/header/modal/gestionCompte.php';
                                    } 
                            ?>
                        </div>
                            <?php
                                // Si il y a un cookie mais aps de ssession on recharge la page et on génère un cookie
                                if (!empty($_COOKIE['session'])){
                                    $_SESSION['isConnected'] = true;
                                    $_SESSION['name']= $_COOKIE['name'];
                                    header('Location: index.php');
                                } else{ // Si il n'y a pas de cookie ou de session affiche les formulaire de connexion et inscription
                                    // import du snippet de connexion ---------------------------------------------------------------------
                                        include_once 'component/header/modal/connection.php';
                                    // import du snippet d'inscription ---------------------------------------------------------------------
                                        include_once 'component/header/modal/inscription.php';
                                }
                            ?>


                            <!-- icone panier -->
                            <div class="lna_header_icon shop">
                                <div class="lna_shop">
                                    <span class="d-none">icone de panier</span>
                                </div>
                                <p class="d-none d-lg-block">Panier</p>

                                <!-- modal de panier -->
                                <div class="myModal d-none">
                                    <div class="myModalBody">
                                        <!-- composant item panier --------------------------------------------------------------------------------------------->
                                        <div class="myModalItem">
                                            <img src="img/product_item/product_one.png" alt="image miniature du produit"
                                                class="myModalPanierImg">
                                            <div class="myModalResumeProduct">
                                                <div class="myModalTopResume">
                                                    <p>Pet Partner</p> <!-- marque du produit-->
                                                    <p>Pet products Cage pour petits animaux Gonzales S </p>
                                                    <!-- nom du produit-->
                                                </div>
                                                <div class="myModalBottomResume">
                                                    <p class="myModalQuantity"> quantité : 1</p>
                                                    <p class="myModalPriceProduct">59,99 €</p>
                                                </div>
                                            </div>
                                            <div class="myModalDeleteProduct"></div>
                                        </div>
                                        <!-- composant item panier --------------------------------------------------------------------------------------------->
                                        <div class="myModalItem">
                                            <img src="img/product_item/product_two.png" alt="image miniature du produit"
                                                class="myModalPanierImg">
                                            <div class="myModalResumeProduct">
                                                <div class="myModalTopResume">
                                                    <p>Pet Partner</p> <!-- marque du produit-->
                                                    <p>Pet products Cage pour petits animaux Gonzales S </p>
                                                    <!-- nom du produit-->
                                                </div>
                                                <div class="myModalBottomResume">
                                                    <p class="myModalQuantity"> quantité : 2</p>
                                                    <p class="myModalPriceProduct">66,98 €</p>
                                                </div>
                                            </div>
                                            <div class="myModalDeleteProduct"></div>
                                        </div>
                                        <div class="myModalPrice">
                                            <div class="myModalDelivery">
                                                <p>Livraison : </p>
                                                <p>Offerte</p>
                                            </div>
                                            <div class="myModalTotalPrice">
                                                <p>Montant Total : </p>
                                                <p>126,97 €</p>
                                            </div>
                                        </div>

                                        <button class="lna_btn_main lna_btn_fade_color">Accéder au panier</button>
                                    </div>
                                </div>
                            </div>


                            <!-- icone commande -->
                            <div class="lna_header_icon">
                                <div class="lna_commande"><span class="d-none">icone de commande</span></div>
                                <p class="d-none d-lg-block">Commandes</p>
                            </div>
                        </div>
                    </div>
                    <button class="btn lna_btn col-2 offset-2 d-md-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="d-none">menu de
                            navigation</span></button>
                    <!-- fin icone + menu burger -->
                </div>
            </div>

            <!-- navbar -->
            <nav class="d-none d-md-block">
                <ul>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleDog"><img
                                src="img/icon/header/dog.svg" alt="icone de chien"> Chien</a></li>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleCat"><img
                                src="img/icon/header/cat.svg" alt="icone de chat"> Chat</a></li>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleRat"><img
                                src="img/icon/header/rabbit.svg" alt="icone de Rongeur"> Rongeur</a></li>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleFish"><img
                                src="img/icon/header/fish.svg" alt="icone de poisson"> Aqua</a></li>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleSnake"><img
                                src="img/icon/header/turtle.svg" alt="icone de reptile"> Terrario</a></li>
                    <li class="opened"><a data-bs-toggle="offcanvas" role="button" href="#" id="buttonToggleBird"><img
                                src="img/icon/header/bird.svg" alt="icone d'oiseau"> Oiseau</a></li>
                    <li><a href="#"><img src="img/icon/header/rocket.svg" alt="icone de fusée"> <span
                                class="d-none d-lg-block">votre animal dans l</span> <span class="d-lg-none">L</span>
                            'espace</a></li>
                </ul>
            </nav>
            <!-- fin navbar -->

        </div>
    </div>

    <!-- offcanva menu mobile -->
    <div class="offcanvas offcanvas-end offcanvasMobileNavBar" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn offcanvasCloseBtn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- offcanva sous categorie -->
        <div class="offcanvas-body">
            <ul id="mainOffcanvas">
                <li class="toClosejsOffcanvas"><a id="toggleDog"><img src="img/icon/offCanva/dog.png"
                            alt="icone de chien"> Chien</a></li>
                <li class="toClosejsOffcanvas"><a id="toggleCat"><img src="img/icon/offCanva/cat.png"
                            alt="icone de chat"> Chat</a></li>
                <li class="toClosejsOffcanvas"><a id="toggleFish"><img src="img/icon/offCanva/fish.png"
                            alt="icone de poisson"> Aqua</a></li>
                <li class="toClosejsOffcanvas"><a id="toggleRat"><img src="img/icon/offCanva/rabbit.png"
                            alt="icone de Rongeur"> Rongeur</a></li>
                <li class="toClosejsOffcanvas"><a id="toggleSnake"><img src="img/icon/offCanva/turtle.png"
                            alt="icone de reptile"> Terrario</a></li>
                <li class="toClosejsOffcanvas"><a id="toggleBird"><img src="img/icon/offCanva/bird.png"
                            alt="icone d'oiseau"> Oiseau</a></li>
                <li class="toClosejsOffcanvas"><a href="#"><img src="img/icon/offCanva/rocket.png" alt="icone de fusée">
                        <span class="d-none d-lg-block">votre animal dans l</span> <span class="d-lg-none">L</span>
                        'espace</a></li>
            </ul>

            <!-- offcanvas au clique sur chien -->
            <div class="offcanvasDog">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Jouets</a></li>
                        <li><a href="#">Colliers et laisses</a></li>
                        <li><a href="#">Hygiène et soins</a></li>
                        <li><a href="#">Gamelles et distributeurs</a></li>
                        <li><a href="#">Compléments alimentaires</a></li>
                        <li><a href="#">Nourriture pour chiens</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>

            <!-- offcanvas au clique sur chat -->
            <div class="offcanvasCat">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Jouets</a></li>
                        <li><a href="#">Voyage et transport</a></li>
                        <li><a href="#">Arbre à chat</a></li>
                        <li><a href="#">Toilettage et hygiène</a></li>
                        <li><a href="#">Gamelles et distributeurs</a></li>
                        <li><a href="#">Litière pour chat</a></li>
                        <li><a href="#">Nourriture pour chat</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>

            <!-- offcanvas au clique sur rongeur -->
            <div class="offcanvasRat">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Alimentation</a></li>
                        <li><a href="#">Hygiène et soins</a></li>
                        <li><a href="#">Cages et accessoires</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>

            <!-- offcanvas au clique sur poisson -->
            <div class="offcanvasFish">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Traitements et soins</a></li>
                        <li><a href="#">Filtrations</a></li>
                        <li><a href="#">Aquariums</a></li>
                        <li><a href="#">Nourritures pour poissons</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>

            <!-- offcanvas au clique sur reptile -->
            <div class="offcanvasSnake">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Accessoires</a></li>
                        <li><a href="#">Décoration</a></li>
                        <li><a href="#">Substrat</a></li>
                        <li><a href="#">Chauffage</a></li>
                        <li><a href="#">Éclairage</a></li>
                        <li><a href="#">Nourriture pour reptiles</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>

            <!-- offcanvas au clique sur oiseau -->
            <div class="offcanvasBird">
                <div class="targetDogDisplay">
                    <ul class="secondCanvas">
                        <li><a href="#">Nichoires</a></li>
                        <li><a href="#">Mangeoires</a></li>
                        <li><a href="#">Hygiène et soins</a></li>
                        <li><a href="#">Habitats</a></li>
                        <li><a href="#">Nourriture pour oiseaux</a></li>
                    </ul>
                    <!-- pointeur du lien cliqué en background -->
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- fin offcanva menu -->
</header>

<?php
// import du off canvas de labarre de navigation--------------------------------------------------------------------------------------
    @include_once 'component/header/affichageOffCanvaDesktop.php'
?>