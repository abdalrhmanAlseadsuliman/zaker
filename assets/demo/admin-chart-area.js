function createChartAreaAdmin() {
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  var prayersData = JSON.parse(localStorage.getItem('prayersData'));

  var maxMonthData = prayersData.reduce(function(prev, current) {
    var prevDateParts = prev.Date.split('-');
    var prevMonth = parseInt(prevDateParts[1]);
    var currentMonth = parseInt(current.Date.split('-')[1]);

    // تحديد الشهر الأكبر
    if (currentMonth > prevMonth) {
      return current;
    } else {
      return prev;
    }
  });

  // استخراج جميع بيانات الشهر الأكبر
  var maxMonth = maxMonthData.Date.split('-')[1];
  var maxMonthDataArray = [];
  var dailyTotals = {};

  prayersData.forEach(function(prayer) {
    var prayerMonth = prayer.Date.split('-')[1];
    if (prayerMonth === maxMonth) {
      var date = prayer.Date.split('-')[0];
      if (dailyTotals[date]) {
        dailyTotals[date] += parseInt( prayer.NumberPrayers);
      } else {
        dailyTotals[date] = parseInt(prayer.NumberPrayers);
      }
    }
  });

  for (var date in dailyTotals) {
    maxMonthDataArray.push({
      Date: date,
      NumberPrayers: dailyTotals[date]
    });
  }

  // console.log("بيانات الشهر الأكبر:");
  // console.log(maxMonthDataArray);


  var maxMonthDataArraySorted = maxMonthDataArray.sort(function(a, b) {
    return parseInt(a.Date) - parseInt(b.Date);
  });
  // console.log(maxMonthDataArray);

  // var labels = maxMonthDataArraySorted.map(function(prayer, index) {
  //   var day = prayer.Date;
  //   if (day.length === 1) {
  //     day = '0' + day;
  //   }
  //   var labelIndex = index + 1;
  //   return labelIndex + ': ' + '{Date: \'' + day + '\', NumberPrayers: ' + prayer.NumberPrayers + '}';
  // });

  var labels = maxMonthDataArraySorted.map(function(prayer) {
    return maxMonth + '-' + prayer.Date;
  });

  console.log(labels);

  var maxPrayerCount = Math.max.apply(Math, Object.values(dailyTotals));

  var yAxesMax = Math.ceil(maxPrayerCount / 1000) * 1000;

  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Sessions",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: maxMonthDataArray.map(function(prayer) {
          return prayer.NumberPrayers;
        }),
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: yAxesMax,
            maxTicksLimit: 5
          },
          gridLines: {
            color: "rgba(0, 0, 0, .125)",
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
}