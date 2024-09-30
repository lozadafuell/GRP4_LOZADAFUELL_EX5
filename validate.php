<?php

$response = [
    'FnameError' => '',
    'LnameError' => '',
    'emailError' => '',
    'passwordError' => '',
    'success' => false
];

// Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = trim($_POST['Fname']);
    $Lname = trim($_POST['Lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Name
    if (empty($Fname)) {
        $response['FnameError'] = "First Name is required.";
    }
    if (empty($Lname)) {
        $response['LnameError'] = "Last Name is required.";
    }

    // Email
    if (empty($email)) {
        $response['emailError'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['emailError'] = "Invalid email format.";
    }

    // Password
    if (empty($password)) {
        $response['passwordError'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $response['passwordError'] = "Password must be at least 6 characters.";
    }

    // If no errors
    if (empty($response['nameError']) && empty($response['emailError']) && empty($response['passwordError'])) {
        $response['success'] = true;
    }

    // Return
    echo json_encode($response);
}
?>
