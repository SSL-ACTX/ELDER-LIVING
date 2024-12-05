document.addEventListener('DOMContentLoaded', function() {
    updateCustomers();
    setInterval(updateCustomers, 8000);
});

function updateCustomers() {
    fetch('../php/fetchCustomers.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            } else {
                console.log("Customers fetched successfully -->", response);
            }
            return response.json();
        })
        .then(customers => {
            const customerList = document.getElementById('customer-list');
            if (!customerList) {
                console.error("Customer list container not found");
                return;
            }

            const updatedCustomerRows = customers.map(customer => {
                const name = customer.name || "Unknown Customer";
                const email = customer.email || "N/A";
                const phone = customer.phone || "N/A";
                const spent = customer.spent || 0;
                const profileImage = customer.profile_image || "placeholder.jpg";

                return `
                    <div class="customer-row" role="listitem">
                        <div class="customer-label">
                            <img src="${profileImage}" alt="Profile Image" class="customer-profile-icon" onerror="this.onerror=null;this.src='placeholder.jpg';">
                            <span class="customer-name">${name}</span>
                        </div>
                        <span class="customer-email">${email}</span>
                        <span class="customer-phone">${phone}</span>
                        <span class="customer-spent">${spent}</span>
                    </div>
                `;
            });
            customerList.innerHTML = updatedCustomerRows.join('');
        })
        .catch(error => {
            console.error('Error fetching data: ', error);
        });
}
