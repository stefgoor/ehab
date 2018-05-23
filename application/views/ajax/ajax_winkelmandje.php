<script>
    $(document).ready(function () {
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
</script>
<?php
if (count($karretje) == 0) {
    echo "<div>Geen producten in het winkelmandje!</div>";
} else {
    echo "<table class='table'>";
    echo "<tr><th>Product</th><th>Aantal</th><th>Totale prijs</th><th></th></tr>";
    $totaalProductPrijs = 0;
    $totaalMandjePrijs = 0;
    foreach ($karretje as $id => $aantal) {
        //controleer op groot of klein product
        if (getTypeProduct($id) == 1) {
            //klein product
            $totaalProductPrijs = $aantal * $producten[$id]->prijsklein;
            echo "<tr><td>" . $producten[$id]->naam . " (klein) </td><td>"
            . anchor('' . $id, '<i class="fas fa-minus-circle"></i>', 'data-id="' . $id . '" class="verlaag"') . $aantal . anchor('', '<i class="fas fa-plus-circle"></i>', 'data-id="' . $id . '_1" class="verhoog"')
            . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
            . anchor('', '<i class="far fa-trash-alt"></i>', 'data-id="' . $id . '" class="verwijder"') . "</td></tr>";
        }
        if (getTypeProduct($id) == 2) {
            //groot product
            $totaalProductPrijs = $aantal * $producten[$id]->prijsgroot;
            echo "<tr><td>" . $producten[$id]->naam . "</td><td>"
            . anchor('' . $id, '<i class="fas fa-minus-circle"></i>', 'data-id="' . $id . '" class="verlaag"') . $aantal . anchor('', '<i class="fas fa-plus-circle"></i>', 'data-id="' . $id . '_2" class="verhoog"')
            . "</td><td>" . zetOmNaarKomma($totaalProductPrijs) . " euro</td><td>"
            . anchor('', '<i class="far fa-trash-alt"></i>', 'data-id="' . $id . '" class="verwijder"') . "</td></tr>";
        }
        $totaalMandjePrijs = $totaalProductPrijs + $totaalMandjePrijs;
    }
    echo "</table>";

    echo '<div id="bestelbar" class="row">';
    echo '<div class="col-6 text-center">';
    echo '<p id="bestelbedrag">Totaal: €' . zetOmNaarKomma($totaalMandjePrijs) . '</p>';
    echo '</div>';
    echo '<div class="col-6 text-center">';
    echo anchor('bestellen/', 'BESTELLEN', "id='bestelknop'");
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>