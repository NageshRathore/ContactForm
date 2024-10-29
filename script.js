document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
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
