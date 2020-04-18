<?PHP
    require 'functions.php';
    require 'header.php';
?>
        
        <div class="container w-50 pb-3 px-0">
        <a href="index.php" class=" btn btn-secondary">Retour</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mt-5 table-dark text-white rounded p-2">
                    <h3 class="m-auto w-75 text-center text-white pt-3 pb-2">Récapitulatif de vos dépenses</h3>
                    
                    <canvas id='graph1'></canvas>
                    <?PHP chart_montant(); ?>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mt-5 table-dark text-white rounded p-2">
                    <h3 class="m-auto w-75 text-center text-white pt-3 pb-2">Part des catégories</h3>
                    
                    <canvas id='graph2'></canvas>
                    <?PHP chart_categorie(); ?>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mt-5 table-dark text-white rounded p-2">
                    <h3 class="m-auto w-75 text-center text-white pt-3 pb-2">Courbe des dépenses</h3>
                    
                    <canvas id='graph3'></canvas>
                    <?PHP chart_montant(); ?>
                </div>
            </div>
        </div>
        

<?PHP
    require 'footer.php';
?>