document.addEventListener("DOMContentLoaded", function () {
    const statusMapping = {
        'Pending': 'pending',
        'To Pay': 'to-pay',
        'To Ship': 'to-ship',
        'To Receive': 'to-receive',
        'Complete': 'complete'
    };

    const statusCycle = [
        'Pending',  // status[0]
        'To Pay',   // status[1]
        'To Ship',  // status[2]
        'To Receive', // status[3]
        'Complete'  // status[4]
    ];

    function fetchOrders() {
        fetch("../php/fetchOrders.php")
            .then(response => response.json())
            .then(data => {
                const ordersContainer = document.querySelector(".orders-container");

                const rows = ordersContainer.querySelectorAll(".order-row");
                rows.forEach(row => row.remove());

                data.forEach(order => {
                    const orderRow = document.createElement("article");
                    orderRow.classList.add("order-row");

                    const img = document.createElement("img");
                    img.classList.add("order-image");
                    img.setAttribute("src", order.image);
                    img.setAttribute("alt", "Product thumbnail");

                    const orderId = document.createElement("span");
                    orderId.classList.add("order-id");
                    orderId.textContent = order.product_ids;

                    const customer = document.createElement("span");
                    customer.classList.add("order-customer");
                    customer.textContent = order.customer;

                    const orderDateTime = document.createElement("time");
                    orderDateTime.classList.add("order-datetime");
                    orderDateTime.textContent = order.date_time;

                    const payment = document.createElement("span");
                    payment.classList.add("order-payment");
                    payment.textContent = order.payment_method;

                    const status = document.createElement("span");
                    const statusClass = order.status.toLowerCase().replace(' ', '-');
                    status.classList.add(`status-${statusClass}`);
                    status.textContent = order.status;

                    const priceContainer = document.createElement("div");
                    priceContainer.classList.add("price-container");

                    const price = document.createElement("span");
                    price.classList.add("price");
                    price.innerHTML = `<span class="currency">₱</span>${order.amount}`;

                    const actionIcon = document.createElement("img");
                    actionIcon.classList.add("action-icon");
                    actionIcon.setAttribute("src", "https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/30166cc8c05a11b3c57daff05ddb09546c0d2cad9f1602272110ea5162e2c360?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&");
                    actionIcon.setAttribute("alt", "Action Icon");

                    priceContainer.appendChild(price);
                    priceContainer.appendChild(actionIcon);

                    orderRow.appendChild(img);
                    orderRow.appendChild(orderId);
                    orderRow.appendChild(customer);
                    orderRow.appendChild(orderDateTime);
                    orderRow.appendChild(payment);
                    orderRow.appendChild(status);
                    orderRow.appendChild(priceContainer);

                    ordersContainer.appendChild(orderRow);

                    actionIcon.addEventListener("click", function () {
                        const currentStatusIndex = statusCycle.indexOf(order.status);
                        let newStatus = statusCycle[(currentStatusIndex + 1) % statusCycle.length];

                        const backendStatus = statusMapping[newStatus];

                        fetch('../php/updateOrderStatus.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                orderId: order.id,
                                newStatus: backendStatus
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                status.textContent = newStatus;
                                status.classList.remove(`status-${statusMapping[order.status]}`);
                                status.classList.add(`status-${backendStatus}`);

                                order.status = newStatus;
                                console.log("Status changed successfully", newStatus);

                                fetchOrders();
                            } else {
                                console.error('Failed to update order status');
                            }
                        })
                        .catch(error => {
                            console.error('Error updating order status:', error);
                        });
                    });
                });
            })
            .catch(error => {
                console.error("Error fetching orders:", error);
            });
    }
    fetchOrders();
});
