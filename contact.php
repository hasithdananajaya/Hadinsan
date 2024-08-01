<?php
// Function to establish a database connection
function connectDB()
{
    $host = 'localhost'; // Replace with your database host
    $username = 'root'; // Replace with your database username
    $password = ''; // Replace with your database password
    $dbName = 'contact_db'; // Replace with your database name

    $conn = new mysqli($host, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['tel'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipCode = $_POST['zip'];

    // Perform additional validation if needed

    // Insert data into the database
    $conn = connectDB();
    $sql = "INSERT INTO contact (name, email, password, `Contact Number`, address, city, `zip code`)
            VALUES ('$username', '$email', '$password', '$contactNumber', '$address', '$city', '$zipCode')";

if ($conn->query($sql) === TRUE) {
    echo '<div id="message" style="display:none;">Hello ' . htmlspecialchars($username) . ', your data was entered successfully!</div>';
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var message = document.getElementById("message");
                message.style.display = "block";

                setTimeout(function() {
                    message.style.display = "none";
                    window.location.href = "index.html";
                }, 1500); // 1500 milliseconds (1.5 seconds) delay before redirect
            });
         </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}






?>
