document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const localityInput = document.getElementById('locality');

    // Function to get the user's location and populate the locality field
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Use a reverse geocoding API to get the locality name
                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=en`)
                    .then(response => response.json())
                    .then(data => {
                        localityInput.value = data.locality || 'Location not found';
                    })
                    .catch(error => {
                        console.error('Error fetching locality:', error);
                        localityInput.value = 'Unable to retrieve locality';
                    });
            }, function () {
                localityInput.value = 'Unable to retrieve your location';
            });
        } else {
            localityInput.value = 'Geolocation is not supported by this browser';
        }
    }

    // Call the function to get the location when the page loads
    getLocation();

    // Form submission event listener
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();

        const namePattern = /^[A-Za-z\s]+$/; 
        const phonePattern = /^\d{10}$/; 
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 

        if (!namePattern.test(name)) {
            alert("Please enter a valid name (letters and spaces only, no numbers or special characters).");
            return;
        }

        if (!phonePattern.test(phone)) {
            alert("Please enter a valid 10-digit phone number.");
            return;
        }

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        alert("Thank you for submitting your feedback!");
        form.submit(); 
    });
});
