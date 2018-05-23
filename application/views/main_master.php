<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Stef Goor en Florian D'Haene">
        <meta name="theme-color" content="#ee1c25" />

        <title><?php echo $titel; ?></title>

        <!-- FAVICON -->
        <?php echo link_tag(base_url() . '/assets/images/logos/favicon.ico', 'shortcut icon', 'image/ico'); ?>

        <!-- App Startup configuration -->
        <link rel="manifest" href="http://floriandh.sinners.be/ehab_eetcafe/manifest.json">
        <meta name="application-name" content="Ehab eetcafé">

        <!--Bootstrap-->
        <?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', 'stylesheet'); ?>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

        <!-- Custom CSS -->
        <?php echo pasStylesheetAan("stijl.css"); ?>

        <!--script-->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script type="text/javascript">
            var site_url = '<?php echo site_url(); ?>';
            var base_url = '<?php echo base_url(); ?>';
            document.addEventListener('touchstart', onTouchStart, {passive: true});
        </script>
    </head>

    <body>
        <div id="hoofding"><?php echo $hoofding; ?></div>
        <div id="inhoud"><?php echo $inhoud; ?></div>
        <div id="voetnoot"><?php echo $voetnoot; ?></div>
    </body>
</html>