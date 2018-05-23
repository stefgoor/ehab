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

            <h1>Statistieken zijn momenteel nog niet besschikbaar</h1>
        </div>


    </div>
</div>
