<script>

    function haalBestellingOp (naam) {
        $.ajax({type : "GET",
                url : site_url + "/les3/haalAjaxOp_Bestellingen",
                data : { zoekstring : naam },
                success : function(result){
                    $("#resultaat").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }

    $(document).ready(function(){

        $("#naam").keyup(function() {
            if ( $(this).val() == "") {
                $("#resultaat").html("");
            } else {
                haalBestellingOp($(this).val());   
            }
        });

    });
        
</script>


<div class="panel panel-primary">
    <div class="panel-heading">Zoeken</div>
    <div class="panel-body">    
        <p>
            <div class="form-group">
                <label for="naam">Naam:</label>
                <?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'class' => 'form-control')); ?>
            </div>
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