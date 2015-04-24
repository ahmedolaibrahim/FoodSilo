var morrisCharts = function() {
    
     

   
    Morris.Donut({
        element: 'morris-donut-arable-land-use',
        data: [
            {label: "Growing staple food", value: 91077},
            {label: "Cash crops", value: 3500},
            {label: "Pastures", value: 26000},
            {label: "Fuel and Manufacturing", value: 0},
            {label: "Unused", value: 11899},
        ],
        colors: ['#35aa47', '#ffb848', '#4d90fe','#d84a38','#555555']
    });
    
      
       Morris.Donut({
        element: 'morris-donut-arable_population',
        data: [
            {label: "Available Arable Land", value: 23677000},
            {label: "Population", value: 140000000}
            

        ],
        colors: ['#ffb848', '#35aa47']
    });
        Morris.Donut({
        element: 'morris-donut-percentage-land-use',
        data: [
            {label: "Arable", value:33.02},
            {label: "Non Arable", value: 63.84}
            

        ],
        colors: ['#ffb848', '#35aa47']
    });
     Morris.Donut({
        element: 'morris-donut-sufficiency-ratio',
        data: [
            {label: "Arable Land", value: 1},
            {label: "Population", value: 6}
            

        ],
        colors: ['#ffb848', '#35aa47']
    });
     Morris.Donut({
        element: 'morris-donut-actual-ratio',
        data: [
            {label: "Arable Land", value: 1},
            {label: "Population", value: 60}
            

        ],
        colors: ['#ffb848', '#35aa47']
    });

}();