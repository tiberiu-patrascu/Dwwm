function genererDiapo(data) {
    let carrousel = document.querySelector("#monCarrousel");

    if (carrousel != null) {
        carrousel.remove();
    }

    let div = document.createElement("div");
    div.className = "carousel-inner";
    div.id = "monCarrousel";

    for (const indice in data) {
        let obj = data[indice];
        let inner = document.createElement("div");

        if (indice == 0) {
            inner.classList.add("carousel-item", "active");
        } else {
            inner.classList.add("carousel-item");
        }

        let img = document.createElement("img");
        img.src = "photos_volcans/" + obj.id + ".jpg";
        img.classList.add("d-block", "w-100", "img-fluid");
        img.style = "width:100%;height:100%;margin-top:0px;";
        img.alt = obj.alt;
        inner.appendChild(img);

        let captionDiv = document.createElement("div");
        captionDiv.classList.add("carousel-caption", "d-block");

        let caption = document.createElement("h5");
        caption.innerHTML = obj.titre + ":" + obj.id;

        //ajouter un enfant
        captionDiv.appendChild(caption);
        inner.appendChild(captionDiv);
        div.appendChild(inner);
    }

    document.querySelector("#animation").appendChild(div);

    let flashGauche = document.createElement("a");
    flashGauche.classList.add("carousel-control-prev");
    flashGauche.href = "#animation";
    flashGauche.setAttribute("role", "button");
    flashGauche.setAttribute("data-slide", "prev");
    //flashGauche['data-slide'] = "prev";


    let flashDroite = document.createElement("a");
    flashDroite.classList.add("carousel-control-next");
    flashDroite.href = "#animation";
    flashDroite.setAttribute("role", "button");
    flashDroite.setAttribute("data-slide", "next");
    //flashDroite['data-slide'] = "next";

    document.querySelector("#animation").appendChild(flashGauche); //imbrication flash dans l'animation
    document.querySelector("#animation").appendChild(flashDroite);

    let iconGauche = document.createElement("span");
    iconGauche.className = "carousel-control-prev-icon";
    iconGauche.setAttribute("aria-hidden", true);
    
    let txtGauche = document.createElement("span");
    txtGauche.innerHTML=("Page précédente");
    txtGauche.className= "sr-only";

    flashGauche.appendChild(iconGauche);
    flashGauche.appendChild(txtGauche);

    let iconDroite = document.createElement("span");
    iconDroite.className = "carousel-control-next-icon";
    iconDroite.setAttribute("aria-hidden", true);

    let txtDroite = document.createElement("span");
    txtDroite.innerHTML=("Page suivante");
    txtDroite.className= "sr-only";

    flashDroite.appendChild(iconDroite);
    flashDroite.appendChild(txtDroite);
}


function loadAjax() {
    let min = document.querySelector("#min").value;
    let max = document.querySelector("#max").value;
    var message = "?min=" + min + "&max=" + max;
    const requete = new XMLHttpRequest();
    requete.onreadystatechange = function (event) {
        if (this.readyState == XMLHttpRequest.DONE) {
            if (this.status == 200) {
                genererDiapo(JSON.parse(this.responseText));
            } else {
                alert("Données mal chargées !");
            }
        }
    };

    requete.open('GET', 'traitement.php' + message, true);
    requete.send();
}

document.getElementById("validation").addEventListener("click", loadAjax);

function removeElement(elementParent, elementEnfant) {
    var parent = document.querySelector("#" + elementParent);
    var enfant = document.querySelector("#" + elementEnfant);
    if (enfant != null) {
        parent.removeChild(enfant);
    }
}