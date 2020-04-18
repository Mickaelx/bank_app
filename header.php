<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#db5945">
    <title>Gestion des données bancaire</title>
    <link rel="icon" href="img\icons\icon-72x72.png"/>
    <link rel="apple-touch-icon" href="img\icons\icon-72x72.png"/>
    <link rel="manifest" href="./manifest.webmanifest">

    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="assets/js/script.js"></script>
    

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
<div id="header" class="header jumbotron fixed-top p-5">
    <div class="row ">
        
        <div class="col-12 col-sm-8 col-lg-6" data-aos="fade-zoom-in"
            data-aos-easing="ease-in"
            data-aos-delay="200"
            data-aos-offset="0">
            <div class="row">
                <div id="special" class="col-12">
                    <h1 class="h4">Gérez vos données bancaires</h1>
                    <p>Consultez vos derniers opérations bancaires ou ajoutez des opérations bancaires</p>
                </div>
                    
                <div id="to-align" class="col-12">
                    <a id="btn_sec" href="form.php" class="btn btn-secondary mr-3">Ajouter une opération</a>
                    <a id="btn_sec" href="stats.php" class="btn btn-secondary rounded">Statistiques</a>
                </div>
            </div>
        </div>
        
        <div id="mobile-align" class="col-12 col-sm-4 col-lg-6" data-aos="fade-zoom-in"
            data-aos-easing="ease-in"
            data-aos-delay="900"
            data-aos-offset="0">
            <h5>Solde actuel:</h5>
            <div class="badge badge-danger">
                <div id="numb" class="h1 p-2">
                    <?PHP sum_total_montant() ?>€
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div id="main-content" class="col-12 col-md-10 col-lg-8 m-auto overflow-hidden" data-aos="fade-up"
     data-aos-duration="1500"
     data-aos-delay="1500">