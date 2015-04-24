var morrisCharts = function() {

   

        Morris.Donut({
        element: 'morris-donut-world-land-use',
        data: [
            {label: "Arable", value: 10.57},
            {label: "Non-Arable", value: 88.38}
            
        ],
        colors: ['#ffb848', '#35aa47', '#4d90fe']
    });
    
      Morris.Donut({
        element: 'morris-donut-top_foods',
        data: [
            {label: "Sugar Cane", value: 20},
            {label: "Maize", value: 20},
            {label: "Wheat", value: 20},
            {label: "Rice", value: 20},
            {label: "Potatoes", value: 20},

        ],
        colors: ['#ffb848', '#35aa47', '#4d90fe','#d84a38','#555555']
    });
    Morris.Donut({
        element: 'morris-donut-arable-land-use',
        data: [
            {label: "Cultivated", value: 30.08},
            {label: "HayLand", value: 6.3},
            {label: "Pasture", value: 11.8},
            {label: "Urban", value: 37.7},
            {label: "Forest", value: 13.3}

        ],
        colors: ['#ffb848', '#35aa47', '#4d90fe','#d84a38','#555555']
    });
}();