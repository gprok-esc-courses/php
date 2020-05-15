<?php

if(isset($_FILES['image'])) {
    $ext = array('jpg', 'jpeg', 'png');

    $file_ext =  strtolower(end(explode('.', $_FILES['image']['name'])));
    $file_size = $_FILES['image']['size'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];

    if(in_array($file_ext, $ext) === false) {
        echo "Invalid type " . $file_ext;
        die();
    }

    if($file_size > 2097152) {
        echo "File size up to 2MB only";
        die();
    }

    move_uploaded_file($file_tmp_name, "img/" . $file_name);

    header("Location: form1.php");
    die();

}
else {
    echo "No files";
}


