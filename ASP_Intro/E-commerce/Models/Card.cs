using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace E_commerce.Models
{
    [Table("cards")]

    public class Card
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage ="Le nom de la carte est obligatoire")]
        [MinLength(2)]
        [MaxLength(10)]
        public string Name { get; set; }

        [Required]
        [Range(1,9)]
        public int Power { get; set; }

        [Required]
        [Range(1,22)]
        public int Attack { get; set; }

        [Required]
        [Range(1,22)]
        public int Armor { get; set; }

        public int Played { get; set; }
    
        public int Victory { get; set; }

        public int Defeat { get; set; }

        public int Draw { get; set; }

        public virtual ICollection<User> CollectionUsers { get; set; }

        public Card()
        {
            CollectionUsers = new List<User>();
        }

    }
}