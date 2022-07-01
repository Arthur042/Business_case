<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php  
    $pageName = "Mon Compte";
    @include_once 'component/doctype.php';
?>
<body>
    <?php
    // Import du header -----------------------------------------------------------------------------------------------------------------
        @include_once 'component/header/affichageHeader.php';
    ?>
    <main id="gestionCompte">
        <?php
        // Import du fil d'ariane -----------------------------------------------------------------------------------------------------------
        @include_once 'component/breadcrumb/breadcrumb.php';
        ?>

        <section class="monComptePage container">
            du contenu
        </section>
    </main>

    <?php
    // Import du footer et script js ----------------------------------------------------------------------------------------------------
        @include 'component/footer/affichageFooter.php';
    ?>
</body>
</html>