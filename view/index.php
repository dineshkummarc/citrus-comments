<?php
// echo (var_dump($data['products']));
 $products = $data['products'];
 $comments = $data['comments'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Citrus|Index</title>
    <link rel="stylesheet" type="text/css" href="public/style.css">
    <script type="text/javascript" src="public/script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php' ?>

    <main>
    </main>
    <section class="products">
        <h1>Products</h1>
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
        <h1>Comments</h1>
        <div class="comments__list">
        <?php
        foreach ($comments as $comment) {
            echo '<div class="comment__item">';
            echo '<div class="comment__top">';
            echo '<div class="comment__username">';
            echo $comment->getUsername();
            echo '</div>';
            echo '<div class="comment__email">';
            echo $comment->getEmail();
            echo '</div>';
            echo '</div>';
            echo '<p>' . $comment->getContent() . '</p>';
            echo '</div>';
            }
        ?>
        </div>
        <button>Load more</button>
    </section>

    <section class="comments-form">
        <form id="comment__form" action="" method="POST">
            <div>
                <input id="name" name="name" type="text" placeholder="Your name *">
            </div>
            <div>
                <input id="email" name="email" type="email" placeholder="Email *">
            </div>
            <div>
                <input id="comment" name="comment" type="text" placeholder="Comment *">
            </div>
            <div>
                <p id="error"></p>
                <p id="success"></p>
            </div>
            <button type="submit">submit</button>
        </form>
    </section>

    <?php include 'footer.php' ?>
</body>
</html>