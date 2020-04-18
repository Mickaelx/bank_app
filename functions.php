<?php 
$serveur = "localhost";
$base = "bank_app";
$user = "root";
$pass = "";


$connexion = new mysqli($serveur, $user, $pass, $base);

if ($connexion->connect_error) {
    die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
}



function fetch_op_bancaire() {
    global $connexion;
    
    // recupère le GET du form, créé un filtre sur l'input pour le renvoyer sur la requête SQL
    $tri = filter_input(INPUT_GET, 'filtre', FILTER_SANITIZE_SPECIAL_CHARS) ?? "date";
    // retourne la variable formatée 
    $tri_clause = \sprintf("%s DESC", $tri);
    // créé une requête dynamique 
    $sql_op_bancaire = "SELECT 
            op_bancaire.id_op_bancaire,
            type.name_type, 
            op_bancaire.date, 
            op_bancaire.montant, 
            categorie.name_categorie, 
            moyen_paiement.name_paiement
    FROM op_bancaire 
    INNER JOIN type on op_bancaire.type = type.id_type
    INNER JOIN categorie on op_bancaire.categorie = categorie.id_categorie
    INNER JOIN moyen_paiement on op_bancaire.moyen_paiement = moyen_paiement.id_moyen_paiement
    ORDER BY $tri_clause";

    $data_op_bancaire = mysqli_query($connexion, $sql_op_bancaire);
    while ($var = mysqli_fetch_assoc($data_op_bancaire)) {
        extract($var);
        echo "<tr>
                <td id='type'>$name_type</td>
                <td>".strftime('%d %B %Y', strtotime($date))."</td>
                <td id='categorie'>$name_categorie</td>
                <td id='paiement'>$name_paiement</td>
                <td class='text-bold'><h3 id='montant' class='h5'>$montant €</h3></td>
                <td><a class='text-danger' href='delete.php?id=$id_op_bancaire'><h3>x</h3></a></td>
              </tr>";
              
              
    }
    if ($connexion->connect_error) {
        die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
    }
}

function select_input($value) {
    if(filter_input(INPUT_GET, 'filtre', FILTER_SANITIZE_SPECIAL_CHARS) === $value){ 
        echo 'checked';
    }
}

function deleteRow($connexion, $id) {
    global $connexion;
    $sql_delete_row = "DELETE FROM op_bancaire WHERE id_op_bancaire ='".$id."'";
    $data_delete_row = mysqli_query($connexion, $sql_delete_row);
    if(!$data_delete_row){
        throw new Exception('Cannot delete this row');
    }
}



function sum_total_montant() {
    global $connexion;
    $sql = "SELECT SUM(op_bancaire.montant) AS value_sum FROM op_bancaire";
    $data_sum = mysqli_query($connexion, $sql);
    $montant = mysqli_fetch_array($data_sum);
    $somme = $montant['value_sum'];
    echo round($somme, 2);
}

function chart_montant() {
    global $connexion;
    $sql = "SELECT op_bancaire.montant as value_sum, 
                   op_bancaire.date as value_date,
                   type.name_type,
                   categorie.name_categorie as value_categorie
            FROM op_bancaire
            INNER JOIN type on op_bancaire.type = type.id_type
            INNER JOIN categorie on op_bancaire.categorie = categorie.id_categorie
            ORDER BY date ASC";

    $data = mysqli_query($connexion, $sql);
    $checkData = mysqli_num_rows($data);
    
    if($checkData > 0){
        while ($var = mysqli_fetch_assoc($data)) {
            $date[] = $var['value_date'];
            
            if($var['value_sum'] > 0) {
                $montant[] = round($var['value_sum'], 2);
            } else {
                $montant_negatif[] = round($var['value_sum'], 2);
            } 
            
            
        }
    }
    ?>
        <script>
            
            var $date = <?php echo json_encode($date); ?>;
            var $montant = <?php echo json_encode($montant); ?>;
            var $montant_negatif = <?php echo json_encode($montant_negatif); ?>;
        </script><?php
   
}   

function chart_categorie() {
    global $connexion;
    $sql = "SELECT categorie.name_categorie as value_categorie, 
                   SUM(op_bancaire.montant) as value_montant
            FROM op_bancaire 
            INNER JOIN categorie on op_bancaire.categorie = categorie.id_categorie
            GROUP BY categorie";
    $data = mysqli_query($connexion, $sql);
    while($var = mysqli_fetch_assoc($data)){ 
        $name_categorie[] = $var['value_categorie'];
        $montant_categorie[] = round($var['value_montant'], 2);
    } 

    ?>
        <script>
            var $name_categorie = <?php echo json_encode($name_categorie); ?>;
            var $montant_categorie = <?php echo json_encode($montant_categorie); ?>;
        </script><?php
   

    if ($connexion->connect_error) {
        die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
    }
}

function get_montant() {
    if($_POST['type'] == 2){
       return $_POST['montant'];
    } else {
       return $_POST['montant'] * -1;
    }
 }
 