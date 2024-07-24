<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
</head>
<body>
    <h1>Add New Client</h1>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Phone: <input type="text" name="phone"><br>
        Address: <textarea name="address"></textarea><br>
        <input type="submit" name="submit" value="Add Client">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

        if ($conn->query($sql) === TRUE) {
            echo "New client added successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
