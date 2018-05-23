<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Naam</th>
            <th>E-mail</th>
            <th>Datum</th>
            <th>Adres</th>
        </tr>
    </thead>
    <tbody>
        
    
    

<?php

// hier vervolledigen (oef 1)
$teller = 1;
foreach ($bestellingen as $bestelling) {
    echo "<tr> <td>" . $teller . "</td> <td>" . $bestelling->naam . "</td> <td>" . $bestelling->email . "</td> <td>" . zetOmNaarDDMMYYYY($bestelling->datum) . "</td> <td>" . $bestelling->adres . "</td> </tr> \n" ;
    $teller++;
}
?>
    </tbody>
</table>