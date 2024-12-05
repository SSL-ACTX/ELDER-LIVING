document.addEventListener('DOMContentLoaded', () => {
    const category = 'Adaptive Kitchen Tools';
    fetchProducts(category);

    function fetchProducts(category) {
        fetch(`./php/adaptive-kitchen.php?category=${encodeURIComponent(category)}`)
            .then(response => response.json())
            .then(products => {
                renderProducts(products);
            })
            .catch(error => console.error('Error fetching products:', error));
    }

    function renderProducts(products) {
        const container = document.querySelector('.kitchen-tools-container');
        container.innerHTML = '';
        // looping
        products.forEach(product => {
            const productElement = document.createElement('article');
            productElement.classList.add('easy-to-grip');
            productElement.innerHTML = `
                <img src="${product.image || '/assets/default-image.png'}" alt="${product.name}" class="easy-to-grip-image">
                <h1 class="easy-to-grip-text">${product.name}</h1>
                <p class="easy-to-grip-price">₱ ${product.price.toLocaleString()}</p>
                <div class="add-to-cart-btn">
                    <button class="add-to-cart-btn-text">Add to Cart</button>
                </div>
            `;
            container.appendChild(productElement);
        });
        console.log("Adaptive Kitchen Tools loaded...")
    }
});
