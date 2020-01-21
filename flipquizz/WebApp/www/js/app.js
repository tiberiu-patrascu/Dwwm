//le code s'executera quand la page est entierement charger
window.addEventListener('DOMContentLoaded', function () {

    app = new Vue({
        //element lie au id vue
        el: '#vue',
        data: {
            quizzes: [],
            game: new Game(),
            // pageTitle: 'Salutée',
            // renderBody: 'Contenu de la page',
            // year: 2020,
            // authors: ['Julien', 'Adrien', 'Tib', 'François', 'Balkany', 'Mickaël'],
            // isActive: false
        },
        mounted: function () {
            //function de reapel
            //new db
            //select quiz

        },
        methods: {
            getQuizzes: function (_db) {
                this.quizzes = _db.quizzes;
                console.log('App loading Quizzes');
            },
            addTeam: function () {
                if (this.game.teams.length < 4) {
                    this.game.addTeam();
                    if (this.quizzes.length < 1) {
                        var db = new Db();
                        db.loadQuizzes(this.getQuizzes);
                    }
                }

            },
            deleteTeam: function () {
                this.game.deleteTeam();
            },
            loadCategories: function (_event) {
                var db = new Db();
                db.loadCategories(_event.target.dataset.id, this.getCategories);
                console.log(_event.target.dataset.id);
            },
            getCategories: function () {

            }
        },
    });

    // document.querySelector("#btn").addEventListener("click", function(){
    //     app.year = parseInt(app.year);
    //     app.year += 1;
    //     //app.authors.push('The boss');
    //     app.isActive= !app.isActive;
    // });

});