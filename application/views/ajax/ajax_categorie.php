<?php echo haalJavascriptOp("validator.js"); ?>

<style>
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
</style>



<?php
if ($categorie->heeftSaus == 1) {
    $checkedsaus =  true;
} else {
    $checkedsaus= false;
}
if ($categorie->opstartpagina == 1) {
    $checkedstart =  true;
} else {
    $checkedstart = false;
}
if ($categorie->zichtbaar == 1) {
    $checkedzicht = true;
} else {
    $checkedzicht = false;
}

$attributenFormulier = array('id' => 'mijnFormulier',
    'data-toggle' => 'validator',
    'role' => 'form');
echo form_open('dashboard/registreerCategorie', $attributenFormulier)
?>

<div class="form-group">
    <?php
    echo form_input(array('type' => 'hidden', 'name' => 'id', 'id' => 'id', 'value' => $categorie->id));
    ?>
</div>

<div class="form-group">
    <?php
    echo form_labelpro('Naam', 'naam');
    echo form_input(array('name' => 'naam',
        'id' => 'naam',
        'value' => $categorie->naam,
        'class' => 'form-control',
        'placeholder' => 'Naam',
        'required' => 'required'));
    ?>
</div>
<div class="form-group">
    <?php
    echo form_labelpro('Beschrijving', 'beschrijving');
    echo form_input(array('name' => 'beschrijving',
        'id' => 'beschrijving',
        'value' => $categorie->beschrijving,
        'class' => 'form-control',
        'placeholder' => 'Beschrijving'
    ));
    ?>
</div>
<div class="form-group">
    <?php
    echo form_labelpro('Foto toevoegen', 'foto');
//    echo form_input(array('type' => 'file',
//        'name' => 'foto',
//        'id' => 'foto',
//        'value' => $categorie->foto,
//        'class' => 'form-control'));
    echo form_upload($data = '', $value = '', $extra = '');
    ?>
</div>
<div class="form-group">
    <?php
    echo '<div>' . form_labelpro('Bevat saus', 'saus') . '</div>';
    echo '<label class="switch">';
    echo form_checkbox('saus', 'saus', $checkedsaus, '');
    echo '<span class="slider round"></span></label>';
    ?>
</div>
<div class="form-group">
    <?php
    echo '<div>' . form_labelpro('Op de startpagina', 'startpagina') . '</div>';
    echo '<label class="switch">';
    echo form_checkbox('startpagina', 'startpagina', $checkedstart, '');
    echo '<span class="slider round"></span></label>';
    ?>
</div>

<div class="form-group">
    <?php
    echo '<div>' . form_labelpro('Zichtbaarheid', 'zichtbaar') . '</div>';
    echo '<label class="switch">';
    echo form_checkbox('zichtbaar', 'zichtbaar', $checkedzicht, '');
    echo '<span class="slider round"></span></label>';
    ?>
</div>

<div class="form-group">
    <?php echo form_submit('knop', 'Opslaan', "class='btn btn-primary'") ?>
</div> 

<div class="help-block with-errors"></div>
</div>


<?php
echo form_close();
?>