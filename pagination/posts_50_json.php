<html>
<head>
    <style>
        a.hyperlink {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
        a.hyperlink:hover {
            text-decoration: none;
        }
    </style>

</head>
<body onload="loadPosts(1)">
    <h1>Posts - page <span id="page_no"></span></h1>

    <div id="posts"></div>

    <hr>

    <div id="pagination"></div>

    <script src="posts.js"></script>
</body>

</html>