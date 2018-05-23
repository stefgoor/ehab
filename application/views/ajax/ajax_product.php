<?php echo haalJavascriptOp("validator.js"); ?>

<?php
if ($product->vegetarisch == 1) {
    $checkedvegi =  true;
} else {
    $checkedvegi = false;
}
if ($product->zichtbaar == 1) {
    $checkedzicht = true;
} else {
    $checkedzicht = false;
}

$attributenFormulier = array('id' => 'mijnFormulier',
    'data-toggle' => 'validator',
    'role' => 'form');
echo form_open('dashboard/registreerProduct', $attributenFormulier)
?>

<div class="form-group">
    <?php
    echo form_input(array('type' => 'hidden', 'name' => 'id', 'id' => 'id', 'value' => $product->id));
    ?>
</div>

<div class="form-group">
    <?php
    echo form_labelpro('Naam', 'naam'); 
    echo form_input(array('name' => 'naam',
        'id' => 'naam',
        'value' => $product->naam,
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
        'value' => $product->beschrijving,
        'class' => 'form-control',
        'placeholder' => 'Beschrijving'
        ));
    ?>
</div>
<div class="form-group">
    <?php
    echo form_labelpro('Categorie', 'categorieId');
    echo form_dropdownpro('categorieId', $categorieen, 'id', 'naam', $product->categorieId , 
            array('class' => "form-control",
                "size" => "1", 
                "id" => "categorieId",
                'required' => 'required'));
    ?>
</div>
<div class="form-group">
    <?php
    echo form_labelpro('Prijs klein', 'prijsklein');
    echo form_input(array('name' => 'prijsklein',
        'id' => 'prijsklein',
        'value' => zetOmNaarKomma($product->prijsklein),
        'class' => 'form-control',
        'placeholder' => '12,50'));
    ?>
</div>
<div class="form-group">
    <?php
    echo form_labelpro('Prijs groot', 'prijsgroot');
    echo form_input(array('name' => 'prijsgroot',
        'id' => 'prijsgroot',
        'value' => zetOmNaarKomma($product->prijsgroot),
        'class' => 'form-control',
        'placeholder' => '17,50',
        'required' => 'required'));
    ?>
</div>
<div class="form-group">
    <?php
    echo '<div>' . form_labelpro('Vegetarisch', 'vegetarisch') . '</div>';
    echo '<label class="switch">';
    echo form_checkbox('vegetarisch', 'vegetarisch', $checkedvegi, '');
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