<!-- hier vervolledigen (oef 2a) -->
<?php
$datum = $brouwerij->oprichting;
if (strpos($datum, '0000') !== false) {
    $datum = "";    
} else {
    $datum = zetOmNaarDDMMYYYY($brouwerij->oprichting);
}
?>
<table class="table table-stiped">
    <tr>
        <?php echo "<th>Naam</th> <td>" . $brouwerij->naam . "</td>" ?>
    </tr>
    <tr>
        <?php echo "<th>Oprichting</th> <td>" . $datum . "</td>" ?>
    </tr>
    <tr>
        <?php echo "<th>Stichter</th> <td>" . $brouwerij->stichter . "</td>" ?>
    </tr>
    <tr>
        <?php echo "<th>Plaats</th> <td>" . $brouwerij->plaats . "</td>" ?>
    </tr>
    <tr>
        <?php echo "<th>Aantal werknemers</th> <td>" . $brouwerij->werknemers . "</td>" ?>
    </tr>
</table>
