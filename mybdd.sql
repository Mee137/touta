CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE DATABASE pastry_shop;
DROP TABLE users;
-- Orders table
CREATE TABLE cakes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cake_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SELECT * FROM cakes;

CREATE TABLE cakes(
  cake_id INT,
name_cake char(50),
quantity INT,
price DECIMAL(8,2)

);

INSERT INTO cakes(name_cake,price)
VALUES("choclate cake ",150),
("oreo cake ",170),
("milk chake for children",200),
("Dark coffe",50),
("Capatchino with milk",100);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cake_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

ALTER TABLE cakes
ADD COLUMN cake_id INT quantity INT;
SELECT * FROM cakes;
DROP TABLE cakes;
-- Create the database
CREATE DATABASE IF NOT EXISTS cafe_menu;
USE cafe_menu;

-- Categories table
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL,
    description TEXT
);

-- Products table
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    description TEXT,
    price_piece DECIMAL(10,2),
    price_whole DECIMAL(10,2),
    image_path VARCHAR(255),
    special_notes VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Insert categories
INSERT INTO categories (category_name, description) VALUES
('Cakes', 'Various delicious cakes'),
('Juices', 'Fresh and healthy juices'),
('Coffee & Milk', 'Hot and cold coffee/milk drinks');

-- Insert cake products
INSERT INTO products (category_id, product_name, description, price_piece, price_whole, image_path) VALUES
(1, 'Oreo cake & blackberry', NULL, 150.00, 1400.00, 'images/download (8).jpg'),
(1, 'Mini cake with various tastes', NULL, 100.00, NULL, 'images/OIP (11).jpg'),
(1, 'Chocolate & Cherry cake', NULL, 170.00, 1300.00, 'images/OIP (1).jpg'),
(1, 'Strawberry & berry cake', NULL, 120.00, 1200.00, 'images/download (7).jpg'),
(1, 'Lotus cake', NULL, 130.00, NULL, 'images/OIP (2).jpg'),
(1, 'Strawberry cake', NULL, 150.00, 1200.00, 'images/OIP (5).jpg'),
(1, 'Croissant', 'With chocolate', 60.00, NULL, 'images/OIP (7).jpg'),
(1, 'Croissant', 'Ordinary', 30.00, NULL, 'images/OIP (7).jpg'),
(1, 'Strawberry cake (children edition)', NULL, 150.00, 1200.00, 'images/OIP (9).jpg'),
(1, 'Red berry Tiramisu', NULL, 150.00, 1200.00, 'images/OIP (8).jpg');

-- Insert juice products
INSERT INTO products (category_id, product_name, description, price_piece, price_whole, image_path) VALUES
(2, 'Drinks', NULL, 120.00, NULL, 'images/OIP (15).jpg'),
(2, 'Orange juice', NULL, 100.00, NULL, 'images/OIP (16).jpg'),
(2, 'Charbat (Lemon juice)', NULL, 100.00, NULL, 'images/OIP (17).jpg'),
(2, 'Mix juice (Lemon & Orange)', NULL, 150.00, NULL, 'images/OIP (18).jpg'),
(2, 'Fresh water with Lemon or Orange', NULL, 70.00, NULL, 'images/download (11).jpg'),
(2, 'Mint juice with cream', NULL, 110.00, NULL, 'images/download (13).jpg'),
(2, 'Cold berry drink', NULL, 110.00, NULL, 'images/OIP (20).jpg'),
(2, 'Healthy drink (diabetes edition)', NULL, 130.00, NULL, 'images/OIP (25).jpg');

-- Insert coffee & milk products
INSERT INTO products (category_id, product_name, description, price_piece, price_whole, image_path) VALUES
(3, 'Milk shake', NULL, 350.00, NULL, 'images/Moucha\'s drink.jpg'),
(3, 'Milk shake with coffee', NULL, 300.00, NULL, 'images/Moucha\'s drink 1jpg.jpg'),
(3, 'Milk shake (strawberry edition)', NULL, 180.00, NULL, 'images/OIP (21).jpg'),
(3, 'Hot chocolate with Cherry', NULL, 220.00, NULL, 'images/OIP (22).jpg'),
(3, 'Milk shake (children edition)', 'Less sugar', 200.00, NULL, 'images/download (14).jpg'),
(3, 'Mix milk and coffee (children edition)', NULL, 150.00, NULL, 'images/milk & coffe.jpg'),
(3, 'Espresso', NULL, 120.00, NULL, 'images/OIP (29).jpg'),
(3, 'Coffee (Full caffeine)', NULL, 70.00, NULL, 'images/th.jpg'),
(3, 'Capsule coffee', NULL, 90.00, NULL, 'images/th (1).jpg'),
(3, 'Cappuccino (only coffee)', NULL, 80.00, NULL, 'images/download (9).jpg'),
(3, 'Mix Hot chocolate & coffee', NULL, 50.00, NULL, 'images/download (10).jpg');
ALTER TABLE cakes CHANGE id id_cake INT AUTO_INCREMENT;
ALTER TABLE cakes CHANGE name name_cake VARALTER TABLE orders CHANGE cake_id id_cake INT;
CHAR(100);ALTER TABLE orders CHANGE cake_id id_cake INT;
ALTER TABLE orders CHANGE cake_id id_cake INT;

DESCRIBE cakes;