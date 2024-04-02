<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <p>Please provide your information:</p>
        <form method="post" action="process_order.php">
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" required><br><br>
            
            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" required><br><br>
            
            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>
            
            <?php
            $product_id = $_GET['product_id'];
            $product_name = $_GET['product_name']; 
            $product_price = $_GET['product_price'];

            echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
            echo '<input type="hidden" name="product_name" value="' . htmlspecialchars($product_name) . '">'; 
            echo '<input type="hidden" name="product_price" value="' . $product_price . '">';
            ?>
            
            <input type="submit" value="Submit Order">
        </form>
    </div>
</body>
</html>
