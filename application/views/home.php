<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #banner{min-height: 100vh;
            height: auto;
            background-image: url(http://floriandh.sinners.be/ehab_eetcafe/assets/images/fotos/omslag.jpg); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top;
            background-attachment: fixed;
            margin-bottom:0px;
            padding-bottom:0px;
            padding-top: 80px;
    }
    #arrow{
        margin-bottom: 0px;
        margin-top: 30px;
        animation: pulseren 2s infinite;
        animation-timing-function: ease-in-out;
    }
    .knopcentreren{
        width: 100%;
        height: auto;
    }
    #titel{
        margin-top: 100px;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 40px;
        text-shadow: 4px 4px 4px #222222;
    }

    body{
        background-color:white;
        overflow-x: hidden;
    }
    #container{
        padding-top: 10px;        
        padding-bottom: 10px;
    }
    .maakZwart{
        color: black;
    }

    .container-fluid{
        margin-bottom:0px;
    }
    .menuitem{
        font-family: 'Comfortaa', cursive;
        font-size: 28px;
        color: white;
        display: block;
        text-align: center;
        padding-top: 13vh;
        padding-bottom: 15%;
        filter: drop-shadow(5px 5px 5px #222222);
    }
    .menuitem:hover{
        color: white;
        opacity: 1;
    }
    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #008CBA;
    }

    .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    #maps{
        margin: 0px;
    }
    #footer{
        text-align: center;
        margin: 5px;
    }

    thead{
        font-family: 'Comfortaa', cursive;
        font-size: 24px;
    }    


    table{
        font-size: 18px;
    }

    .bestelknop{
        margin-top: 50px;
        padding: 20px 40px;
        background-color: #ee1c25; 
        border: 1px solid red;
        font-family: 'Comfortaa', cursive;
        font-size: 26px;
        filter: drop-shadow(5px 5px 5px #222222);
        transition: filter 1s, background-color 1s, border 2s;
    }

    .bestelknop:hover,.bestelknop:active{
        background-color: #ff6666;
        border: 1px solid white;
        font-family: 'Comfortaa', cursive;
        font-size: 26px;
        filter: drop-shadow(7px 7px 7px #222222);
        transition: filter 2s, background-color 2s, border 1s;
    }

    .contact-bar{
        background-color: #ee1c25;
        color: white;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 20px;

    }
    .contact-bar a{

        padding: 15px;
        display: block;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 20px;

    }
    .contact-bar a:hover, .contact-bar a:active{
        background-color: #ff6666;

        text-decoration: none;
    }

    .promo-bar{
        padding:10px;
        background-color: #ee1c25;
        color: white;
        margin: 10px;
        margin-top: 20px;
        font-size: 22px;
        height: 88%;
    }
    .promo-bar i{
        padding: 15px;
        color: white;
        font-size: 20px;
    }
    .promo-bar span{
        margin-top: 40px;
        font-size: 30px;
    }
    .promo-bar:hover, .promo-bar:active{
        background-color: #ff6666;

        text-decoration: none;
    }

    /*voor grote schermen*/
    @media only screen and (min-width: 800px) {
        .knopcentreren{
            margin-top: 25px;
        }
        #banner{
            min-height: 60vh;
            height: 60vh;
            padding-top: 0px;
        }
        #logo{
            margin: 40px;
            display: inline;
        }
        #arrow{
            display: none;
        }
    }

    @keyframes pulseren {
        from {
            transform: scale3d(1, 1, 1);
        }
        50% {
            transform: scale3d(1.5, 1.5, 1.5);
        }
        to {
            transform: scale3d(1, 1, 1);
        }
    }

    /*    css voor automatische achtergronden van categorieen*/
    <?php
    foreach ($categorieenHome as $categorie) {
        echo "#" . verwijderSpatie($categorie->naam) . "{ background-image: url(http://floriandh.sinners.be/ehab_eetcafe/assets/images/categorie/$categorie->foto);"
        . "background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;height: 33vh;"
        . "}\n";
    }
    ?>
</style>
<div id="banner">
    <a title="Terug naar de startpagina" href="#"><image id="logo" src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/logos/Banner_1.png" height="75px" alt="Logo Ehab" ></a>
    <div class="knopcentreren">
        <!--<h1 class=" display-4 text-center" id="titel">EHAB EETCAFÉ</h1>-->
        <p class="lead text-center">
            <?php echo anchor('menu', 'NU BESTELLEN', 'class="btn btn-primary btn-lg bestelknop" role="button"'); ?>
        </p>
        <p class="text-center" id="arrow">
            <a title="Verder gaan op de pagina" href="#container"><image src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/fotos/arrow2.png" height="50px" alt="Pijl naar beneden"></a>
        </p>
    </div>
</div>

<!--Doorlopende lijn-->
<div class="lijn"></div>

