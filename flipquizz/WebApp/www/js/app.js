//le code s'executera quand la page est entierement charger
window.addEventListener('DOMContentLoaded',function (){
    
    app = new Vue({
        //element lie au id vue
        el:'#vue',
        data:{
            pageTitle: 'Salutée',
            renderBody: 'Contenu de la page',
            year: 2020,
            authors: ['Julien', 'Adrien', 'Tib', 'François', 'Balkany', 'Mickaël'],
            isActive: false
        },
    });

    document.querySelector("#btn").addEventListener("click", function(){
        app.year = parseInt(app.year);
        app.year += 1;
        //app.authors.push('The boss');
        app.isActive= !app.isActive;
    });

});