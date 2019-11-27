
   //creer le carousel 2
      function removeElement(elementParent, elementEnfant) {
          var parent = document.querySelector("#" + elementParent);
          var enfant = document.querySelector("#" + elementEnfant);
          if (enfant != null) {
              parent.removeChild(enfant);
          }
      }

      function generer_dispo(data) {
          removeElement('animation', 'ancielSlide');
          let divPrincipal = $("<div/>", {
              class: "carousel-inner",
              id: "ancielSlide"
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

              //positioner dans les autres 
              inner.append(images);

              let caption = $("<h5/>", {
                  text: data[indice].titre,
                  style: ""
              });

              let captionDiv = $("<div/>", {
                  class: "carousel-caption d-block",
                  style: "padding-bootom:0px;"
              });

              captionDiv.append(caption);
              inner.append(captionDiv);
              divPrincipal.append(inner);
          }
          $("#animation").prepend(divPrincipal);
      };

      function load_ajax() {
          //sans chevrons on cherches une valeur 
          //avec chevrons on creer une balise
          let min = $("#min").val();
          let max = $("#max").val();
          $.ajax({
              url: "traitement.php" /*la ressource ciblée*/ ,
              type: "GET",
              data: ("min=" + min + " & max=" + max),
              success: function (code) {
                  generer_dispo(JSON.parse(code));
              }
          });
      };

      $("#validation").click(load_ajax);
