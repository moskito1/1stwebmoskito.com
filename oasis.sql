CREATE TABLE userInfo
(id int unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
firstname varchar(60) NOT NULL,
lastname varchar(60) NOT NULL,
username varchar (30) UNIQUE NOT NULL, 
email varchar(200) UNIQUE NOT NULL,
password varchar(255) NOT NULL,
useraddress varchar(255),
contactno varchar(255),
userimg text
);

CREATE TABLE products (
  prodid int unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
  prodname varchar(50) NOT NULL,
  img text NOT NULL,
  category varchar(30) NOT NULL
);

CREATE TABLE product_sizes (
  sizeid int unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
  prodid int unsigned NOT NULL,
  FOREIGN KEY (prodid) REFERENCES products(prodid),
  size_name varchar(20) NOT NULL,
  price decimal(10, 2) NOT NULL
);



CREATE TABLE cart (
  username varchar(30),
  FOREIGN KEY (username) REFERENCES userInfo(username),
  id INT AUTO_INCREMENT PRIMARY KEY,
  prodid INT unsigned NOT NULL,
  FOREIGN KEY (prodid) REFERENCES products(prodid),
  prodname varchar(50) NOT NULL,
  img text NOT NULL,
  price decimal(10,2) NOT NULL,
  quantity INT NOT NULL,
  size varchar(50) NOT NULL
);

INSERT INTO products (prodname, img, category)
VALUES ('Iced Americano', 'imgs/Menu/16.jpg', 'Espresso'),
('Iced Latte', 'imgs/Menu/15.jpg', 'Espresso'),
('Cold Brew', 'imgs/Menu/14.jpg', 'Espresso'),
('Iced Chai Tea Latte', 'imgs/Menu/1.jpg', 'Non Espresso'),
('Iced Mocha','imgs/Menu/13.jpg', 'Espresso'),
('Lemonade', 'imgs/Menu/4.jpg', 'Non Espresso'),
('Iced Vanilla Latte', 'imgs/Menu/12.jpg', 'Espresso'),
('GrapeFruit Ade', 'imgs/Menu/3.jpg', 'Non Espresso'),
('Iced Caramel Machiatto','imgs/Menu/10.jpg', 'Espresso'),
('Iced Cappucino','imgs/Menu/9.jpg', 'Espresso'),
('Iced Hibiscus Cooler','imgs/Menu/2.jpg', 'Non Espresso'),
('Iced Spanish Latte', 'imgs/Menu/8.jpg', 'Espresso'),
('Vietnamese Iced Coffee',  'imgs/Menu/7.jpg', 'Espresso'),
('Matcha Latte', 'imgs/Menu/6.jpg', 'Non Espresso'),
('Strawberry Milk', 'imgs/Menu/5.jpg', 'Non Espresso');

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (1, 'Tall', 90.00),
(1, 'Grande', 110.00),
(1, 'Venti', 140.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (2, 'Tall', 70.00),
(2, 'Grande', 90.00),
(2, 'Venti', 110.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (3, 'Tall', 100.00),
(3, 'Grande', 120.00),
(3, 'Venti', 140.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (4, 'Tall', 110.00),
(4, 'Grande', 130.00),
(4, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (5, 'Tall', 110.00),
(5, 'Grande', 130.00),
(5, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (6, 'Tall', 80.00),
(6, 'Grande', 100.00),
(6, 'Venti', 120.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (7, 'Tall', 110.00),
(7, 'Grande', 130.00),
(7, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (8, 'Tall', 90.00),
(8, 'Grande', 110.00),
(8, 'Venti', 140.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (9, 'Tall', 110.00),
(9, 'Grande', 130.00),
(9, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (10, 'Tall', 110.00),
(10, 'Grande', 130.00),
(10, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (11, 'Tall', 110.00),
(11, 'Grande', 130.00),
(11, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (12, 'Tall', 100.00),
(12, 'Grande', 120.00),
(12, 'Venti', 140.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (13, 'Tall', 100.00),
(13, 'Grande', 120.00),
(13, 'Venti', 140.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (14, 'Tall', 110.00),
(14, 'Grande', 130.00),
(14, 'Venti', 150.00);

INSERT INTO product_sizes (prodid, size_name, price)
VALUES (15, 'Tall', 100.00),
(15, 'Grande', 120.00),
(15, 'Venti', 140.00);






