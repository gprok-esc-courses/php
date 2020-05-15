
function loadPosts(page) {
    var request = new XMLHttpRequest();
    request.open("GET", "posts_api.php?action=posts&page=" + page);

    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200)  {
            let data = JSON.parse(this.responseText);
            let txt = "";
            let row;
            for(let i = 0; i < data.length; i++) {
                row = data[i];
                txt += row.id + ". " + row.title + "<br>";
            }

            document.getElementById("posts").innerHTML = txt;
            document.getElementById("page_no").innerHTML = page;
            paginate(page);
        }
    }

    request.send();
}

function paginate(page) {
    var request = new XMLHttpRequest();
    request.open("GET", "posts_api.php?action=nop");

    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let data = JSON.parse(this.responseText);
            let pages = data.total;

            let txt = "";
            txt += "<a class='hyperlink' onclick='loadPosts(1)'> << </a>";
            txt += "<a class='hyperlink' onclick='loadPosts(" + (page-1) + ")'> < </a>";
            for (let i = 1; i <= pages; i++) {
                if (i == page) {
                    txt += " " + i + " ";
                }
                else {
                    txt += "<a class='hyperlink' onclick='loadPosts(" + i + ")'> " + i + " </a>";
                }
            }
            txt += "<a class='hyperlink' onclick='loadPosts(" + (page+1) + ")'> > </a>";
            txt += "<a class='hyperlink' onclick='loadPosts(" + pages + ")'> >> </a>";

            document.getElementById("pagination").innerHTML = txt;
        }
    }
    request.send();
}