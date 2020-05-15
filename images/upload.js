const url = "process2.php";
const form = document.querySelector('form');

form.addEventListener('submit', e => {
    e.preventDefault();

    const files = document.querySelector('[type=file]').files;

    const formData = new FormData();
    for(let i = 0 ; i < files.length; i++) {

        let file = files[i];
        formData.append('files[]', file);
    }

    fetch(url, {
        method: 'POST',
        body: formData,
    }).then(response => {
        console.log(response);
        displayImages();
    });

});

function displayImages() {
    var request = new XMLHttpRequest();
    request.open("GET", "all.php");

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let images = JSON.parse(this.responseText);
            let txt = "";

            for (let i = 0; i < images.length; i++) {

                let image = images[i];

                txt += "<img src='" + image + "' height='100px'>";
            }
            document.getElementById("gallery").innerHTML = txt;
        }
    }

    request.send();
}