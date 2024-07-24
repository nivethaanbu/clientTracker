<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Management System</title>
</head>
<body>
    <h1>Client Management System</h1>
    <a href="add_client.php">Add New Client</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>
                        <a href='update_client.php?id={$row['id']}'>Edit</a> |
                        <a href='delete_client.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No clients found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
