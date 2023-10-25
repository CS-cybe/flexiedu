<?php
// Define your database connection parameters
$servername = "localhost"; // Change this to your database server hostname or IP address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "flexi_edu";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get data from the registration form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$level = $_POST['level'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST["confirmPassword"];

// Compare the passwords
if ($password === $confirmPassword) {
    // Passwords match, you can redirect to another page
    header("Location: loginpage.html");
    exit();
} else {
    // Passwords do not match, dis
    header("Location: register.html");
    exit();
    
}


// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO USER(User_fname,User_lname,User_email,User_tp,User_password,User_type,Level) VALUES ('$firstName','$lastName','$email','$telephone','$hashedPassword','Learner','$level')";
//$stmt = $conn->prepare($sql);
//$stmt->bind_param("sssssss", $firstName, $lastName, $telephone, $level, $email, $hashedPassword);
//echo ($sql);

$result =mysqli_query($conn,$sql);
if($result){
   // Redirect to another HTML page
   header("Location: index.html");
   exit(); // Make sure to exit after the header to prevent 
}

$conn->close();
?>
