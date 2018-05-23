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
$knopVerwijder = form_button("knopVerwijder", "<span class='glyphicon glyphicon-trash'></span>", array('class' => 'btn btn-danger btn-sm btn-round', 'title' => 'Deze categorie verwijderen'));
$knopBewerk = form_button("knopBewerk", "<span class='glyphicon glyphicon-pencil'></span>", array('class' => 'btn btn-warning btn-sm btn-round', 'title' => 'Deze categorie aanpassen'));
$knopToevoegen = form_button("knopToevoegen", "<span class='glyphicon glyphicon-plus'></span>", array('class' => 'btn btn-info btn-sm btn-round', 'title' => 'Een nieuwe categorie toevoegen'));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-2">

            <div class="table-responsive">
                <h1>Gebruiker aanmaken</h1>

                <?php
                $attributes = array('name' => 'mijnFormulier');
                echo form_open('dashboard/registreer', $attributes);
                ?>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <tr>
                        <td><?php echo form_label('Naam:', 'naam'); ?></td>
                        <td><?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '30')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label('Wachtwoord:', 'wachtwoord'); ?></td>
                        <td><?php
                            $data = array('name' => 'wachtwoord', 'id' => 'wachtwoord', 'size' => '30');
                            echo form_password($data);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo form_submit('knop', 'Aanmaken'); ?></td>
                    </tr>
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
