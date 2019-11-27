using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace E_commerce.Models
{
    public class User
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "Champ obligatoire")]
        [MinLength(3)]
        [MaxLength(20)]
        [RegularExpression("^[a-zA-Z0-9]{3,20}$", ErrorMessage = "Chaine incorecte, veuillez introduire un nom valide sans accentes")]
        public string Username { get; set; }

        [NotMapped]
        [MinLength(4)]
        public string Password { get; set; }

        [Required]
        public string PasswordSafe { get; set; }

        public int Golds {get; set;}

        public int RoleId { get; set; }

        //public virtual Role Role { get; set; }

        public virtual ICollection<Card> CollectionCards { get; set; }

        public User()
        {
            CollectionCards = new List<Card>();
        }


        public bool ValidatePassword()
        {
            if (String.IsNullOrEmpty(Password))
            {
                return false;
            }
            if (Password.Length < 9)
            {
                return false;
            }

            PasswordSafe = Password.Sha256();

            return true;
        }
    }
}