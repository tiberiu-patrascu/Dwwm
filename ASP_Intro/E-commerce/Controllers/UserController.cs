using E_commerce.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace E_commerce.Controllers
{

    public class UserController : Controller
    {

        Db db = new Db();

        public UserController() : base()
        {
            ViewBag.Roles = db.Roles.ToList();
        }

        // GET: User
        //[AllowAnonymous] mettre tous les methodes en autorize sauf celci
        public ActionResult Index()
        {
            List<User> users;

            using (Db db = new Db())
            {
                users = db.Users.ToList();
                ViewData["users"] = users;
            }
                return View();
        }

        //[Authorize]
        public ActionResult Create()
        {
            
            //ViewBag.Roles = new SelectList(db.Roles, "Id","Name");

            return View();
        }

        [HttpPost]
        public ActionResult Create(User user)
        {
            if (user.ValidatePassword())
            {
                using (Db db = new Db())
                {
                    // user.RoleId = 1;
                    user.Golds = 170;
                    db.Users.Add(user);
                    db.SaveChanges();
                    return RedirectToAction("Index");                   
                }
            }
            return View(user);
        }

        public ActionResult Details(int id)
        {
            using (Db db = new Db())
            {
                User user = db.Users.FirstOrDefault(_user => _user.Id == id);
                if (user != null)
                {
                    return View(user);
                }
            }
            return RedirectToAction("Index");
        }

        public ActionResult Edit(int id)
        {
            using(Db db= new Db())
            {
                if (db.Users.FirstOrDefault(_user=>_user.Id==id) is User user)
                {
                    return View(user);
                }
            }
            return RedirectToAction("Index");
        }

        [HttpPost]
        public ActionResult Edit(User user)
        {
            using (Db db = new Db())
            {
                if (db.Users.FirstOrDefault(_user=>_user.Id == user.Id) is User existingUser)
                {
                    existingUser.Username = user.Username;
                    if (!String.IsNullOrEmpty(user.Password))
                    {
                        existingUser.Password = user.Password;

                        if (!existingUser.ValidatePassword())
                        {
                            return View(user);
                        }                       
                    }
                    db.SaveChanges();                  
                    return RedirectToAction("Index");
                }
            }
            return View(user);
        }

        public ActionResult Delete(int id)
        {
            using(Db db = new Db())
            {
                if (db.Users.FirstOrDefault(x=>x.Id == id) is User user)
                {
                    return View(user);
                }
            }
            return RedirectToAction("Index");
        }

        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirm(int id)
        {
            using(Db db = new Db())
            {
                if (db.Users.FirstOrDefault(x=>x.Id==id) is User user)
                {
                    db.Users.Remove(user);
                    db.SaveChanges();
                }
            }
            return RedirectToAction("Index");
        }


    }
}