<?php echo haalJavascriptOp("validator.js"); ?>

<?php
$attributenFormulier = array('id' => 'verwijderProductForm',
    'data-toggle' => 'validator',
    'role' => 'form');
echo form_open('dashboard/verwijderCategorie', $attributenFormulier)
?>

<div class="form-group">
    <?php
    echo form_input(array('type' => 'hidden', 'name' => 'id', 'id' => 'id', 'value' => $categorie->id));
    ?>
</div>

<div class="form-group">
    <?php
    //echo form_labelpro('Ben je zeker dat je ' . $categorie->naam . ' wilt verwijderen?', 'knop');
    echo form_labelpro('Categorieën kunnen momenteel nog niet verwijdert worden.', 'knop');
    ?>
</div>
<div class="form-group">
    <?php
    //echo form_submit('knop', 'Ja, verwijderen', "class='btn btn-primary'");
    //echo form_submit('', 'Nee', "class='btn btn-primary'");
    ?>
</div> 

<div class="help-block with-errors"></div>
</div>


<?php
echo form_close();
?>