<?php

// Include the database connection file
require_once('db_config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $email = trim($_POST['email']);
  $address = trim($_POST['address']);
  $preferred_date = $_POST['preferred-date'];
  $instructions = trim($_POST['instructions']);

  // Basic validation (replace with more robust validation as needed)
  if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($preferred_date)) {
    echo "Please fill out all required fields.";
    exit;
  }

  try {
    // Prepare SQL statement to insert pickup request data
    $sql = "INSERT INTO pickup_requests (name, phone, email, address, preferred_date, instructions)
            VALUES (:name, :phone, :email, :address, :preferred_date, :instructions)";
    $stmt = $conn->prepare($sql);

    // Bind values to parameters in the SQL statement
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':preferred_date', $preferred_date);
    $stmt->bindParam(':instructions', $instructions);

    // Execute the statement
    $stmt->execute();

    // Send an email notification (replace with your email address)
    $to = 'your_email@example.com';
    $subject = 'New Pickup Request - Clothes Donation Website';
    $body = "A new pickup request has been submitted:\n\n" .
            "Name: $name\n" .
            "Phone: $phone\n" .
            "Email: $email\n" .
            "Address: $address\n" .
            "Preferred Pick-up Date: $preferred_date\n" .
            "Instructions: $instructions\n\n";
    $headers = 'From: noreply@yourwebsite.com' . "\r\n" .
              'Reply-To: ' . $email . "\r\n" .
              'Content-Type: text/plain; charset=UTF-8';

    if (mail($to, $subject, $body, $headers)) {
      echo "Thank you for scheduling a pick-up! We will contact you to confirm the details.";
    } else {
      echo "There was an error sending the email notification. Your pickup request has been submitted, but we may not be able to confirm via email.";
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $conn = null; // Close database connection
  }
} else {
  // If the form is not submitted, show an error message
  echo "There was an error processing your request.";
}

?>
/*CREATE TABLE pickup_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  address TEXT NOT NULL,
  preferred_date DATE NOT NULL,
  instructions TEXT,  -- Add a column for instructions (optional)
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP -- Add a timestamp for creation time
);
  */ 