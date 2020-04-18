    
    
    <?PHP
        require 'functions.php';
        require 'header.php';
        
    ?>
    
    <div class="container w-50 pb-3 px-0">
        <a href="index.php" class=" btn btn-secondary">Retour</a>
    </div>

    <!-- FORM -->
    <div class="formulaire container bg-dark py-3 px-5 rounded text-white pt-2">
        
        <form action="traitement.php" method="post">
            <div class="form-block d-flex flex-column pt-3">
                <h3 class="form-title">Type <span class="text-danger">*</span></h3>
                <label for="type">Selectionnez le type de votre opération</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="type-1" value="1" name="type" class="custom-control-input" required>
                    <label class="custom-control-label" for="type-1">Dépense</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="type-2" value="2" name="type" class="custom-control-input" required>
                    <label class="custom-control-label" for="type-2">Revenu</label>
                </div>
            </div>
            
            <div class="form-block d-flex flex-column pt-4">
                <hr class="p-0 mt-2">
                <label class="form-title" for="date">Choississez une date</label>
                <input  type="date" id="date" name="date" class="form-control"
                        value="2020-03-30">
            </div>
            
            <div class="form-block d-flex flex-column pt-4">
                <hr class="p-0 mt-2">
                <h3 class="form-title">Montant <span class="text-danger">*</span></h3>
                <label for="montant">Entrez un montant</label>
                <input type="number" class="form-control" step="0.01" name="montant" id="montant" required>
            </div>
            
            <div class="form-block d-flex flex-column pt-4">
                <hr class="p-0 mt-2">
                <h3 class="form-title">Catégorie <span class="text-danger">*</span></h3>
                <label for="categorie">Choississez une catégorie</label>
                <select id="categorie" class="form-control" name="categorie" required>
                    <option value="1">Achats et shopping</option>
                    <option value="2">Abonnement</option>
                    <option value="3">Loisirs et sorties</option>
                    <option value="4">Virement interne</option>
                    <option value="5">Salaire</option>
                    <option value="6">Ventes</option>
                </select>
            </div>
            
            <div class="d-flex flex-column pt-4">
                <hr class="p-0 mt-2">
                <h3 class="form-title">Moyen de paiement <span class="text-danger">*</span></h3>
                <label for="moyen_paiement">Selectionnez le moyen de paiement que vous avez utilisé</label>
                <select name="moyen_paiement" class="form-control" id="moyen_paiement" required>
                    <option value="1">Carte bancaire</option>
                    <option value="2">Prélèvement bancaire</option>
                    <option value="3">Cheque</option>
                </select>
            </div>

            <button type="submit" id="send" class="btn btn-danger btn-md mt-5 w-100 mb-5">Envoyer</button>
            </form>
            
            
        </div>
    </div>
    <script src="assets/js/local.js"></script>
    <?PHP  
        require 'footer.php';
    ?>