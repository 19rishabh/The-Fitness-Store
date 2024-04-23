<?php
    include 'db.php'; 

    // Get order details from POST request
    $orderDetails = json_decode(file_get_contents('php://input'), true);

    session_start();

    $user = $_SESSION['username'];
    $sql1 = "SELECT * FROM users WHERE username = '$user'";
    $result = pg_query($con, $sql1);
    $row = pg_fetch_assoc($result);
    $id = $row['id'];

    // Insert order details into database
    $date = date('Y-m-d');
    foreach ($orderDetails as $order) {
        $title = pg_escape_string($order['title']); // Escape special characters
        $price = $order['price'];
        $quantity = $order['quantity'];
        $subtotalAmount = $order['subtotal_amount'];
        $invoiceNumber = $order['invoice_number'];
        $sql = "INSERT INTO orders (price, title, quantity, subtotal_amount, date, invoice_number, user_id) VALUES ('$price', '$title', '$quantity', '$subtotalAmount', '$date', '$invoiceNumber', '$id')";
        if (!pg_query($con, $sql)) {
            echo "Error: " . $sql . "<br>" . pg_last_error($con);
        }
    }

    // Close database connection
    pg_close($con);
?>
