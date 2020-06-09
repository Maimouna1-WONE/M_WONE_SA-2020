const pp1 = document.getElementById("imgAd");

pp1.addEventListener('change', function onFileSelected(event) {
    var selectedFile1 = event.target.files[0];
    var reader1 = new FileReader();

    var imgtag1 = document.getElementById("ppAd");
    imgtag1.title = selectedFile1.name;

    reader1.onload = function(event) {
        imgtag1.src = event.target.result;
    };

    reader1.readAsDataURL(selectedFile1);
});