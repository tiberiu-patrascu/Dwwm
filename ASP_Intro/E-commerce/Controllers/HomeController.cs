using E_commerce.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;


namespace E_commerce.Controllers
{
    [Authorize]
    public class HomeController : Controller
    {
        [AllowAnonymous]
        public ActionResult Index()
        {
            //using est une instruction
            using (Db db = new Db())
            {
                List<Card> cards = db.Cards.ToList();
                ViewData["cards"] = cards;
            }
            return View();
        }

        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(Card card, HttpPostedFileBase picture)
        {

            if (ModelState.IsValid)
            {
                using (Db db = new Db())
                {
                    db.Cards.Add(card);
                    db.SaveChanges();
                    if (picture != null && picture.ContentLength>0)
                    {
                        var path = Path.Combine(Server.MapPath("~/Content/"),"img",card.Id+".png");
                        picture.SaveAs(path);
                    }
                    return RedirectToAction("Index");
                }
            }
            return View(card);
        }

        [AllowAnonymous]
        public ActionResult Details(int id)
        {
            using(Db db = new Db())
            {
                //foreach (Card mycard in db.Cards)
                //{
                //    if (card.Id == _id)
                //    {
                //        //trouve
                //    }
                //}

                Card card = db.Cards.FirstOrDefault(mycard=> mycard.Id==id);
                if (card != null)
                {
                    return View(card);
                }
            }
            return RedirectToAction("Index");
        }

        public ActionResult Edit(int id)
        {
            using (Db db = new Db())
            {
                if (db.Cards.FirstOrDefault(mycard => mycard.Id == id) is Card card)
                {
                    return View(card);
                }
            }
            return RedirectToAction("Index");
        }

        [HttpPost]
        public ActionResult Edit(Card card, HttpPostedFileBase picture)
        {
            if (ModelState.IsValid)
            {
                using (Db db = new Db())
                {
                    if (db.Cards.FirstOrDefault(x=> x.Id == card.Id) is Card existingCard)
                    {
                        existingCard.Name = card.Name;
                        existingCard.Power = card.Power;
                        existingCard.Attack = card.Attack;
                        existingCard.Armor = card.Armor;
                        db.SaveChanges();

                        if (picture != null  && picture.ContentLength > 0)
                        {
                            var path = Path.Combine(Server.MapPath("~/Content/"), "img", card.Id+".png");

                            picture.SaveAs(path);
                        }

                        return RedirectToAction("Index");
                    }
                }
            }
            return View(card);
        }

        
        public ActionResult Delete(int id)
        {
            using (Db db = new Db())
            {
                if (db.Cards.FirstOrDefault(x=>x.Id==id) is Card card)
                {
                    return View(card);
                }
            }
            return RedirectToAction("Index");
        }
        
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirm(int id)
        {
            using (Db db = new Db())
            {
                if (db.Cards.FirstOrDefault(mycard => mycard.Id == id) is Card card)
                {
                    db.Cards.Remove(card);
                    db.SaveChanges();
                }       
            }
            return RedirectToAction("Index");
        }
    }
}