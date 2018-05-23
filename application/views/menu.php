<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
    $(document).ready(function () {
        winkelmandjeLaden();

//        $('form').submit(function (e) {
//            e.preventDefault();
//
//            // setup some local variables
//            var $form = $(this);
//
//            // Let's select and cache all the fields
//            var $inputs = $form.find("input, select, button, textarea");
//
//            // Serialize the data in the form
//            var serializedData = $form.serialize();
//
//            // Let's disable the inputs for the duration of the Ajax request.
//            // Note: we disable elements AFTER the form data has been serialized.
//            // Disabled form elements will not be serialized.
//            $inputs.prop("disabled", true);
//
//            var formData = {
//                'productid': $('input[name=productid]').val(),
//                'aantal': $('input[id=number]').val(),
//                'saus': $('input[name=saus]').val(),
//                'formaat': $('input[name=formaat]').val()
//            };
//
//            voegArtikelToe(serializedData);
//
//            // Callback handler that will be called regardless
//            // if the request failed or succeeded
//            request.always(function () {
//                // Reenable the inputs
//                $inputs.prop("disabled", false);
//            });
//        });
        $(".verlaag").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            verlaagArtikel(id);
        });
        $(".verhoog").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            verhoogArtikel(id);
        });
        $(".verwijder").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            verwijderArtikel(id);
        });
    });
    function winkelmandjeLaden()
    {
        $.ajax({type: "GET",
            url: site_url + "/menu/haalAjaxOp_Winkelmandje",
            success: function (result) {
                $("#winkelmandje").html(result);
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function verlaagArtikel(id)
    {
        $.ajax({type: "GET",
            url: site_url + "/menu/haalAjaxOp_Winkelmandje_Verlaag",
            data: {id: id},
            success: function () {
                winkelmandjeLaden();
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function verhoogArtikel(id)
    {
        $.ajax({type: "GET",
            url: site_url + "/menu/haalAjaxOp_Winkelmandje_Verhoog",
            data: {id: id},
            success: function () {
                winkelmandjeLaden();
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function verwijderArtikel(id)
    {
        $.ajax({type: "GET",
            url: site_url + "/menu/haalAjaxOp_Winkelmandje_Verwijder",
            data: {id: id},
            success: function () {
                winkelmandjeLaden();
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function voegArtikelToe(formData)
    {
        $.ajax({type: "POST",
            url: site_url + "/menu/haalAjaxOp_Winkelmandje_VoegToe",
            data: {formData: formData},
            success: function () {
                winkelmandjeLaden();
//                alert(formData[productid] + formData[aantal] + formData[saus] + formData[3]);
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }

        });
    }
</script>
<?php

function productenWeergeven($categorieen, $sauzen, $active = 'active', $filterCategorie = 'all') {
    $filter = '';
    if ($filterCategorie != 'all') {
        $filter = 'filter';
    }
    echo '<div id="' . verwijderSpatie($filterCategorie) . '" class="tab-pane fade show in ' . $active . '" role="tabpanel" aria-labelledby="v-pills-home-tab">';
    foreach ($categorieen as $categorie) {
        if ($categorie->naam === $filterCategorie || $filterCategorie === 'all') {
            if ($categorie->producten != NULL && $categorie->zichtbaar == 1) {
                echo '<div class="card">';
                echo '<h5 class="card-header categorietitel">' . $categorie->naam;

                //controleren of er een Categorie beschrijving is
                if ($categorie->beschrijving != NULL) {
                    echo '<span class="card-text"> ' . $categorie->beschrijving . '</span>';
                }

                echo '</h5>';

                foreach ($categorie->producten as $product) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $product->naam;
                    //vegetarisch icoon plaatsen indien nodig
                    if ($product->vegetarisch == 1) {
                        echo '  <i title = "Dit product is vegetarisch" class="fas fa-leaf" style="font-size:24px; color:green"></i>';
                    }
                    echo '</h5>';
                    //Controleer of er een beschrijving is
                    if ($product->beschrijving != NULL) {
                        echo '<p class="card-text">' . $product->beschrijving . '</p>';
                    }
                    //Controleer of er een kleine prijs is
                    if ($product->prijsklein != 0) {
                        echo '<button class="btn btn-primary" '
                        . 'id="' . $product->id . '" type="button" data-toggle="collapse" aria-expanded="false" data-target="#' . $product->id . 'klein' . $filter . '" >'
                        . '€ ' . zetOmNaarKomma($product->prijsklein) . ' +</button>';
                    }
                    //Controleer of er een grote prijs is
                    if ($product->prijsgroot != 0) {
                        echo '<button class="btn btn-primary" '
                        . 'id="' . $product->id . '" type="button" data-toggle="collapse" aria-expanded="false" data-target="#' . $product->id . 'groot' . $filter . '" >'
                        . '€ ' . zetOmNaarKomma($product->prijsgroot) . ' +</button>';
                    }
                    //Bestel Product klein
                    echo "<div class=\"collapse\" id=\"$product->id" . "klein" . $filter . "\"> ";
                    echo "<div class=\"card card-body\">";
                    echo form_open('menu/voegEnkelToe', 'class="voegToeForm"');
                    echo '<div class="form-row">';
                    echo '<div class="col">';
                    echo '<div class="form-group">';
                    echo '<label for="number">Aantal kleine ' . $product->naam . '\'s</label>';
                    echo '<input class="form-control" id="number" type="number" min="1" max="20" step="1" value="1" name="aantal' . $product->id . '"/>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col>';
                    echo '<div class="form-group">';
                    //Controleer of er saus nodig is
                    if ($categorie->heeftSaus == 1) {
                        echo '<label for="saus">Kies een saus:</label>';
                        echo '<select class="form-control" name="saus">'
                        . '<option value="0" selected>Geen saus</option>';
                        foreach ($sauzen as $saus) {
                            echo '<option value="' . $saus->id . '">'
                            . $saus->naam
                            . '</option>';
                        }
                        echo '</select><br>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col">';
                    echo '<input class="hiddenType" type="hidden" value="1" name="type"/>';
                    echo '<input class="btn btn-primary" type="submit" value="Toevoegen"/>';
                    echo '</div>';
                    echo '</div>';
                    echo form_close();
                    echo '</div>';
                    //Bestel Product groot
                    echo "<div class=\"collapse\" id=\"$product->id" . "groot" . $filter . "\"> ";
                    echo "<div class=\"card card-body\">";
                    echo form_open('menu/voegEnkelToe', 'class="voegToeForm"');
                    echo '<div class="form-row">';
                    echo '<div class="col">';
                    echo '<div class="form-group">';
                    echo '<label for="number">Aantal ' . $product->naam . '\'s</label>';
                    echo '<input class="form-control" id="number" type="number" min="1" max="20" step="1" value="1" name="aantal' . $product->id . '"/>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col>';
                    echo '<div class="form-group">';
                    //Controleer of er saus nodig is
                    if ($categorie->heeftSaus == 1) {
                        echo '<label for="saus">Kies een saus:</label>';
                        echo '<select class="form-control" name="saus">'
                        . '<option value="0" selected>Geen saus</option>';
                        foreach ($sauzen as $saus) {
                            echo '<option value="' . $saus->id . '">'
                            . $saus->naam
                            . '</option>';
                        }
                        echo '</select><br>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col">';
                    echo '<input class="hiddenType" type="hidden" value="2" name="type"/>';
                    echo '<input class="btn btn-primary toevoegen" type="submit" value="Toevoegen"/>';
                    echo '</div>';
                    echo '</div>';
                    echo form_close();
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
    }
    echo '</div>';
}
?>

<style>

    #banner{min-height: 20vh; 
            height: auto;
            background-image: url(http://floriandh.sinners.be/ehab_eetcafe/assets/images/fotos/omslag.jpg); 
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
    .keuzelijst{
        min-width: 300px;
        float:right;
        max-width: 90%;
    }
    .lijstlinks{
        display: block;
        width: 100%;
        text-align: center;
    }
    .categorietitel{
        background-color:#cc9900;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 40px;
    }
    .categorietitel span{
        font-size: 12px;
        font-style: italic;
    }
    .plus{
        font-size: 35px;
        text-align: right;
    }
    .categorieproduct{
        margin: 5px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
        background-color: white;
        font-size: 18px;
        font-weight: bold;
    }
    .beschrijving{
        font-weight: normal;
        font-size: 14px;
    }
    .productTitel{
        margin: 0px;
        font-size: 20px;
        font-weight: bold;
    }
    .btn-vak{
        text-align: right;
        align-content: center;
    }
    .btn-toevoegen{
        background-color: #0086b3;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        margin-left: 10px;
        margin-right: 0px;
        color: white;
        font-weight: bold;
        font-size: 24px;
        min-width: 150px;
    }
    .labelKnop{
        font-weight: normal;
        font-size: 12px;
    }
    /*opmaak voor bootstrap pills filteren */
    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        color: white;
        background-color: #333333;
    }
    #filterlijst{
        background-color: lightgray;
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


    .menu-panel{
        padding: 10px;
        font-size: 18px;
    }
    #bestelbar{
        font-family: 'Comfortaa', cursive;
        padding-top: 15px;

    }
    #bestelbar p{
        font-size: 25px;
        font-weight: bold;
    }
    #bestelknop{
        padding: 15px 15px;
        background-color: black;
        color: white;
        border: 1px solid white;
        border-radius: 10px; 
        font-size: 15px;
        font-family: 'Comfortaa', cursive;
        transition: background-color 1s, border 2s;
    }

    #bestelknop:hover{
        background-color: #222222;
        font-family: 'Comfortaa', cursive;
        transition: background-color 1s;
    }

    #navbarShopContent{
        color: white;
    }

    /*voor grote schermen*/
    @media only screen and (min-width: 760px) {
        .lijstlinks{
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 15px;
        }
        #nav{
            display: none;
        }
        #winkelmandje{
            display: block;
            max-height: 60vh;
            overflow-y:auto;
            overflow-x:hidden;
        }
    }


    .menu-titel{
        background-color: black;
        padding: 10px;
        margin-top: 10px;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 30px;
    }

</style>




<div class="d-none d-lg-block d-xl-block" id="banner">
    <a href="../">
        <image id="logo" src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/logos/Banner_1.png" height="75px"/>
    </a>
</div>

<div class="lijn d-none d-lg-block d-xl-block"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top d-lg-none">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCategorieContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-utensils fa-lg fa-fw"></i>
    </button>
    <a class="navbar-brand" href="../">
        <image src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/logos/ehab.png" height="30" alt=""/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarShopContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="badge badge-danger">4</span> <i class="fas fa-shopping-basket fa-lg fa-fw"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarCategorieContent">
        <!--filterlijst met categorieen-->
        <ul class="nav navbar-nav mr-auto nav-pills" >
            <li class="nav-item"><a class="nav-item nav-link active" selected data-toggle="pill" href="#all">Alle producten</a></li>
            <?php
            foreach ($categorieen as $categorie) {
                if ($categorie->producten != NULL && $categorie->zichtbaar == 1) {
                    echo "<li class=\"nav-item \"><a class=\"nav-item nav-link\" data-toggle=\"pill\" href=\"#" . verwijderSpatie($categorie->naam) . "\"> $categorie->naam </a></li>";
                }
            }
            ?>
        </ul>
    </div>

    <!-- Winkelkarretje voor mobiel -->
    <div class="collapse navbar-collapse" id="navbarShopContent">
        <div>
            <?php
            if (count($karretje) == 0) {
                echo "<div>Geen producten in het winkelmandje!</div>";
            } else {
                echo "<table class='table'>";
                echo "<tr><th>Product</th><th>Aantal</th><th>Totale prijs</th><th></th><tr>";
                $totaalProductPrijs = 0;
                $totaalMandjePrijs = 0;
                foreach ($karretje as $id => $aantal) {
                    //controleer op groot of klein product
                    if (getTypeProduct($id) == 1) {
                        //klein product
                        $totaalProductPrijs = $aantal * $producten[$id]->prijsklein;
                        echo "<tr><td>" . $producten[$id]->naam . " (klein) </td><td>"
                        . anchor('menu/verwijder/' . $id, '<i class="fas fa-minus-circle"></i>') . $aantal . anchor('menu/voegEnkelToe/' . $id . '_1', '<i class="fas fa-plus-circle"></i>')
                        . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
                        . anchor('menu/verwijderAlle/' . $id, '<i class="far fa-trash-alt"></i>') . "</td></tr>";
                    }
                    if (getTypeProduct($id) == 2) {
                        //groot product
                        $totaalProductPrijs = $aantal * $producten[$id]->prijsgroot;
                        echo "<tr><td>" . $producten[$id]->naam . "</td><td>"
                        . anchor('menu/verwijder/' . $id, '<i class="fas fa-minus-circle"></i>') . $aantal . anchor('menu/voegEnkelToe/' . $id . '_2', '<i class="fas fa-plus-circle"></i>')
                        . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
                        . anchor('menu/verwijderAlle/' . $id, '<i class="far fa-trash-alt"></i>') . "</td></tr>";
                    }
                    $totaalMandjePrijs = $totaalProductPrijs + $totaalMandjePrijs;
                }
                echo "</table>";
                echo '<div id="bestelbar" class="row">';
                echo '<div class="col-6 text-center">';
                echo '<p id="bestelbedrag">Totaal: €' . zetOmNaarKomma($totaalMandjePrijs) . '</p>';
                echo '</div>';
                echo '<div class="col-6 text-center">';
                echo anchor('bestellen/', 'BESTELLEN', 'id="bestelknop" class="btn btn-outline-success my-2 my-sm-0"');
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 sticky-top d-none d-lg-block d-xl-block offset-xl-1 ">
            <div class="sticky-top">
                <div class="menu-titel">
                    <h2>Categorieën</h2>
                </div>
                <!--filterlijst met categorieen-->
                <ul class="nav navbar-nav mr-auto nav-pills nav-fill flex-column" id="filterlijst">
                    <li class="nav-item lijstlinks"><a class="nav-item nav-link active" data-toggle="pill" href="#all">Alle producten</a></li>
                    <?php
                    foreach ($categorieen as $categorie) {
                        if ($categorie->producten != NULL && $categorie->zichtbaar == 1) {
                            echo "<li class=\"nav-item lijstlinks\"><a class=\"nav-item nav-link\" data-toggle=\"pill\" href=\"#" . verwijderSpatie($categorie->naam) . "\"> $categorie->naam </a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>



        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="menu-titel d-none d-lg-block d-xl-block">
                <h2>Menu</h2>
            </div>
            <!--lijst met producten-->
            <div class="tab-content" id="v-pills-tabContent">
                <?php
                productenWeergeven($categorieen, $sauzen, 'active');
                foreach ($categorieen as $categorie) {
                    if ($categorie->producten != NULL && $categorie->zichtbaar == 1) {
                        productenWeergeven($categorieen, $sauzen, '', $categorie->naam);
                    }
                }
                ?>
            </div>
        </div>



        <div class="col-xl-3  col-lg-4 col-md-4 col-sm-12 sticky-top d-none d-lg-block d-xl-block">
            <div class="sticky-top">
                <div class="menu-titel ">
                    <h2>Winkelmandje</h2>
                </div>
                <div id="winkelmandje" class="menu-panel ">
                    <!--Winkelmandje voor groot scherm-->
                    <!--Winkelmandje wordt hier opgeladen door Ajax-->     
                    Winkelmandje wordt geladen...
                </div>
            </div>
        </div>
    </div>
</div>
