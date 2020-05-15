<html>
<head>

    <style>
        #gallery img {
            padding-right: 5px;
        }
    </style>
</head>
<body onload="displayImages()">
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit">
</form>

<div id="gallery"></div>


<script src="upload.js"></script>
</body>
</html>

