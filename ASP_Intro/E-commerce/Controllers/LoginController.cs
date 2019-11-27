using E_commerce.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace E_commerce.Controllers
{
    public class LoginController : Controller
    {
        private Db db = new Db();

        // GET: Login
        public ActionResult Index()
        {
            return View();
        }

        
        [HttpPost]
        public ActionResult Index(FormCollection _POST, string returnUrl)
        {
            string userTest = _POST["username"];
            if (db.Users.FirstOrDefault(u => u.Username == userTest ) is User user)
            {
                string passwordTest = _POST["password"].Sha256();
                if (user.PasswordSafe == passwordTest)
                {
                    //false quand on quitte l'application le cookie disparetre true garde le cookie 1 an

                    FormsAuthentication.SetAuthCookie(user.Id.ToString(), false);

                    if (!String.IsNullOrWhiteSpace(returnUrl) && Url.IsLocalUrl(returnUrl))
                    {
                        //home/create/
                        return Redirect(returnUrl);
                    }
                    //HttpContext.User.Identity.IsAuthenticated
                    return RedirectToAction("Index", "Profile");
                }
            }
            //User user = db.Users.FirstOrDefault(u => u.Username == _POST["username"]);
            //if (user != null)
            //{}
            Session["erreur"] = "Identifiant ou mot de passe incorrects !";
            return RedirectToAction("Index", "Profile");
        }




        [ChildActionOnly]
        public ActionResult LoginForm()
        {

            return PartialView("LoginForm");
        }

        public ActionResult Register()
        {
            return View();
        }

        // act rez envoier du html
        [HttpPost]
        public ActionResult Register(FormCollection _post)
        {
            if (HttpContext.User.Identity.IsAuthenticated)
            {
                //il ne sadapte pas 
                //return Redirect("home/index");
                //il s'adapte si on change l'endroit des dossier
                Session["erreur"] = "Vous êtes déjà connecté ! Deconectez-vous SVP !";
                return RedirectToAction("Index", "Home");
            }
            if (String.IsNullOrWhiteSpace(_post["username"]) 
                || String.IsNullOrWhiteSpace(_post["password"])
                || String.IsNullOrWhiteSpace(_post["password_confirm"]))
            {
                //returner sur formulaire
                Session["erreur"] = "Tous les champs du formulaires sont obligatoires !";
                return View();
            }
            if (_post["password"] != _post["password_confirm"])
            {
                Session["erreur"] = "Les mots des passes ne corresponds pas";
                return View();
            }
            string username = _post["username"];
            if (db.Users.FirstOrDefault(x=>x.Username == username) is User user)
            {
                Session["erreur"] = "Username déjà utiliseé !";
                return View();
            }
            User newUser = new User()
            {
                Username = _post["username"],
                Password = _post["password"],
                RoleId=1
            };
            if (!newUser.ValidatePassword())
            {
                Session["erreur"] = "Le mot de passe n'est pas valide !";
                return View();
            }
            
            db.Users.Add(newUser);
            db.SaveChanges();

            return RedirectToAction("Index","User");
        }

        public JsonResult Getusername(string id)
        {
            if (db.Users.FirstOrDefault(w => w.Username == id) is User user)
            {

                return Json(user.Username, JsonRequestBehavior.AllowGet);
            }

            return Json("FRANcKI", JsonRequestBehavior.AllowGet);

            //foreach (User item in db.Users.ToList())
            //{
            //    if (item.Username== id)
            //    {

            //    }
            //}
        }


        //connexion avec ajax
        public JsonResult LoginAsync(FormCollection _POST)
        {
            string username = _POST["username"];
            string password = _POST["password"];
            password = password.Sha256();

            if (db.Users.FirstOrDefault(u=>u.Username == username && u.PasswordSafe == password) is User user)
            {
                FormsAuthentication.SetAuthCookie(user.Id.ToString(), true);
                return Json(user.Username);
            }
            return Json("err");

        }



        public ActionResult LogOut()
        {
            if (HttpContext.User.Identity.IsAuthenticated)
            {
                FormsAuthentication.SignOut();
            }
            return RedirectToAction("Index", "Home");
        }

        [HttpPost]
        public JsonResult Affichelogin(FormCollection _form)
        {
            string userTest = _form["username"];
            if (db.Users.FirstOrDefault(x=> x.Username == userTest) is  User user)
            {
                string passwordTest = _form["password"].Sha256();
                if (user.PasswordSafe == passwordTest)
                {
                    FormsAuthentication.SetAuthCookie(user.Id.ToString(), false);
                    return Json(true, JsonRequestBehavior.AllowGet);
                }
            }
            return Json(false, JsonRequestBehavior.AllowGet);
        }
    }
}