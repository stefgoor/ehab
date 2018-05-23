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

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


</style>
<body class="text-center">
    <?php
    $attributes = array('name' => 'mijnFormulier', 'class' => 'form-signin');
    echo form_open('dashboard/controleerAanmelden', $attributes);
    ?>
    <img class="mb-4" src="http://floriandh.sinners.be/ehab_eetcafe/assets/images/logos/icon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Aanmelden om verder te gaan</h1>
    <label for="inputName" class="sr-only">Gebruikersnaam</label>
    <input type="text" id="inputName" class="form-control" placeholder="Gebruikersnaam" required autofocus>
    <label for="wachtwoord" class="sr-only">Wachtwoord</label>

    <?php
    $data = array('name' => 'wachtwoord', 'id' => 'wachtwoord', 'size' => '30', 'class' => 'form-control', 'placeholder' => 'Wachtwoord', 'required' => 'required');
    echo form_password($data);
    ?>
    <h3 class="h3 mb-3 font-weight-normal"><?php echo $fout; ?></h3>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Aanmelden</button>
    <?php echo form_close(); ?>
</body>
