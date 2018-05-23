<script type="text/javascript">

    function haalTijdofDatumOp(tijdOfDatum) {
        $.ajax({type: "GET",
            url: site_url + "/les3/haalAjaxOp_DatumTijd",
            data: {watDoen: tijdOfDatum},
            success: function (result) {
                $("#resultaat").html(result);
            },
            error: function (xhr, status, error) {
                alert("-- ERROR IN AJAX --\n\n" + xhr.responseText); 
            }
        });
    }

    $(document).ready(function () {
        $("#tijd").click(function () {
            haalTijdofDatumOp("tijd");
        });
        $("#datum").click(function () {
            haalTijdofDatumOp("datum");
        });
    });


</script>


<div class="panel panel-primary">
    <div class="panel-heading">Ajax</div>
    <div class="panel-body">
        <p>
            <?php
            echo form_button(array('name' => 'tijd',
                'id' => 'tijd',
                'content' => 'Tijd',
                'class' => "btn btn-default"));
            echo form_button(array('name' => 'datum',
                'id' => 'datum',
                'content' => 'Datum',
                'class' => "btn btn-default"));
            ?>
        </p>
    </div>
</div>

<p>
<div id="resultaat"></div>
</p>

<hr />

<p>
    <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>