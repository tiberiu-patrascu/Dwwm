function ajouter_bt_menu() {
    let div = document.createElement("div");
    div.id = "bt_menu";
    div.style = "text-align: center;";
    document.querySelector(".mainNav").before(div);

    let a = document.createElement("a");
    a.style = "text-decoration:none; color:#fff; line-height: 40px;";
    a.href = "#";
    a.innerHTML = "☰";
    div.appendChild(a);
}

function maj_menu() {
    var largeur = document.body.clientWidth;
    if (largeur <= 1024) {
        document.querySelector("#bt_menu").style.display = "block";
        document.querySelector(".menu").style.display = "none";
    } else {
        document.querySelector("#bt_menu").style.display = "none";

    }
}
ajouter_bt_menu();
window.onresize = maj_menu();
maj_menu();

document.querySelector("#bt_menu").addEventListener("click", function () {

    let menu = document.querySelector(".menu");
    if (menu.style.display == "") {
        menu.style.display = "none";
    } else {
        menu.style.display = "";
    }
});


window.onscroll = function () {
    var totop = document.querySelector('#totop');
    if (window.scrollY > 100)
        totop.style.opacity = '0.8';
    else
        totop.style.opacity = '0';
};


//$(document.ready){
//    //jquerry
//}


//equivalent avec doc.ready
window.addEventListener("DOMContentLoaded", function (event) {

    const userSpan = document.querySelector("#user_name");
    const userInput = document.querySelector("#user_input");
    const button_span = document.querySelector("#button_span");
    const btn_login = document.querySelector("#login");
    const user_login = document.querySelector("#username");
    const user_password = document.querySelector("#password");

    if (userInput != null) {
        userInput.addEventListener("keyup", function () {

            const ajx = new XMLHttpRequest(); // =XHR

            ajx.open("GET", "/login/getusername/" + userInput.value, true);

            //decl une funct de que le reponse est reçu par serveur
            ajx.onload = function () {
                //on est dans un prototipe
                if (this.status === 200) {
                    let json = JSON.parse(this.responseText);

                    if (json.toLowerCase() == userInput.value.toLowerCase()) {
                        userSpan.innerHTML = '<i class="far fa-times-circle"></i>';
                    }
                    else {
                        userSpan.innerHTML = '<i class="far fa-check-circle"></i>';
                    }
                    //userSpan.innerText = json;
                }    
            };
            ajx.send();
        });
    }


    //btn_login.addEventListener("click", function () {
    //    const ajxBtn = new XMLHttpRequest();

    //    ajxBtn.open("POST", "/login/affichelogin", true);

    //    ajxBtn.onload = function () {
    //        if (this.status === 200) {
    //            let json = JSON.parse(this.responseText);
    //            if (json == false) {
    //                button_span.innerHTML = 'No <i class="far fa-times-circle"></i>';
                    
    //            } else {
    //                button_span.innerHTML = 'Ok <i class="far fa-check-circle"></i>';
    //            }
    //        }
    //    };
    //    ajxBtn.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //    ajxBtn.send("username=" + user_login.value + "&password=" + user_password.value);
    //});

    const loginForm = document.querySelector("#loginForm");

    if (loginForm != null) {
        loginForm.addEventListener('submit', function (event) {
            ///anulation de functionement de formulaire par default bloque les eveniments par default
            event.preventDefault();

            //var data = {
            //    username: document.loginForm.username.value,
            //    password: document.loginForm.pwd.value
            //};

            var dataStr = "username=" + document.loginForm.username.value + "&password=" + document.loginForm.password.value;

            const loginAjax = new XMLHttpRequest();

            //true requette envoie en assancrone
            loginAjax.open("POST", "/login/loginasync", true);

            loginAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            loginAjax.onload = function () {
                if (this.status === 200) {
                    let json = JSON.parse(this.responseText);
                    console.log(json);
                    if (json === "err") {
                        document.querySelector("#loginMessage").innerHTML="Echec de l'identification";
                    }
                    else {
                        document.querySelector("#loginBox").innerHTML = "Bienvenue " +json+'<br><a href="/login/logout" >Se déconnecter</a>';
                    }
                }
            };

            console.log(dataStr);
            loginAjax.send(dataStr);
        });
    }


});












