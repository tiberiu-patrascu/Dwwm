using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using E_commerce.Models;
using System.Linq;

namespace E_commerce.Tests
{
    [TestClass]
    public class Test_Roles
    {
        [TestMethod]
        public void Test_Ajout_Roles()
        {
            using (Db db = new Db())
            {
                int i = db.Roles.Count();

                Role role = new Role() { Name = "Administrateur", Description = "Les admins peuvent tout faire !" };
                Role role2 = new Role() { Name = "Utilisateur" };

                Assert.AreEqual("Utilisateur", role2.Name, "ça ne mange pas des pains");

                db.Roles.Add(role2);

                db.SaveChanges();

                Assert.AreEqual((i+1), db.Roles.Count());
            }
        }

        [TestMethod]
        public void Test_Update_Roles()
        {
            using (Db db = new Db())
            {
                Role role = db.Roles.FirstOrDefault(item => item.Id == 1);

                role.Name = "Les rois du monde";

                db.SaveChanges();

                Role role2 = db.Roles.FirstOrDefault(item => item.Id == 1);

                Assert.AreEqual("Les rois du monde", role2.Name);
            }
        }
    }
}
