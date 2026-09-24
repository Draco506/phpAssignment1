<?php
    session_start();

    // get data from form and assign to variables
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email_address = filter_input(INPUT_POST, 'email_address');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $birth_date = filter_input(INPUT_POST, 'birth_date');

    require_once("database.php"); // require_once prevents duplicate connections to the database

    // Validation to be added later to ensure no null data and no duplicate contacts


    // Add contact

    $query = 'INSERT INTO contacts (firstName, lastName, emailAddress, phoneNumber, dob)
        VALUES (:firstName, :lastName, :emailAddress, :phoneNumber, :dob)';

    $statement = $db->prepare($query);

    $statement->bindValue(':firstName', $first_name);
    $statement->bindValue(':lastName', $last_name);
    $statement->bindValue(':emailAddress', $email_address);
    $statement->bindValue(':phoneNumber', $phone_number);
    $statement->bindValue(':dob', $birth_date);

    $statement->execute();    
    $statement->closeCursor();

    $url = "add_contact_confirmation.php";
    header("Location: " . $url);
    die();

?>
