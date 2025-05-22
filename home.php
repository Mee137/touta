<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="images/favicon.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>My pastry</title>
</head>

<body>
    <header class="head">
        <div class="logo">
            <h1>my pastry</h1>
        </div>
        <nav class="links">
            <a href="wlcme.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">about us</a>
            <a style="text-decoration: none;" href="logout.php" class="btn">Logout</a>
            <a style="text-decoration: none;" href="order.php" class="btn">Order now</a>
        </nav>

    </header>
    <section class="title">
        <h1> Sweet Moments in <br> Every Bite</h1>
        <a style="font-size: 0.5em;text-decoration:none" class="btn" href="explore.php">Explore
            Menu</a>
    </section>
    <div class="featur">
        <h2>
            <center><b>Most popular</b></center>
        </h2>

        <div class="gallery-container">
            <button class="scroll-btn prev-btn">&lt;</button>
            <div class="cakes">
                <div class="cake">
                    <img src="images/OIP (4).jpg">
                    <div class="cakep">
                        <p>Death by Chocolate<br>
                            Triple-layer fudge delight<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/OIP (10).jpg">
                    <div class="cakep">
                        <p>Red Velvet Romance<br>
                            Buttermilk velvet with<br>
                            cream cheese frosting<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/OIP (3).jpg">
                    <div class="cakep">
                        <p>Berry Fantasy<br>
                            Vanilla sponge with<br>
                            mixed berry mousse<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/download (9).jpg">
                    <div class="cakep">
                        <p>Royal Wedding Cake<br>
                            Elegant vanilla tiers<br>
                            with edible gold leaf<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/download (6).jpg">
                    <div class="cakep">
                        <p>Caramel Dream<br>
                            Salted caramel layers<br>
                            with praline crunch<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/OIP (15).jpg">
                    <div class="cakep">
                        <p>Tropical Paradise<br>
                            Coconut & passionfruit<br>
                            with mango glaze<br>
                        </p>
                    </div>
                </div>

                <div class="cake">
                    <img src="images/download (5).jpg">
                    <div class="cakep">
                        <p>Cookies & Cream<br>
                            Chocolate cake with<br>
                            Oreo cookie filling<br>
                        </p>
                    </div>
                </div>
                <div class="cake">
                    <img src="images/i2mg1.jpg">
                    <div class="cakep">
                        <p>Classic Cheesecake<br>
                            New York style<br>
                            with berry compote<br>
                        </p>
                    </div>
                </div>
            </div>
            <button class="scroll-btn next-btn">&gt;</button>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Hours</h3>
                <p>Monday-Friday: 7am-7pm</p>
                <p>Saturday: 8am-6pm</p>
                <p>Sunday: 9am-4pm</p>
            </div>
            <div class="footer-section">
                <h3>Location</h3>
                <p>rue de Biskra </p>
                <p>(555) 123-4567</p>
            </div>
            
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 my pastry. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function checkLogin() {
            fetch('check_login.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.logged_in) {
                        window.location.href = 'login.php';
                    } else {
                        placeOrder();
                    }
                });
        }
        function placeOrder() {
            alert('Order placed successfully!');
        }

        document.querySelector('.btn').addEventListener('click', function (e) {
            if (e.target.textContent === 'Order now') {
                checkLogin();
            }
        });
    </script>

</body>

</html>