<div id="container" class="container-fluid">
    <div class="row no-gutters">
        <!--<div class="offset-lg-1 col-lg-6" id="openingsuren">

            <table class="table text-center">

                <thead class="text-center">
                    <tr><th></th><th class="text-center">Open</th><th class="text-center">Bezorging</th></tr>
                </thead>
                <tbody>
                    <tr>
        <?php
        /* foreach ($openingsuren as $dag) {
          if ($dag->gesloten == 0) {
          echo "<td>" . $dag->dag . "</td><td>" . zetOmNaarHHMM($dag->beginuur) . " - " . zetOmNaarHHMM($dag->einduur) . "</td>";

          if ($dag->bezorging == 1) {
          echo "<td>" . zetOmNaarHHMM($dag->bezorgtijdBegin) . " - " . zetOmNaarHHMM($dag->bezorgtijdEind) . "</td></tr><tr>";
          } else {
          echo "<td>Geen bezorging</td></tr><tr>";
          }
          } else {
          echo "<td>" . $dag->dag . "</td><td colspan='2'>Gesloten</td></tr><tr>";
          }
          } */
        ?>
                    </tr>
                </tbody>

            </table> 
        </div>-->

        <!--        <div class="col-md-6" id="bezorguren">
                    <h1 class="text-center categorie-titel">Bezorging</h1>
                    <table class="table text-center">
                        <tr>
        <?php
        /* foreach ($bezorguren as $dag) {
          if ($dag->gesloten == 0) {
          echo "<td>" . $dag->dag . "</td><td>" . zetOmNaarHHMM($dag->beginuur) . " - " . zetOmNaarHHMM($dag->einduur) . "</td></tr><tr>";
          } else {
          echo "<td>" . $dag->dag . "</td><td>Gesloten</td></tr><tr>";
          }
          } */
        ?>
                        </tr>
                    </table>
                </div>-->

        <!--        Promotiebars-->
        <!--        <div class="col-xl-2 col-lg-4 col-md-4 col-6 d-block">
                    <div class="promo-bar">
                        <div class="text-center"><i class="fas fa-star fa-2x"></i></div>
                        <div class="text-center"><span>Kasterlee Mix Grill<br>€ 14</span></div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 d-block">
                    <div class="promo-bar">
                        <div class="text-center"><i class="fas fa-star fa-2x"></i></div>
                        <div class="text-center"><span>Kasterlee Mix Grill<br>€ 14</span></div>
                    </div>
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="promo-bar">
                        <div class="text-center"><i class="fas fa-star fa-2x"></i></div>
                        <div class="text-center"><span>Kasterlee Mix Grill<br>€ 14</span></div>
                    </div>
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="promo-bar">
                        <div class="text-center"><i class="fas fa-star fa-2x"></i></div>
                        <div class="text-center"><span>Kasterlee Mix Grill<br>€ 14</span></div>
                    </div>
                </div>-->


        <div class="col-xl-6 col-md-6 col-sm-12 col-12"  id="contactgegevens">
            <div class="contact-bar">
                <a href="tel:<?php echo $contact->telefoon; ?>"><i class="fas fa-phone fa-fw fa-lg"></i>  <?php echo $contact->telefoon; ?></a>
            </div>
            <div class="contact-bar">
                <?php
                    $gesloten = $currentUren->gesloten;
                    if($gesloten == 1){
                       echo '<p>Vandaag gesloten</p>';
                    }
                    else{
                        echo '<a href="#"><i class="far fa-clock fa-fw fa-lg"></i>  Vandaag Open: ' . zetOmNaarHHMM($currentUren->beginuur) . ' - ' . zetOmNaarHHMM($currentUren->einduur) .'<i class="fas fa-plus fa-fw fa-lg"></i></a>';
                    }
                ?>
                <p><?php print_r($currentUren)?></p>
            </div>

        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 col-12"  id="contactgegevens">
            <div class="contact-bar">
                <a href="#maps"><i class="fas fa-map-marker-alt fa-fw fa-lg"></i>  <?php echo $contact->adres; ?></a>
            </div>
            <div class="contact-bar">
                <a href="#"><i class="fas fa-car fa-fw fa-lg"></i>  Geen bezorging vandaag</a>
            </div>
        </div>
    </div>
</div>

<!--Doorlopende lijn-->
<div class="lijn"></div>

<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($categorieenHome as $categorie) {
            echo "<div class=\"col-sm-6\" id=\"" . verwijderSpatie($categorie->naam) . "\">"
            . "<a class=\"menuitem categorie-titel\" href=\"http://floriandh.sinners.be/ehab_eetcafe/index.php/menu#" . verwijderSpatie($categorie->naam) . "\"><h2 class=\"text-center\">$categorie->naam</h2></a>"
            . "</div>";
        }
        ?>
    </div>
</div>

<!--Doorlopende lijn-->
<div class="lijn"></div>

<div id="maps">
    <iframe title="Google map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d156.1149773292519!2d4.967312907340246!3d51.24044820000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c14cb2963d3c89%3A0x37ad22f7aa06df6f!2sEhab+eetcafé%2C+Restaurant!5e0!3m2!1snl!2sbe!4v1517871785568" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
