<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
</head>
<body>
    <h1>Update Client</h1>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM clients WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
        Address: <textarea name="address"><?php echo $row['address']; ?></textarea><br>
        <input type="submit" name="update" value="Update Client">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Client updated successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
