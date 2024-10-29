<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5-Star Hotel Feedback Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?> 
    
    <div class="contact-form">
        <h2>Guest Feedback Form</h2>
        <form id="contactForm" action="contact.php" method="POST">
          
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            
            <label for="phone">Phone:</label>
            <input type="number" id="phone" name="phone" placeholder="Your Contact Number" required>

            
            <fieldset>
                <legend>Rate Your Stay Experience</legend>
                <label><input type="radio" name="stay_experience" value="Excellent" required> Excellent</label>
                <label><input type="radio" name="stay_experience" value="Good"> Good</label>
                <label><input type="radio" name="stay_experience" value="Average"> Average</label>
                <label><input type="radio" name="stay_experience" value="Poor"> Poor</label>
            </fieldset>

            
            <label for="room_type">Room Type:</label>
            <select id="room_type" name="room_type" required>
                <option value="">--Select Room Type--</option>
                <option value="Deluxe">Deluxe Room</option>
                <option value="Suite">Suite Room</option>
                <option value="Single">Single Room</option>
                <option value="Double">Double Room</option>
            </select>

          
            <fieldset>
                <legend>Services Used</legend>
                <label><input type="checkbox" name="services[]" value="Spa"> Spa</label>
                <label><input type="checkbox" name="services[]" value="Pool"> Swimming Pool</label>
                <label><input type="checkbox" name="services[]" value="Gym"> Gym</label>
                <label><input type="checkbox" name="services[]" value="Restaurant"> Restaurant</label>
            </fieldset>

      
            <label for="message">Feedback:</label>
            <textarea id="message" name="message" placeholder="Please Enter Your Valuable Feedback" required></textarea>

           
            <button class="btn1" type="submit">Submit Feedback</button>
        </form>
    </div>

    <?php include 'chatbot.php'; ?> 
    <?php include 'footer.php'; ?> 
    <script src="script.js"></script>
</body>
</html>
