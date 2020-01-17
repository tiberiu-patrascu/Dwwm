class Db {
    constructor() {
        this.quizzes = [];

    }

    loadQuizzes(_callback) {
        var db = this;

        var ajx = new XMLHttpRequest();
        //ouvrir un url
        ajx.open('GET','./api.php?t=quizzes',true);
        
        ajx.onload = function() {
            //200 requete exequte
            if (this.status === 200) {
                var jsonResult = JSON.parse(this.responseText);
                db.quizzes = jsonResult;
                _callback(db);
            }
        }

        ajx.send();
    }
}