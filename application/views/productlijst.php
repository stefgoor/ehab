<script>

    function haalProductOp(id)
    {
        $.ajax({type : "GET",
                url : site_url + "/les3/haalAjaxOp_Product",
                data : { id : id },
                success : function(result){
                    $("#resultaat").html(result);
                    $('#mijnDialoogscherm').modal('show');
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }

    $(document).ready(function () {

        $(".product").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            haalProductOp(id);
        });

    });

</script>


<div class="panel panel-primary">
    <div class="panel-heading">Biertjes</div>
    <div class="panel-body">
        <p>
            <?php
            foreach ($producten as $product) {
                echo divAnchor('', $product->naam, array('class' => 'product', 'data-id' => $product->id));
            }
            ?>
        </p>
    </div>
</div>

<hr />

<p>
    <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>

<!-- Dialoogvenster -->
<div class="modal fade" id="mijnDialoogscherm" role="dialog">
    <div class="modal-dialog">

        <!-- Inhoud dialoogvenster-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Biertje</h4>
            </div>
            <div class="modal-body">
                <p><div id="resultaat"></div></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
            </div>
        </div>

    </div>
</div>