
function chartPie(){

Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// استرداد البيانات من التخزين المحلي
const prayersData = JSON.parse(localStorage.getItem('prayersData'));
console.log(prayersData)

// تجميع البيانات بناءً على الدولة وتجنب التكرارات
const countriesData = {};
const uniqueEmails = new Set(); // لتتبع البريد الإلكتروني الفريد لكل شخص

prayersData.forEach((data) => {
  const email = data.Email;
  const country = data.Nationality;


  // التحقق مما إذا كان البريد الإلكتروني تم استخدامه بالفعل لهذا الشخص
  if (!uniqueEmails.has(email)) {
    if (!countriesData[country]) {
      countriesData[country] = {
        country: country,
        count: 0,
      };
    }

    countriesData[country].count++;
    uniqueEmails.add(email); // إضافة البريد الإلكتروني للمجموعة لتجنب التكرارات
  }
});

console.log(countriesData)
console.log(uniqueEmails)

// ترتيب البيانات بناءً على عدد المشاركات
const sortedData = Object.values(countriesData).sort((a, b) => b.count - a.count);

// استخراج الأربع دول الأكثر مشاركة
const topCountries = sortedData.slice(0, 4);
const otherCountries = sortedData.slice(4);

// تجميع بيانات المخطط
const chartLabels = topCountries.map((data) => data.country);
const chartData = topCountries.map((data) => data.count);
if (otherCountries.length > 0) {
  const otherCount = otherCountries.reduce((total, data) => total + data.count, 0);
  chartLabels.push('دول أخرى');
  chartData.push(otherCount);
}

// بناء المخطط
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: chartLabels,
    datasets: [{
      data: chartData,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});
}
