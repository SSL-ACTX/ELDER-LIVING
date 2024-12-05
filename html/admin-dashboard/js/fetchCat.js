document.addEventListener("DOMContentLoaded", function () {
    fetch("../php/fetchCat.php")
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector(".products-container");

            data.forEach(category => {
                const categoryArticle = document.createElement("article");
                categoryArticle.classList.add("price-container");

                const img = document.createElement("img");
                img.classList.add("product-image");
                img.setAttribute("src", category.firstProductImage);
                img.setAttribute("alt", `Category thumbnail for ${category._id}`);

                const name = document.createElement("p");
                name.classList.add("product-details");
                name.textContent = category._id;

                const count = document.createElement("div");
                count.classList.add("product");

                const countText = document.createElement("p");
                countText.classList.add("category");
                countText.textContent = `${category.count} Products`;


                const priceIcon = document.createElement("img");
                priceIcon.classList.add("price-icon");
                priceIcon.setAttribute("src", "https://cdn.builder.io/api/v1/image/assets/a8cb4b94cb8e4dffbef010cd4bf5467a/30166cc8c05a11b3c57daff05ddb09546c0d2cad9f1602272110ea5162e2c360?apiKey=a8cb4b94cb8e4dffbef010cd4bf5467a&");
                priceIcon.setAttribute("alt", "Price Icon");

                count.appendChild(countText);
                count.appendChild(priceIcon);

                categoryArticle.appendChild(img);
                categoryArticle.appendChild(name);
                categoryArticle.appendChild(count);

                productsContainer.appendChild(categoryArticle);
            });
        })
        .catch(error => {
            console.error("Error fetching categories:", error);
        });
});
