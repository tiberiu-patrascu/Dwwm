using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace E_commerce.Models
{
    [Table("Roles")]
    public class Role
    {
        public int Id { get; set; }

        [Required]
        public string Name { get; set; }

        [MaxLength(255)]
        public string Description { get; set; }

        public virtual IEnumerable<User> Users { get; set; }

        public Role()
        {
            Users = new List<User>();
        }
    }
}