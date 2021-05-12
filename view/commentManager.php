<?php
session_start();
$comments = $data['comments'];
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === false) { ?>
   <script>
       window.location.href = window.location.origin + '/Citrus' ;
   </script>
<?php }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Citrus|Manage comments</title>
    <link rel="stylesheet" type="text/css" href="public/style.css">
    <script type="text/javascript" src="public/commentManager.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet">
</head>
<body>
<header style="height: 10vh"></header>
<main>
</main>
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
            echo $comment->getEmail() . ' (status = ' . $comment->getStatusEntity()->getTitle() . ')';
            echo '</div>';
            echo '</div>';
            echo '<p>' . $comment->getContent() . '</p>';
            echo '<div class="comment__bottom" data-comment__id="' . $comment->getId() . '">';
            echo '<button class="blockApproveButton" name="approveBlock" type="submit" value="approved">Approve</button>';
            echo '<button class="blockApproveButton" name="approveBlock" type="submit" value="blocked">Discard</button>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <button>Load more</button>
</section>

<?php include 'footer.php' ?>
</body>
</html>