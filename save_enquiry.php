<?php

require "db_connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $visitor_name = trim($_POST["visitor_name"]);
    $email = trim($_POST["email"]);
    $service = trim($_POST["service"]);
    $message = trim($_POST["message"]);


    if (
        empty($visitor_name) ||
        empty($email) ||
        empty($service) ||
        empty($message)
    ) {

        die("Please complete all fields.");

    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        die("Invalid email address.");

    }


    $sql = "INSERT INTO enquiries
            (visitor_name, email, service, message)
            VALUES (?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);


    $stmt->bind_param(
        "ssss",
        $visitor_name,
        $email,
        $service,
        $message
    );


    if ($stmt->execute()) {

        echo "
        <h2>Enquiry submitted successfully!</h2>

        <p>
        Thank you, $visitor_name.
        We will contact you soon.
        </p>

        <a href='index.html'>
        Return Home
        </a>
        ";

    } else {

        echo "Error saving enquiry.";

    }


    $stmt->close();

    $conn->close();

}

?>
