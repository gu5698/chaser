Chart.defaults.global.defaultFontColor = '#fdd084'; 
Chart.defaults.global.defaultFontSize = 0;
 var ctx = document.getElementById('ability').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'radar',

    // The data for our dataset
    data: {
        labels: ["攻擊", "防禦", "隱匿", "耐久", "速度"],
        datasets: [{
            label: '',
            data: [0, 100],
            },
            {
            label: '',
            backgroundColor: 'rgba(116,210,161,.6)',
            borderColor:'#74D2A1',
            borderWidth:3,
            data: [80, 60, 80, 75, 90],
            pointStyle:'star',
            pointBorderColor:'#FFF',
        }]
    },

    // Configuration options go here
    options: {
        scale: {
            gridLines: { color: "#00fafc" },
            angleLines: { color: "#00fafc" },
            pointLabels: {
                fontSize: 15
              }
        },    
    }
    });