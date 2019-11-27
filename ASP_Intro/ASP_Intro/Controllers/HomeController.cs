using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace ASP_Intro.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public string Index()
        {
            return "Hello d !";
        }

        public ActionResult Bonjour()
        {
            DateTime auj = DateTime.Now;

            ViewData["aujourdhui"] = DateTime.Now;
            ViewData["demain"] = DateTime.Now.AddDays(1);
            ViewData["heure"] = DateTime.Now.AddDays(6);

            return View();
        }

        public ActionResult MesCourses()
        {
            List<string> listeDeCourses = new List<string>();
            listeDeCourses.Add("Pain");
            listeDeCourses.Add("Eau");
            listeDeCourses.Add("Lait");
            listeDeCourses.Add("Huile");

            ViewData["maListe"] = listeDeCourses;

            return View("Commision");
        }
    }
}