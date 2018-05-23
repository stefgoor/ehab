<style>
    body{
        background-color: #595959
    }
    #navPanel{
        background-color: #0f0f0f;
        height: 100vh;
        position:fixed;
        color: white;
        text-align: center;
        padding-top: 10px;
        min-width: 250px;
    }
    #navPanel a{
        color: white;
        padding: 20px;
        font-size: 24px;
        font-weight: bold;
        display: block;
        background-color: #204d74;
        margin-bottom: 10px;
    }
    #navPanel hr{
        background-color: white;
    }


</style>


<div class="container-fluid">
    <div class="row">
        <div id="navPanel" class="col-2">
            <h1>Dashboard</h1>
            <?php echo anchor('dashboard/bestellingen', 'Bestellingen', 'class="" role="button"'); ?>
            <?php echo anchor('dashboard/statistieken', 'Statistieken', 'class="" role="button"'); ?>
            <hr>
            <h1>Beheren</h1>
            <?php echo anchor('dashboard/producten', 'Producten', 'class="" role="button"'); ?>
            <?php echo anchor('dashboard/categorieen', 'Categorieën', 'class="" role="button"'); ?>
            <?php echo anchor('dashboard/gegevens', 'Gegevens', 'class="" role="button"'); ?>
            <?php echo anchor('dashboard/meldAf', 'Uitloggen', 'class="" role="button"'); ?>
            <?php echo anchor('#', 'Naar website', 'class="" role="button"'); ?>
        </div>
    </div>
</div>
 