document.addEventListener("DOMContentLoaded", function() {
    // Get the current page's name (e.g., 'BloodMonitor.php')
    const currentPage = window.location.pathname.split("/").pop();
    console.log(currentPage);

    // Fetch reviews filtered by the current page
    fetch(`./getReviews.php?page=${currentPage}`)
        .then(response => response.json())  // Parse the JSON response
        .then(reviews => {
            const reviewContainer = document.getElementById('review');

            reviews.forEach(review => {
                const reviewHTML = `
                    <div class="customer-subcontent">
                        <div class="customer-profile">
                            <img src="../../assets/profile.png" alt="customer profile">
                            <div class="customer-info">
                                <p class="customer-name">${review.username}</p>
                                <p class="review-date">${formatDate(review.review_date)}</p>
                                <div class="star-rating">
                                    ${generateStars(review.rating)}
                                </div>
                                <p class="review-headline">${review.review_headline}</p>
                                <p class="customer-review">${review.customer_review}</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-image">
                        <img src="${review.image_url || '../../assets/default-product-image.png'}" alt="review image">
                    </div>
                `;
                // Insert the review HTML at the top of the review container
                reviewContainer.insertAdjacentHTML('afterbegin', reviewHTML);
            });
        })
        .catch(error => {
            console.error('Error fetching reviews:', error);
        });

    // Handle the star rating click
    const stars = document.querySelectorAll(".star");
    let rating = 0;
    stars.forEach((star, index) => {
        star.addEventListener("click", function() {
            rating = index + 1;
            updateStars(rating);
        });
    });

    // Function to update the star ratings visually
    function updateStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add("checked");
            } else {
                star.classList.remove("checked");
            }
        });
    }

    // Handle the form submission
    document.querySelector(".submit button").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent form from refreshing the page

        // Collect form data
        const reviewHeadline = document.querySelector('input[type="text"]').value;
        const customerReview = document.querySelector('textarea').value;
        const fileInput = document.querySelector("#file");
        const formData = new FormData();

        // Append data to form
        formData.append('rating', rating);
        formData.append('review_headline', reviewHeadline);
        formData.append('customer_review', customerReview);
        formData.append('page', currentPage); // Pass the current page name

        // Handle file upload
        if (fileInput.files.length > 0) {
            formData.append('review_image', fileInput.files[0]);
        }

        // Send the data via AJAX
        fetch('./submitReview.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === 'success') {
                // Optionally clear form here
                document.querySelector('input[type="text"]').value = '';
                document.querySelector('textarea').value = '';
                updateStars(0); // Reset stars
            }
        })
        .catch(error => console.error('Error submitting review:', error));
    });
});
