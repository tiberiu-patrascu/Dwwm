class Db {

    // loadQuizzes(_callback) {
    //     var db = this;

    //     var ajx = new XMLHttpRequest();
    //     //ouvrir un url
    //     ajx.open('GET','./api.php?t=quizzes',true);
        
    //     ajx.onload = function() {
    //         //200 requete exequte
    //         if (this.status === 200) {
    //             var jsonResult = JSON.parse(this.responseText);
    //             db.quizzes = jsonResult;
    //             _callback(db);
    //         }
    //     }

    //     ajx.send();
    // }

    constructor() {
        this.quizzes = [];
    }

    //_callback function de reappel
    loadQuizzes(_callback) {
        var dbself = this;

        //pour faire une rêquette ajax
        var ajx =  new XMLHttpRequest();
        // GET POST PUT DELETE
        // LIRE - AJOUT - METTRE A JOUR - SUPPRIMER
        //true = insincrone le code est execute et la requette viens quand elle veux
        //ouvrir un url
        ajx.open('GET', './api.php?t=quizzes', true);

        //function de recuperation
        ajx.onload = function() {
            //200 requete exequte
            if (this.status === 200) {
                var jsonReponse = JSON.parse(this.responseText);
                dbself.quizzes = jsonReponse;
                
                //function qui fait que elle veut avec lobj dbself
                _callback(dbself);
                console.log('DB Quizzes loaded !');
            }
            else{
                alert('Error loading Quizzes');
            }
        }

        ajx.send();

    }
}