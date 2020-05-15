<?php

if(isset($_FILES['files'])) {
    $ext = array('jpg', 'jpeg', 'png');

    $nfiles = count($_FILES['files']['tmp_name']);
    for($i = 0; $i < $nfiles; $i++) {
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp_name = $_FILES['files']['tmp_name'][$i];
        $file_name = $_FILES['files']['name'][$i];

        if (in_array($file_ext, $ext) === false) {
            echo "Invalid type " . $file_ext;
            die();
        }

        if ($file_size > 2097152) {
            echo "File size up to 2MB only";
            die();
        }

        move_uploaded_file($file_tmp_name, "uploads/" . $file_name);
    }
}
else {
    echo "No files";
}


