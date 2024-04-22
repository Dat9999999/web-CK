<?php
include_once("connect_db.php");
include_once("send_mail.php");
session_start();

function addStaff($staffName, $staffEmail){
    // Establish database connection
    $conn = connect_db();

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO employee (user_name, full_name, email, password, avatar, status, lock_,token, expiry_time) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);

    
    // Check for SQL errors
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    // Generate user name and password
    $user_name = $staffName . '@gmail.com';
    $password = $staffName; // For the first time login, password = full name
    $status = "inactive";
    $avatar = "";
    $lock = "no";
    $currentTime = time();
    $expiryTime = $currentTime + 60;
    $token = generateToken();
    $loginUrl = "http:localhost:8080/web-CK/index.php?token=$token";


    // Bind parameters to statement
    $stmt->bind_param("ssssssssi", $user_name, $staffName, $staffEmail, 
    $password, $avatar, $status, $lock, $token, $expiryTime);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        sendMail($staffEmail, $loginUrl);
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}


// header('location: index.php?pg=employee-manager.php');
?>