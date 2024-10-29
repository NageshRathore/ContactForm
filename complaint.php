<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaint form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?> 
    <div class="complaint-form">
    <h2>Guest Complaint Form</h2>
    <form id="complaintForm" action="contact.php" method="POST" enctype="multipart/form-data">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
        
        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" placeholder="Your Contact Number" required>

        <label for="complaint">Complaint Details:</label>
        <textarea id="complaint" name="complaint" placeholder="Please Describe Your Complaint" required></textarea>

        <label for="media">Attach Media:</label>
        <input type="file" id="media" name="media">

        <button type="submit" name="form_type" value="complaint">Submit Complaint</button>
    </form>
</div>
    <?php include 'chatbot.php'; ?> 
    <?php include 'footer.php'; ?> 
    <script src="script.js"></script>
</body>
</html>
