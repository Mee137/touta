<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="images/favicon.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Order</title>
</head>

<body>
    <div class="wrapper">
        <?php
        require 'config.php';

        if (!isset($_SESSION['user_id'])) {
            echo '<div class="message error">Please <a href="login.php">login</a> to place an order</div>';
        } else {
            // Process form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cake_id = filter_input(INPUT_POST, 'cake_id', FILTER_VALIDATE_INT);
                $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT, [
                    'options' => ['min_range' => 1, 'max_range' => 100]
                ]);

                if ($cake_id && $quantity) {
                    try {
                        // Changed from 'id' to 'id_cake'
                        $stmt = $pdo->prepare("SELECT id_cake FROM cakes WHERE id_cake = ?");
                        $stmt->execute([$cake_id]);

                        if ($stmt->fetch()) {
                            $stmt = $pdo->prepare("INSERT INTO orders (user_id, cake_id, quantity, order_date) VALUES (?, ?, ?, NOW())");
                            $stmt->execute([$_SESSION['user_id'], $cake_id, $quantity]);
                            $order_id = $pdo->lastInsertId();
                            echo '<div class="message success">Order placed successfully! Order ID: ' . $order_id . '</div>';
                        } else {
                            echo '<div class="message error">Selected cake not found</div>';
                        }
                    } catch (PDOException $e) {
                        echo '<div class="message error">Error placing order: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                }
            }

            try {
                // Changed from 'id, name' to 'id_cake, name_cake'
                $cakes = $pdo->query("SELECT cake_id, name_cake FROM cakes")->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $cakes = [];
                echo '<div class="message error">Error loading cakes: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }

            ?>

            <form method="post" action="order.php">
            <i class="fas fa-shopping-cart" style="position: relative;cursor: pointer;font-size: 2rem;"></i>
            <h1>Ordering page</h1>
                <div class="form-group">
                    <label for="cake_id">Select Cake:</label>
                    <select id="cake_" name="cake_id" required style="color:pink;border-radius :15px;text-align:center;padding:5px;border:none;margin:7px;">
                        <option value="">-- Select a Cake --</option>
                        <?php foreach ($cakes as $cake): ?>
                            <option value=" <?= htmlspecialchars($cake['cake_id']) ?>">
                            <?= htmlspecialchars($cake['name_cake']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="input" min="1" max="100" value="1" required
                        style="color:pink;border-radius :15px;text-align:center;padding:5px;border:none;margin:7px;">
                </div>

                <button type="submit" name="order" class="btn" style="color:pink;">Place Order</button>
                <?php
                if (isset($_POST["order"])) {
                    echo " <h1>Thank You For Ordering</h1>";
                }
                ?>
            </form>
        <?php } ?>
    </div>

</body>

</html>