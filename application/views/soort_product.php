<script>
    
    function haalProductenOp ( soortId ) {
        //vervolledigen (oef 4 - stap 2)
        //roep functie haalAjaxOp_Producten() uit Les3-controller op
        $.ajax({type : "GET",
                url : site_url + "/les3/haalAjaxOp_Producten",
                data : { soort : soortId },
                success : function(result){
                    $("#product").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
    
    function haalProductDetailOp ( id ) {
        //vervolledigen (oef 4 - stap 3)
        //roep functie haalAjaxOp_Product() uit Les3-controller op - zie oef3b
        $.ajax({type : "GET",
                url : site_url + "/les3/haalAjaxOp_Product",
                data : { product : id },
                success : function(result){
                    $("#resultaat").html(result);
                    console.log("true");
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){

        $("#panel").hide();
        
        $( "#soort" ).change(function() {
            haalProductenOp($(this).val());
        });
        
        // hier vervolledigen (oef 4 - stap 3)
        // product-change moet je zelf nog bij aanmaken
        // roep daarin methode haalProductDetailOp() op
                
    });

</script>

<div class="row">
    <div class="col-lg-4">
        <p>
            <?php 
            //hier aanpassen om biersoorten te tonen (oef 4  - stap 1)
            echo form_listboxpro('soort', $biersoorten, 'id', 'naam', 0, array('id' => 'soort', 'size' => '10', 'class' => 'form-control')); 
            ?>
        </p>
        <p id="test">
            <?php echo form_listboxpro('product', array(), 'id', 'naam', 0, array('id' => 'product', 'size' => '10', 'class' => 'form-control')); ?>
        </p>
     </div>
  <div class="col-lg-8">
    <div class="panel panel-primary" id="panel">
        <div class="panel-heading">Product</div>
        <div class="panel-body">
            <p>
                <div id="resultaat"></div>
            </p>
        </div>
    </div>
  </div>
</div>

<hr />

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>