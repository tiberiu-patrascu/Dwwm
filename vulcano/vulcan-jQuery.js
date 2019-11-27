   //creer le caroussel 1
   $(document).ready(function () {
       $.getJSON("listeObjet.json", function (data) {
           let divPrincipal = $("<div/>", {
               class: "carousel-inner"
           });

           for (const indice in data) {
               //recuperer les objet par indice dans data
               let obj = data[indice];

               // //chercher par titre
               // data[indice].titre;

               let inner;
               if (indice == 0) {
                   //creer la balise div, + objet intre {} on cree une clase 
                   inner = $("<div/>", {
                       class: "carousel-item active"
                   });
               } else {
                   inner = $("<div/>", {
                       class: "carousel-item"
                   });
               }

               let images = $("<img/>", {
                   src: "photos_volcans/" + data[indice].id + ".jpg",
                   class: "d-block img-fluid",
                   alt: data[indice].alt,
                   style: "width:100%;height:100%;margin-top:0px;"
               });

               let caption = $("<h5/>", {
                   text: data[indice].titre,
                   style: "color:white; font-family: 'Chilanka', cursive; padding:10px; border-radius:20px;"
               });

               let captionDiv = $("<div/>", {
                   class: "carousel-caption d-block",
                   style: "padding-bootom:0px;"
               });

               //positioner dans les autres 
               inner.append(images);
               captionDiv.append(caption);
               inner.append(captionDiv);
               divPrincipal.append(inner);
           }

           $("#animation").prepend(divPrincipal);
       });
   });
