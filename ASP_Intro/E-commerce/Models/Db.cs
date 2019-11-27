using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace E_commerce.Models
{

    public class Db : DbContext
    {
        public DbSet<Card> Cards { get; set; }

        public DbSet<Role> Roles { get; set; }

        public DbSet<User> Users { get; set; }

        //@ on a pas besoin d echaper les caractere
        public Db() : base(@"Data Source = (LocalDb)\MSSQLLocalDB; Initial Catalog = eCommerce1903; Integrated Security = SSPI;")
        {

        }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            Database.SetInitializer(new DbInitializer());
        }

    }
}