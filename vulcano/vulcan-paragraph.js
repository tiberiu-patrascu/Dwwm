//creer paragraph
//cours frank
$.getJSON("fichier.json", function (data) {
    var tabImgs = [];
    //tant qu'il y a des dones a l'interion de data
    $.each(data, function (key, valeur) {
        tabImgs.push(valeur);
    });
    for (let i = 0; i < tabImgs.length; i++) {
        $(".carousel-caption").append("<p>" + tabImgs[i] + "</p>");
    }
});

var slideIndex = 1;
afficherImages(slideIndex);

function plusImages(_champ) {
    afficherImages(slideIndex += _champ);
}

function afficherImages(_champ) {
    var i;
    var tabImage = document.getElementsByClassName("d-block");

    if (_champ > tabImage.length) {
        slideIndex = 1;
    }

    if (_champ < 1) {
        slideIndex = tabImage.length;
    }

    for (i = 0; i < tabImage.length; i++) {
        tabImage[i].style.display = "none";
    }

    tabImage[slideIndex - 1].style.display = "block";
}