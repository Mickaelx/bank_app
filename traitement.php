<?PHP  
   require 'functions.php';
   

$montant = get_montant();

$injectForm = "INSERT INTO `op_bancaire` (type, date, montant, categorie, moyen_paiement)
               VALUES ('$_POST[type]', 
                       '$_POST[date]', 
                       '$montant', 
                       '$_POST[categorie]', 
                       '$_POST[moyen_paiement]')";


   if (!mysqli_query($connexion, $injectForm)) {
      die('Erreur de connexion ('.$connexion->connect_errno.')'. $connexion->connect_error);
   } else {
      echo "L’enregistrement est ajouté ";
      
      header('Location: index.php');
      exit();
   }

