<?php
// echo (var_dump($data['products']));
 $products = $data['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Citrus|Index</title>
    <link rel="stylesheet" type="text/css" href="public/style.css">
    <script type="text/javascript" src="public/script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php' ?>

    <main>
    </main>
    <section class="products">
        <div class="row columns-3">
    <?php
        $count = 0;
        foreach($products as $product) {
            if ($count === 3) {
                echo '</div>';
                echo '<div class="row columns-3">';
                $count = 0;
            }
            echo '<div class="product">';
            echo '<div class="product-picture">';
            echo '<img src="public/images/' . $product->getImageSrc() . '">';
            echo '</div>';
            echo '<h2>' . $product->getName() . '</h2>';
            echo '<p>' . $product->getDescription() . '</p>';
            echo '</div>';
            $count++;
        }

    ?>
        </div>
    </section>


    <section class="comments">
        <form id="comment__form" action="" method="POST">
            <div>
                <input id="name" name="name" type="text" placeholder="Name">
            </div>
            <div>
                <input id="email" name="email" type="email" placeholder="Email">
            </div>
            <div>
                <input id="comment" name="comment" type="text" placeholder="Comment">
            </div>
            <div>
                <p id="error"></p>
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>

    <?php include 'footer.php' ?>
</body>
</html>