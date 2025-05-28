<script src="javaScript/toast.js"></script>

<?php
if (!isset($_SESSION["username"])) {
    ?>
    <title>Recipe Finder</title>
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
    <?php
} else { ?>
    <nav>
        <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="my_uploads.php?username=<?php echo urlencode($_SESSION["username"]); ?>">My Uploads</a></li>
            <li><a href="upload.php?username=<?php echo urlencode($_SESSION["username"]); ?>">Upload</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
<?php } ?>
