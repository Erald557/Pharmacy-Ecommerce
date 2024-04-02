<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        
        <?php
        // Check if product ID is provided
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "farmaci_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch product details from the database
            $sql = "SELECT * FROM products WHERE id=$product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Display form to edit product details
                echo '<form action="update_product.php" method="POST">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<label for="name">Name:</label>';
                echo '<input type="text" id="name" name="name" value="' . $row['name'] . '" required>';
                echo '<label for="price">Price:</label>';
                echo '<input type="number" id="price" name="price" value="' . $row['price'] . '" step="0.01" required>';
                echo '<label for="description">Description:</label>';
                echo '<textarea id="description" name="description" rows="4" required>' . $row['description'] . '</textarea>';
                echo '<input type="submit" value="Update Product">';
                echo '<a href="manage_products.php" class="btn">Manage Products</a>';
                echo '</form>';
            } else {
                echo "Product not found.";
            }

            // Close connection
            $conn->close();
        } else {
            echo "Product ID not provided.";
        }
        ?>
    </div>
</body>
</html>
