function createBarChartAdmin(){
    // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  
  
  var prayersData = JSON.parse(localStorage.getItem('prayersData'));
  // console.log(prayersData)
  
  var labels = prayersData.map(function(prayer) {
    var dateParts = prayer.Date.split('-');
    // var month = dateParts[1];
    // var year = dateParts[2];
    var nameMonth = dateParts[3];
    // console.log(nameMonth);
    return nameMonth;
  });
  
  var uniqueLabels = [...new Set(labels)];
  // console.log(uniqueLabels);
  // var maxVotes = 0;
  var monthlyTotals = {};
  
  for (var key in prayersData) {
    if (prayersData.hasOwnProperty(key)) {
      var prayer = prayersData[key];
      var votes = parseInt(prayer.NumberPrayers);
      
      // if (votes > maxVotes) {
      //   maxVotes = votes;
      // }
  
      var dateParts = prayer.Date.split('-');
      var month = dateParts[1];
  
      if (!monthlyTotals[month]) {
        monthlyTotals[month] = 0;
      }
  
      monthlyTotals[month] += votes;
    }
  }
  // console.log(monthlyTotals);
  var sortedValues = Object.entries(monthlyTotals)
  .sort(function(a, b) {
    return parseInt(a[0]) - parseInt(b[0]);
  })
  .map(function(entry) {
    return entry[1];
  });
  // Bar Chart Example
  var ctx = document.getElementById("myBarChart");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: uniqueLabels,
      datasets: [{
        label: "Revenue",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: Object.values(sortedValues),
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 12
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: Math.max(...Object.values(monthlyTotals)),
            maxTicksLimit: 5
          },
          gridLines: {
            display: true
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
  }