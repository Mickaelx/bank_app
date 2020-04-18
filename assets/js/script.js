window.onload = function() {
    let depense = document.querySelectorAll("#type");
    depense.forEach(depense => {
        if(depense.innerHTML === "Revenu") {
            depense.innerHTML = '<img src="img/plus.png" alt="more-income">';
        } else {
            depense.innerHTML = '<img src="img/minus.png"  alt="less-income">';
        }
    });


// ================================================================

// chartJS
var ctx = document.getElementById('graph1').getContext('2d')

        var data = {
            labels: $date,
            datasets: [
                {   
                    label: "Depense",
                    backgroundColor: 'red',
                    data: $montant_negatif
                },
                {   
                    label: "Revenu",
                    backgroundColor: 'green',
                    data: $montant
                }
            ]
        }
        var options = {
            responsive: true
        }

        var config = {
            type: 'bar',
            data: data,
            options: options
        }

        var graph1 = new Chart(ctx, config)

// ================================================================

var myPieChart = document.getElementById('graph2').getContext('2d')

        var data = {
            labels: $name_categorie,
            datasets: [
                {   
                    label: "Dépense",
                    borderWidth: '1',
                    borderColor: 'rgba(70, 70, 70, 0.452)',
                    backgroundColor: ['rgb(255, 156, 43)', 'rgb(218, 86, 33)', 'rgb(33, 218, 141)', 'rgb(143, 143, 143)', 'rgb(70, 196, 255)'],
                    data: $montant_categorie
                }
            ]
        }
        var options = {
            responsive: true
        }

        var config = {
            type: 'pie',
            data: data,
            options: options
        }

        var graph2 = new Chart(myPieChart, config)



var myPieChart2 = document.getElementById('graph3').getContext('2d')

        var data = {
            labels: $date, 
            datasets: [
                {   
                    label: "Dépense",
                    backgroundColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: '1.5',
                    borderColor: 'red',
                    data: $montant_negatif
                }
            ]
        }
        var options = {
            responsive: true
        }

        var config = {
            type: 'line',
            data: data,
            options: options
        }

        var graph3 = new Chart(myPieChart2, config)


}

    