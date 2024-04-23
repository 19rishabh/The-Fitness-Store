<?php
    include 'db.php'; 

    $orderDetails = json_decode(file_get_contents('php://input'), true);

    session_start();

    $user = $_SESSION['username'];
    $sql1 = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($con, $sql1, array($user));

    if ($result) {
        $row = pg_fetch_assoc($result);
        $id = $row['id'];

        $date = date('Y-m-d');
        foreach ($orderDetails as $order) {
            $title = pg_escape_string($order['title']);
            $price = $order['price'];
            $quantity = $order['quantity'];
            $subtotalAmount = $order['subtotal_amount'];
            $invoiceNumber = $order['invoice_number'];

            $sql = "INSERT INTO orders (price, title, quantity, subtotal_amount, date, invoice_number, user_id) VALUES ($1, $2, $3, $4, $5, $6, $7)";
            
            $result = pg_query_params($con, $sql, array($price, $title, $quantity, $subtotalAmount, $date, $invoiceNumber, $id));
            }
        }
    } else {
        echo "Error: " . pg_last_error($con);
    }

    // Close database connection
    pg_close($con);
?> 
