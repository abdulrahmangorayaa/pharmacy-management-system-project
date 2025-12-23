<?php
$conn = new mysqli("localhost", "root", "", "pharmacy_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <style>
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #0077b6;
            color: white;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Customer Orders</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Medicine</th>
        <th>Quantity</th>
        <th>Order Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['medicine']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['order_date']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No orders found</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>
