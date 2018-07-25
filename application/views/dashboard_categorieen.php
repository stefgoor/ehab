<script>

    function haalCategorieOp(id)
    {
        $.ajax({type: "GET",
            url: site_url + "/dashboard/haalAjaxOp_Categorie",
            data: {id: id},
            success: function (result) {
                $("#resultaat").html(result);
                $('#dialoogAanpassen').modal('show');
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function verwijderCategorie(id)
    {
        $.ajax({type: "GET",
            url: site_url + "/dashboard/haalAjaxOp_CategorieVerwijder",
            data: {id: id},
            success: function (result) {
                $("#resultaatVerwijder").html(result);
                $('#dialoogVerwijder').modal('show');
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
            }
        });
    }
    function zoekCategorie() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("zoekInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    $(document).ready(function () {

        $(".categorie").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            haalCategorieOp(id);
        });
        $(".verwijder").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            verwijderCategorie(id);
        });
    });

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
</style>
<?php
$knopVerwijder = form_button("knopVerwijder", '<i class="far fa-trash-alt"></i>', array('class' => 'btn btn-danger btn-sm btn-round', 'title' => 'Deze categorie verwijderen'));
$knopBewerk = form_button("knopBewerk", '<i class="fas fa-pencil-alt"></i>', array('class' => 'btn btn-warning btn-sm btn-round', 'title' => 'Deze categorie aanpassen'));
$knopToevoegen = form_button("knopToevoegen", '<i class="fas fa-plus"></i>', array('class' => 'btn btn-info btn-sm btn-round', 'title' => 'Een nieuwe categorie toevoegen'));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-2">
            <div id="sorteer" class="row">
                <div class="form-inline">
                    <input type="text" id="zoekInput" class="form-control" onkeyup="zoekCategorie()" placeholder="Zoek een categorie..." title="Filter de lijst">
                    <?php
                    echo anchor('', $knopToevoegen, array('class' => 'categorie', 'data-id' => 0));
                    ?>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th><th>CATEGORIE</th><th>BESCHRIJVING</th><th>FOTO</th><th style="width: 50px">SAUS</th><th style="width: 50px">START</th><th style="width: 50px">ZICHT</th><th style="width: 100px">ACTIES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($categorieen as $categorie) {
                                if ($categorie->heeftSaus == 1) {
                                    $checkedsaus = '<span title = "Deze categorie bevat saus" style="font-size:24px; color:green"><i class="fas fa-tint"></i></span>';
                                } else {
                                    $checkedsaus = '';
                                }
                                if ($categorie->opstartpagina == 1) {
                                    $checkedstart = '<span title = "Deze categorie staat op de startpagina" style="font-size:24px; color:green"><i class="fas fa-home"></i></span>';
                                } else {
                                    $checkedstart = '';
                                }
                                if ($categorie->zichtbaar == 1) {
                                    $checkedzicht = '<span class="glyphicon glyphicon-eye-open" title = "Deze categorie is zichtbaar" style="font-size:24px; color:green"></span>';
                                } else {
                                    $checkedzicht = '<span class="glyphicon glyphicon-eye-close" title = "Deze categorie is niet zichtbaar" style="font-size:24px; color:red"></span>';
                                }
                                echo "<td>" . $i++ . "</td><td>$categorie->naam</td><td>$categorie->beschrijving</td><td>$categorie->foto</td><td>$checkedsaus</td><td>$checkedstart</td><td>$checkedzicht</td><td>" . anchor('', $knopBewerk, array('class' => 'categorie', 'data-id' => $categorie->id)) . anchor('', $knopVerwijder, array('class' => 'verwijder', 'data-id' => $categorie->id)) . "</td>";
                                echo" </tr><tr>";
                            }
                            ?>
                        </tr>
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
