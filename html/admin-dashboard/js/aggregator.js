document.addEventListener('DOMContentLoaded', function() {
    const statsURL = '../php/revenueStats.php';

    function updateStats() {
        fetch(statsURL)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    console.error('ERR from server:', data.error);
                    return;
                }
                console.log("Data Fetched!", data);

                // Populate the earnings section
                const earningsElement = document.querySelector('.stats-card .stats-title');
                const earningsValueElement = document.querySelector('.stats-card .stats-value');
                const earningsSubtitleElement = document.querySelector('.stats-card .stats-subtitle');
                earningsValueElement.textContent = `₱${data.totalRevenue.toFixed(2)}`;
                earningsSubtitleElement.textContent = 'Monthly Revenue';

                // Populate the orders section
                const ordersElement = document.querySelectorAll('.stats-card')[1];
                const ordersValueElement = ordersElement.querySelector('.stats-value');
                ordersValueElement.textContent = data.totalOrders;

                // Populate the customers section
                const customersElement = document.querySelectorAll('.stats-card')[2];
                const customersValueElement = customersElement.querySelector('.stats-value');
                customersValueElement.textContent = data.totalCustomers;

                // Customer change update
                const newUserSubtitle = customersElement.querySelector('.stats-subtitle');
                if (data.newUsersCountToday > 0) {
                    newUserSubtitle.textContent = `+${data.newUsersCountToday} today!`;
                } else {
                    newUserSubtitle.textContent = `No new customers today`;
                }

                // --- Monthly Revenue Bars ---
                const maxRevenue = Math.max(...data.monthlyRevenue.map(item => item.revenue));
                const maxBarHeight = 300; // max height; estimated

                // remove all previous bar labels and heights
                const allBars = document.querySelectorAll('.month-column .bar');
                allBars.forEach(bar => {
                    bar.style.height = '0px';
                    bar.innerHTML = '';
                });

                // Now, create new bars with updated data
                data.monthlyRevenue.forEach(item => {
                    const monthIndex = item.month - 1; // month is 1-based, so we'll subtract 1 for array index
                    const revenue = item.revenue;
                    const barHeight = (revenue / maxRevenue) * maxBarHeight;
                    const barElement = document.querySelectorAll('.month-column')[monthIndex].querySelector('.bar');
                    barElement.style.height = `${barHeight}px`;
                    const barLabel = document.createElement('span');
                    barLabel.classList.add('bar-label');
                    barLabel.textContent = `₱${revenue.toFixed(2)}`;
                    barElement.appendChild(barLabel);
                });
            })
            .catch(error => {
                console.error('ERR fetching data:', error);
            });
    }
    updateStats();
    setInterval(updateStats, 6500);
});
