<?php
session_start();
include('dbconnection.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT p.prodname, p.img, ps.size_name, ps.price FROM products p
            LEFT JOIN product_sizes ps ON p.prodid = ps.prodid
            WHERE p.prodid = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $product_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $prodname, $img, $size_name, $price);

        $product_sizes = array();

        while (mysqli_stmt_fetch($stmt)) {
            $product_sizes[] = array(
                'prodname' => $prodname,
                'img' => $img,
                'size_name' => $size_name,
                'price' => $price
            );
        }

        mysqli_stmt_close($stmt);

        if (!empty($product_sizes)) {
            $active_size = $product_sizes[0]['size_name'];
            $active_price = $product_sizes[0]['price'];
            $product = $product_sizes[0]; 
            ?>
            <html>
            <head>
                <title>Oasis Cafe</title>
            </head>
            <body>
            <?php include "header.php"; ?>

            <section class="product-page">
                <div class="product-container">
                    <div class="left-product">
                        <div class="product-image">
                            <img src="<?php echo $product['img']; ?>" alt="">
                        </div>
                        <div class="product-description">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias voluptate debitis accusantium illum
                                aut nesciunt</p>
                        </div>
                    </div>
                    <div class="right-product">
                        <div class="product-name">
                            <h1><?php echo $product['prodname']; ?></h1>
                        </div>
                        <div class="product-price">
                            <span class="display-price">₱ <?php echo number_format($active_price, 2); ?></span>
                        </div>
                        <div class="product-size">
                            <p>Sizes:</p>
                            <div class="size-button">
                                <?php foreach ($product_sizes as $size) { ?>
                                    <button
                                        onClick="updatePrice(this, '<?php echo $size['size_name']; ?>', <?php echo $size['price']; ?>)"
                                        class="<?php echo ($size['size_name'] === $active_size) ? 'active' : ''; ?>">
                                        <?php echo $size['size_name']; ?>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="product-quantity">
                            <p>Quantity:</p>
                            <div class="quantity-counter">
                                <span class="decrease" onClick='decreaseCount(event, this)'>-</span>
                                <input type="text" value="1" name="quantity" id="quantity">
                                <span class="increase" onClick='increaseCount(event, this)'>+</span>
                            </div>
                        </div>
                        <div class="cart-buy-button">
                            <form method="post" action="add_to_cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product['prodname']; ?>">
                                <input type="hidden" name="product_img" value="<?php echo $product['img']; ?>">
                                <input type="hidden" value="1" name="quantity" id="quantity">
                                <input type="hidden" name="product_size" id="selected_size" value="<?php echo $active_size; ?>">
                                <input type="hidden" name="product_price" id="selected_price" value="<?php echo $active_price; ?>">
                                <input type="submit" name="cart" value="Add to Cart"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            </body>
            <script>

                let activeButton = null;

                function increaseCount(a, b) {
                    var input = b.previousElementSibling;
                    var value = parseInt(input.value, 10);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    input.value = value;

                    document.getElementById('quantity').value = value;

                }

                function decreaseCount(a, b) {
                    var input = b.nextElementSibling;
                    var value = parseInt(input.value, 10);
                    if (value > 1) {
                        value = isNaN(value) ? 0 : value;
                        value--;
                        input.value = value;

                        document.getElementById('quantity').value = value;
                    }
                }

                function updatePrice(button, size, price) {
                    var displayPrice = document.querySelector('.display-price');
                    var selectedSizeInput = document.getElementById('selected_size');
                    var selectedPriceInput = document.getElementById('selected_price');
                    price = parseFloat(price);
                    if (!isNaN(price)) {
                        displayPrice.innerHTML = '₱ ' + price.toFixed(2);
                        selectedSizeInput.value = size;
                        selectedPriceInput.value = price;

                        // Remove the "active" class from all buttons
                        var buttons = document.querySelectorAll('.size-button button');
                        buttons.forEach(function(btn) {
                            btn.classList.remove('active');
                        });

                        // Add the "active" class to the newly clicked button
                        button.classList.add('active');
                    }
                }

            </script>
            </html>
        <?php }
    }
}
?>
