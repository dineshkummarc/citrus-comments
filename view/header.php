<header>
    <nav>
        <ul>
            <?php
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo "You are logged in as " . $_SESSION['username'];
            ?>
            <li><a href="comment-manager">comment-manager</a></li>
            <?php } ?>
        </ul>
    </nav>
    <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) { ?>
        <div class="logout">
            <a href="">Logout</a>
        </div>
    <?php } else { ?>

    <div class="login">
        <form id="login__form">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit">login</button>
            <div class="loginErrorSuccess">
                <p id="login__error"></p>
                <p id="login__success"></p>
            </div>
        </form>
    </div>
    <?php } ?>
</header>