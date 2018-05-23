<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Baloo+Paaji|Comfortaa|Fredoka+One');

    #banner{min-height: 20vh; 
            height: auto;
            background-image: url(http://floriandh.sinners.be/ehab_eetcafe/assets/images/fotos/omslag3.jpg); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center bottom;
            background-attachment: fixed;
    }
    #logo{
        margin: 40px;
        filter: drop-shadow(5px 5px 5px #222222);
    }

    .knopcentreren{
        margin-top: -2%;
        color: white;
    }
    body{
        background-color: white;
    }
    #container{
        padding-top: 10px;        
        padding-bottom: 10px;
    }
    #geenmargin{
        margin-bottom: 0px;
    }
    .btn-vak{
        text-align: right;
        align-content: center;
    }
    #footer{
        text-align: center;
        margin: 0px;
    }

    /*opmaak voor navbar*/
    #nav.affix {
        position: fixed;
        top: 0;
        width: 100%;
        z-index:10;
    }

    #sidebar.affix-top {
        position: static;
    }

    #sidebar.affix {
        position: fixed;
        top: 80px;
    }

    #winkelmandje{
        display: none;
    }

    #winkelmandje{
        background-color:#cc9900;
        color: white;

    }
    #winkelmandje table{
        /*padding-top: 20px;
         padding-bottom: 20px;*/
    }
    .hiddenType{
        display: none;
    }



    /*voor grote schermen*/
    @media only screen and (min-width: 760px) {
        #winkelmandje{
            display: block;
        }
    }
</style>
<div id="banner">
    <p id="geenmargin">
        <a class="" href="../">
            <image id="logo" src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/logos/Banner_1.png"/>
        </a>
    </p>
</div>

<div class="lijn"></div>


<div class="container-fluid">
    <h1>Overzicht van uw bestelling:</h1>
    <div id="bestelling">
        <?php
        if (count($karretje) == 0) {
            echo "<p>Geen producten in het winkelmandje!<p>";
        } else {
            echo "<table class='table'>";
            echo "<tr><th>Product</th><th>Aantal</th><th>Totale prijs</th><th></th><tr>";
            $totaalProductPrijs = 0;
            foreach ($karretje as $id => $aantal) {
                //controleer op groot of klein product
                if (getTypeProduct($id) == 1) {
                    //klein product
                    $totaalProductPrijs = $aantal * $producten[$id]->prijsklein;
                    echo "<tr><td>" . $producten[$id]->naam . " (klein) </td><td>"
                    . $aantal . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
                    . anchor('menu/verwijder/' . $id, 'x') . "</td></tr>";
                }
                if (getTypeProduct($id) == 2) {
                    //groot product
                    $totaalProductPrijs = $aantal * $producten[$id]->prijsgroot;
                    echo "<tr><td>" . $producten[$id]->naam . "</td><td>"
                    . $aantal . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
                    . anchor('menu/verwijder/' . $id, 'x') . "</td></tr>";
                }
            }
            echo "</table>";

            //totaalprijs tonen
        }
        ?>
    </div>
    <div id="gegevens">
        <h1>Vul hier uw juiste gegevens in:</h1>
    </div>

</div>


<div id="footer">
    &copy; Stef Goor &amp; Florian D'Haene - 2018 - Project voor: Ehab eetcafé
</div>
