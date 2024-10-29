<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include 'navbar.php'; ?> 
     <section id="hero">
        <div class="hero-content">
            <h1>Welcome to <span>Sampark</span></h1>
            <p>Your one-stop platform for providing Feedback,<br> Queries, and Complaints. <br> Stay connected with us.</p>
            <br><br>
            <a href="#forms-section" class="cta-btn">Explore Forms</a>
        </div>
        <div class="hero-image">
            <img src="jotform-mobile-forms.gif" alt="Sampark Hero">
        </div>
    </section>
<section id="forms-section">
    <h2 class="our">Our Forms</h2>
    <div class="slider-container">
        <!-- Slide 1: Feedback Form -->
        <div class="slide active">
            <div class="slide-content">
                <img src="feedback.gif" alt="Feedback Form">
                <div class="form-info">
                    <h3>Feedback Form</h3>
                    <p>Submit your feedback to help us improve. Your feedback is valuable and helps us serve you better.</p>
                    <p><strong>Use:</strong> Helps collect valuable feedback from users to improve service quality.</p>
                </div>
            </div>
        </div>
        <!-- Slide 2: Query Form -->
        <div class="slide">
            <div class="slide-content reverse">
                <div class="form-info">
                    <h3>Query Form</h3>
                    <p>Have any questions or doubts? Fill out the query form and our team will get back to you with answers.</p>
                    <p><strong>Use:</strong> Allows users to raise any questions or doubts they may have.</p>
                </div>
                <img src="OIP.jpeg" alt="Query Form">
            </div>
        </div>
        <!-- Slide 3: Complaint Form -->
        <div class="slide">
            <div class="slide-content">
                <img src="complaint.webp" alt="Complaint Form">
                <div class="form-info">
                    <h3>Complaint Form</h3>
                    <p>Encountered an issue or problem? Let us know by submitting a complaint, and we will address it swiftly.</p>
                    <p><strong>Use:</strong> Enables users to report issues, so they can be resolved quickly.</p>
                </div>
            </div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>
</section>



    <section id="testimonials">
        <h2>What Our Users Say</h2>
        <div class="testimonial-container">
            <div class="testimonial-box">
                <p>"Sampark made it so easy to submit my feedback. I really appreciate their prompt response!"</p>
                <span>- A Happy User</span>
            </div>
            <div class="testimonial-box">
                <p>"The query form was straightforward, and I got my answers within a day. Great service!"</p>
                <span>- John Doe</span>
            </div>
        </div>
    </section>

    
    <?php include 'chatbot.php'; ?> 
    <?php include 'footer.php'; ?> 
    <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function changeSlide(direction) {
        slides[currentSlide].classList.remove('active'); 
        currentSlide = (currentSlide + direction + totalSlides) % totalSlides; 
        slides[currentSlide].classList.add('active'); 
    }

    slides[currentSlide].classList.add('active');

    document.querySelector('.prev').addEventListener('click', function() {
        changeSlide(-1);
    });
    
    document.querySelector('.next').addEventListener('click', function() {
        changeSlide(1);
    });
    let autoSlideInterval = setInterval(function() {
            changeSlide(1); 
        }, 5000);
</script>

    
</body>
</html>
