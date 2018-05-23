<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>

</script>
<style>
    #table{
        margin-top: 20px;
        background-color: white;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 27px;
        margin: 0px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #c12e2a;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2cc36b;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2cc36b;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .btn-round{
        margin-right: 2px;
    }

    #sorteer{
        padding-top: 20px;
        padding-left: 20px;
        float: left;
    }

    #sorteer a{
        margin-left: 20px;
    }

    tbody tr{
        height: 100px;
        text-align: center;
        font-size: 20px;
        padding: auto;
        vertical-align: middle;

    }
    tbody td{
        height: 100%;
        text-align: center;
        font-size: 20px;
        padding: auto;
        vertical-align: middle;

    }

    .accepteerKnop{
        background-color: green;
        height: 100%;
        width: 100%;
        display: block;
        padding: 25px;
        color: white;
    }
    .annuleerKnop{
        background-color: red;
        height: 100%;
        width: 100%;
        display: block;
        padding: 25px;
        color: white;
    }
</style>
<?php
$knopVerwijder = form_button("knopVerwijder", '<i class="far fa-trash-alt"></i>', array('class' => 'btn btn-danger btn-sm btn-round', 'title' => 'Deze categorie verwijderen'));
$knopBewerk = form_button("knopBewerk", '<i class="fas fa-pencil-alt"></i>', array('class' => 'btn btn-warning btn-sm btn-round', 'title' => 'Deze categorie aanpassen'));
$knopToevoegen = form_button("knopToevoegen", '<i class="fas fa-plus"></i>', array('class' => 'btn btn-info btn-sm btn-round', 'title' => 'Een nieuwe categorie toevoegen'));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-2">

            <div class="table-responsive">
                <h1>Openingsuren</h1>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1px">#</th><th>DAG</th><th>TIJDEN</th><th>GESLOTEN</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        /*foreach ($bestellingenNieuw as $bestelling) {
                            $adres = "";
                            if ($bestelling->bezorgmethodeId == 3) {
                                $adres = '<a target="_blank" href="https://www.google.be/maps/place/' . $bestelling->klantStraat . '+' . $bestelling->klantHuisnummer . ',+' . $bestelling->gemeente->postcode . '+' . $bestelling->gemeente->naam . '">' . $bestelling->klantStraat . ' ' . $bestelling->klantHuisnummer . ', ' . $bestelling->gemeente->postcode . ' ' . $bestelling->gemeente->naam . '</a>';
                            }



                            echo "<tr><td>$bestelling->id</td>"
                            . "<td>$bestelling->klantnaam</td>"
                            . '<td><a href="#">Bekijk Bestelling<br>€ 0,00</a></td>'
                            . "<td>" . $bestelling->bezorgmethode->naam . "<br>" . $adres . "</td>"
                            . "<td>" . $bestelling->betaalmethode->naam . "</td>"
                            . '<td><a href="#" class="accepteerKnop"><span class="glyphicon glyphicon-ok"></span></a></td>'
                            . '<td><a href="#" class="annuleerKnop"><span class="glyphicon glyphicon-remove"></span></a></td>'
                            ;
                            echo" </tr>";
                        }*/
                        ?>
                    </tbody>
                </table>

                <h1>Bezorgingstijden</h1>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1px">#</th><th>DAG</th><th>TIJDEN</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        /*foreach ($bestellingenBezig as $bestelling) {
                            $adres = "";
                            if ($bestelling->bezorgmethodeId == 3) {
                                $adres = '<a target="_blank" href="https://www.google.be/maps/place/' . $bestelling->klantStraat . '+' . $bestelling->klantHuisnummer . ',+' . $bestelling->gemeente->postcode . '+' . $bestelling->gemeente->naam . '">' . $bestelling->klantStraat . ' ' . $bestelling->klantHuisnummer . ', ' . $bestelling->gemeente->postcode . ' ' . $bestelling->gemeente->naam . '</a>';
                            }



                            echo "<tr><td>$bestelling->id</td>"
                            . "<td>$bestelling->klantnaam</td>"
                            . '<td><a href="#">Bekijk Bestelling<br>€ 0,00</a></td>'
                            . "<td>" . $bestelling->bezorgmethode->naam . "<br>" . $adres . "</td>"
                            . "<td>" . $bestelling->betaalmethode->naam . "</td>"
                            . '<td><a href="#" class="accepteerKnop"><span class="glyphicon glyphicon-ok"></span></a></td>'
                            . '<td><a href="#" class="annuleerKnop"><span class="glyphicon glyphicon-remove"></span></a></td>'
                            ;
                            echo" </tr>";
                        }*/
                        ?>

                    </tbody>
                </table>

                <h1>Contactgegevens</h1>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1px">#</th><th>SOORT</th><th>INHOUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*foreach ($bestellingenOud as $bestelling) {
                            $adres = "";
                            if ($bestelling->bezorgmethodeId == 3) {
                                $adres = '<a target="_blank" href="https://www.google.be/maps/place/' . $bestelling->klantStraat . '+' . $bestelling->klantHuisnummer . ',+' . $bestelling->gemeente->postcode . '+' . $bestelling->gemeente->naam . '">' . $bestelling->klantStraat . ' ' . $bestelling->klantHuisnummer . ', ' . $bestelling->gemeente->postcode . ' ' . $bestelling->gemeente->naam . '</a>';
                            }



                            echo "<tr><td>$bestelling->id</td>"
                            . "<td>" . zetOmNaarDDMMYYYYHHMM($bestelling->datum) . "</td>"
                            . "<td>$bestelling->klantnaam</td>"
                            . '<td><a href="#">Bekijk Bestelling<br>€ 0,00</a></td>'
                            . "<td>" . $bestelling->bezorgmethode->naam . "<br>" . $adres . "</td>"
                            . "<td>" . $bestelling->betaalmethode->naam . "</td>"
                            ;
                            echo" </tr>";
                        }*/
                        ?>
                    </tbody>
                </table>
                
                <h1>Bezorgmethodes</h1>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1px">#</th><th>METHODE</th><th>BESSCHIKBAAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*foreach ($bestellingenOud as $bestelling) {
                            $adres = "";
                            if ($bestelling->bezorgmethodeId == 3) {
                                $adres = '<a target="_blank" href="https://www.google.be/maps/place/' . $bestelling->klantStraat . '+' . $bestelling->klantHuisnummer . ',+' . $bestelling->gemeente->postcode . '+' . $bestelling->gemeente->naam . '">' . $bestelling->klantStraat . ' ' . $bestelling->klantHuisnummer . ', ' . $bestelling->gemeente->postcode . ' ' . $bestelling->gemeente->naam . '</a>';
                            }



                            echo "<tr><td>$bestelling->id</td>"
                            . "<td>" . zetOmNaarDDMMYYYYHHMM($bestelling->datum) . "</td>"
                            . "<td>$bestelling->klantnaam</td>"
                            . '<td><a href="#">Bekijk Bestelling<br>€ 0,00</a></td>'
                            . "<td>" . $bestelling->bezorgmethode->naam . "<br>" . $adres . "</td>"
                            . "<td>" . $bestelling->betaalmethode->naam . "</td>"
                            ;
                            echo" </tr>";
                        }*/
                        ?>
                    </tbody>
                </table>
                <h1>Betaalmethodes</h1>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1px">#</th><th>METHODE</th><th>BESSCHIKBAAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*foreach ($bestellingenOud as $bestelling) {
                            $adres = "";
                            if ($bestelling->bezorgmethodeId == 3) {
                                $adres = '<a target="_blank" href="https://www.google.be/maps/place/' . $bestelling->klantStraat . '+' . $bestelling->klantHuisnummer . ',+' . $bestelling->gemeente->postcode . '+' . $bestelling->gemeente->naam . '">' . $bestelling->klantStraat . ' ' . $bestelling->klantHuisnummer . ', ' . $bestelling->gemeente->postcode . ' ' . $bestelling->gemeente->naam . '</a>';
                            }



                            echo "<tr><td>$bestelling->id</td>"
                            . "<td>" . zetOmNaarDDMMYYYYHHMM($bestelling->datum) . "</td>"
                            . "<td>$bestelling->klantnaam</td>"
                            . '<td><a href="#">Bekijk Bestelling<br>€ 0,00</a></td>'
                            . "<td>" . $bestelling->bezorgmethode->naam . "<br>" . $adres . "</td>"
                            . "<td>" . $bestelling->betaalmethode->naam . "</td>"
                            ;
                            echo" </tr>";
                        }*/
                        ?>
                    </tbody>
                </table>

            </div>

            <!-- Dialoogvenster -->
            <div class="modal fade" id="dialoogAanpassen" role="dialog">
                <div class="modal-dialog">

                    <!-- Inhoud dialoogvenster-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Categorie aanmaken/aanpassen</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>                           
                        </div>
                        <div class="modal-body">
                            <p><div id="resultaat"></div></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="dialoogVerwijder" role="dialog">
                <div class="modal-dialog">
                    <!-- Inhoud dialoogvenster-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Categorie verwijderen</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>                           
                        </div>
                        <div class="modal-body">
                            <p><div id="resultaatVerwijder"></div></p>
                        </div>
                    </div>
                </div>
            </div>



        </div>


    </div>
</div>
