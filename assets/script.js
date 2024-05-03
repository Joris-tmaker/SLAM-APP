fetch('../Api/stats_api.php')
    .then(response => response.json())
    .then(data => {
        const regions = data.map(entry => entry.region);
        const nombreDeComptesRendus = data.map(entry => entry.nombre_de_comptes_rendus);

        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: regions,
                datasets: [{
                    label: 'Nombre de comptes rendus par région',
                    data: nombreDeComptesRendus,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Couleur de fond des barres
                    borderColor: 'rgba(54, 162, 235, 1)', // Couleur de la bordure des barres
                    borderWidth: 0.5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Erreur lors de la récupération des données:', error));