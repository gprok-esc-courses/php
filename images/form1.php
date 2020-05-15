<html>
<head>

</head>
<body>
    <form action="process1.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit">
    </form>

    <?php
        $images = glob("img/*.{jpg,jpeg,png}", GLOB_BRACE);

        foreach($images as $image) {
            echo "<img height='100px' src='$image' style='padding-right: 5px;'>";
        }

    ?>
</body>
</html>
