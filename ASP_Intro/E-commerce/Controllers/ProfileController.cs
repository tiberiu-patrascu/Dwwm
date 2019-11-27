using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using E_commerce.Models;

namespace E_commerce.Controllers
{

    public class ProfileController : Controller
    {
        Db db = new Db();
        User user;
        public ProfileController() : base()
        {
            string id = System.Web.HttpContext.Current.User.Identity.Name;

            //int identifiant = Convert.ToInt32(id);
            //int identifiant = int.Parse(id);


            //convertir le cookie en int
            int identifiant;
            if (!int.TryParse(id, out identifiant))
            {
                RedirectToAction("LogOut", "Login");
            }
            user = db.Users.FirstOrDefault(item => item.Id == identifiant);

            if (user == null)
            {
                RedirectToAction("LogOut", "Login");
            }

            if (user.CollectionCards.Count < 8)
            {
                RedirectToAction("");
            }
        }

        [Authorize]
        // GET: Profile
        public ActionResult Index()
        {

            return View(user);
        }

        public ActionResult Buymore()
        {
            // envoyer à la vue :: l'utilisateur actuel(user)+ toutes les cartes disponnibles

            return View(user);
        }
    }
}