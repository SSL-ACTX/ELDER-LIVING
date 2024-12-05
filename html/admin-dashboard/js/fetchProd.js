document.addEventListener("DOMContentLoaded", function () {

    fetch("../php/fetchProd.php")
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector(".products-container");

            data.forEach(product => {
                const productArticle = document.createElement("article");
                productArticle.classList.add("price-container");

                const img = document.createElement("img");
                img.classList.add("product-image");
                img.setAttribute("src", product.image);
                img.setAttribute("alt", `Product thumbnail for ${product.name}`);

                const name = document.createElement("p");
                name.classList.add("product-details");
                name.textContent = product.name;

                const category = document.createElement("p");
                category.classList.add("category");
                category.textContent = product.category;

                const priceWrapper = document.createElement("div");
                priceWrapper.classList.add("price-wrapper");

                const price = document.createElement("span");
                price.classList.add("currency");
                price.textContent = `₱ ${product.price.toFixed(2)}`;

                const priceIcon = document.createElement("img");
                priceIcon.classList.add("price-icon");
                priceIcon.setAttribute("src", "https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/30166cc8c05a11b3c57daff05ddb09546c0d2cad9f1602272110ea5162e2c360?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&");
                priceIcon.setAttribute("alt", "Price Icon");

                // append
                priceWrapper.appendChild(price);
                priceWrapper.appendChild(priceIcon);
                productArticle.appendChild(img);
                productArticle.appendChild(name);
                productArticle.appendChild(category);
                productArticle.appendChild(priceWrapper);
                productsContainer.appendChild(productArticle);
            });
            console.log("Products loaded ->", data)
        })
        .catch(error => {
            console.error("ERR fetching products:", error);
        });
});
