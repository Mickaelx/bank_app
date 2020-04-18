<?PHP
    require 'functions.php';
    require 'header.php';
?>
        

        
        <!--
            
            -->
            
            <h3 class="m-auto w-75 text-center pb-4 ">Vos dernières opérations bancaires</h3>
            <table class="table table-dark rounded text-white">
                <thead class="mx-4">
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Moyen de paiement</th>
                        <th scope="col">Montant</th>
                        <td scope="col">Action</td>
                    </tr>
                    
                </thead>
            
                <tbody >
                    <?PHP fetch_op_bancaire($connexion); ?>
                </tbody>
            </table>

            <div class="rounded form-block p-2 m-auto ">
                <form action="index.php" method="GET" class="text-secondary float-right">
                    <div class="custom-control custom-radio custom-control-inline" data-aos="fade-left" data-aos-delay="400">
                        <input type="radio" class="custom-control-input" value="date" name="filtre" id="filtre_date" <?php select_input($value = "date") ?>>
                        <label class="custom-control-label" for="filtre_date">Date</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline" data-aos="fade-left" data-aos-delay="600">
                        <input type="radio" class="custom-control-input" value="montant" name="filtre" id="filtre_montant" <?php select_input($value = "montant") ?>>
                        <label class="custom-control-label" for="filtre_montant">Montant</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline" data-aos="fade-left" data-aos-delay="800">
                        <input type="radio" class="custom-control-input" value="name_type" name="filtre" id="filtre_type" <?php select_input($value = "name_type")?>>
                        <label class="custom-control-label" for="filtre_type">Type</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline" data-aos="fade-left" data-aos-delay="1000">
                        <input type="radio" class="custom-control-input" value="categorie" name="filtre" id="filtre_categorie" <?php select_input($value = "categorie") ?>>
                        <label class="custom-control-label" for="filtre_categorie">Catégorie</label>
                    </div>
                    <input type="submit" value="filtrer" class="btn btn-secondary rounded" data-aos="fade-left" data-aos-delay="1200">
                </form>
            </div>
            
            </div>
            
<?PHP  
    require 'footer.php';
?>