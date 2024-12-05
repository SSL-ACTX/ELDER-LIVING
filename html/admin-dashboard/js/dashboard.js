const ordersUrl = '../php/retrieveAllOrders.php';

fetch(ordersUrl)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const orders = data.orders;
            const orderNumbers = document.querySelector('.order-numbers');
            const productList = document.querySelector('.product-list');
            const dateList = document.querySelector('.date-list');
            const priceList = document.querySelector('.price-list');
            const statusList = document.querySelector('.status-list');

            orderNumbers.innerHTML = '';
            productList.innerHTML = '';
            dateList.innerHTML = '';
            priceList.innerHTML = '';
            statusList.innerHTML = '';

            orders.forEach((order) => {
                const orderIdElement = document.createElement('span');
                orderIdElement.textContent = `#${truncateID(order.order_id)}`;
                orderNumbers.appendChild(orderIdElement);

                const productNames = order.cart.map(item => item.name).join(', ');
                const productElement = document.createElement('span');
                productElement.textContent = truncateProductName(productNames);
                productList.appendChild(productElement);

                const orderDateElement = document.createElement('span');
                orderDateElement.textContent = formatDate(order.created_at);
                dateList.appendChild(orderDateElement);

                const priceElement = document.createElement('span');
                priceElement.innerHTML = formatPrice(order.totalPrice);
                priceList.appendChild(priceElement);

                const statusElement = document.createElement('span');
                statusElement.textContent = formatStatus(order.deliveryStatus);
                statusElement.classList.add(getStatusClass(order.deliveryStatus));
                statusList.appendChild(statusElement);
            });
        } else {
            console.error('No orders found.');
        }
    })
    .catch(error => {
        console.error('Error fetching orders:', error);
    });


// Truncator
function truncateProductName(name) {
    return name.length > 30 ? name.substring(0, 30) + "..." : name;
}
function truncateID(order_id) {
    return order_id.length > 12 ? order_id.substring(0, 12) + "..." : order_id;
}

function formatDate(date) {
    const formattedDate = new Date(date);
    return formattedDate.toLocaleDateString('en-US');
}

function formatPrice(price) {
    return `₱${parseFloat(price).toFixed(2)}`;
}

function formatStatus(status) {
    return status.charAt(0).toUpperCase() + status.slice(1).replace('-', ' ');
}

function getStatusClass(status) {
    switch(status) {
        case 'complete':
            return 'status-completed';
        case 'to-ship':
            return 'status-ship';
        case 'to-pay':
            return 'status-pay';
        case 'to-receive':
            return 'status-receive';
        default:
            return 'status-pending';
    }
}
