if(window.navigator.onLine == false) {
    console.log(window.navigator.onLine);
    let form_type = document.getElementById("type-1");
    let form_type2 = document.getElementById("type-2");
    let form_date = document.getElementById("date");
    let form_montant = document.getElementById("montant");
    let form_categorie = document.getElementById("categorie");
    let form_moyen_paiement = document.getElementById("moyen_paiement");
    
    let form_submit = document.getElementById("send");
    
    form_submit.addEventListener("click", (e) => {
        e.preventDefault();
        let form_type = document.getElementById("type-1");
        let form_type2 = document.getElementById("type-2");
        if(form_type2 == null) {
            let type = form_type.value;
            localStorage.setItem("type", type);
        } else {
            let type = form_type2.value;
            localStorage.setItem("type", type);  
        }
        
        
        let date = form_date.value;
        localStorage.setItem("date", date);

        let montant = form_montant.value;
        localStorage.setItem("montant", montant);

        let categorie = form_categorie.value;
        localStorage.setItem("categorie", categorie);

        let moyen_paiement = form_moyen_paiement.value;
        localStorage.setItem("moyen_paiement", moyen_paiement);
        console.log('Données ajoutées dans le cache');
    });
}

if(localStorage.length > 0 && window.navigator.onLine == true) {
    let type = localStorage.getItem("type");
    let date = localStorage.getItem("date");
    let montant = localStorage.getItem("montant");
    let categorie = localStorage.getItem("categorie");
    let moyen_paiement = localStorage.getItem("moyen_paiement");

    const request = new XMLHttpRequest();
    request.onload = () => {
        console.log(request.responseText);
    }

    const requestData = `type=${type}&date=${date}&montant=${montant}&categorie=${categorie}&moyen_paiement=${moyen_paiement}`
    console.log(requestData);

    request.open('post', '/bank_app_local/traitement.php');
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(requestData);
    
    localStorage.clear();
       
    
}
        