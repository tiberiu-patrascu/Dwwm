using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace E_commerce.Models
{
    public class DbInitializer : DropCreateDatabaseAlways<Db>
    {
        protected override void Seed(Db context)
        {
            List<Card> cards = new List<Card>()
            {
                new Card(){Name="Ricko",Power=7,Attack=11, Armor=6, Played=499546, Victory=320499, Defeat=166596, Draw=12451},
                new Card(){Name="Popo",Power=7,Attack=10, Armor=7, Played=500062, Victory=320801, Defeat=166694, Draw=12567},
                new Card(){Name="Loulou",Power=7,Attack=9, Armor=8, Played=501437, Victory=321374, Defeat=167509, Draw=12554},
                new Card(){Name="Daïko",Power=7,Attack=8, Armor=9, Played=499958, Victory=320326, Defeat=167186, Draw=12446},
                new Card(){Name="JJ",Power=6,Attack=12, Armor=6, Played=499004, Victory=285768, Defeat=197039, Draw=16197},
                new Card(){Name="Inès",Power=6,Attack=10, Armor=8,Played=500127, Victory=286449, Defeat=197676, Draw=16002},
                new Card(){Name="Stan",Power=6,Attack=9, Armor=9, Played=498937 , Victory=284823, Defeat=198239, Draw=15875},
                new Card(){Name="Robert",Power=6,Attack=7, Armor=9, Played=501553, Victory=287171, Defeat=198111, Draw=16271},
                new Card(){Name="Nikita",Power=5,Attack=14, Armor=5, Played=500690, Victory=248043, Defeat=236767, Draw=15880},
                new Card(){Name="Néo",Power=5,Attack=11, Armor=8, Played=500809, Victory=247620, Defeat=237474, Draw=15715},
                new Card(){Name="Pi",Power=5,Attack=10, Armor=9, Played=501084, Victory=247739, Defeat=237341, Draw=16004},
                new Card(){Name="Qi",Power=5,Attack=6, Armor=13, Played=500248, Victory=247659, Defeat=236577, Draw=16012},
                new Card(){Name="Karl",Power=5,Attack=4, Armor=15, Played=499783, Victory=247117, Defeat=236713, Draw=15953},
                new Card(){Name="Carlos",Power=4,Attack=16, Armor=4, Played=500391, Victory=200341, Defeat=283908, Draw=16142},
                new Card(){Name="Idril",Power=4,Attack=10, Armor=10, Played=499992, Victory=199827, Defeat=283938, Draw=16227},
                new Card(){Name="Valar",Power=4,Attack=5, Armor=15, Played=499275, Victory=200115 , Defeat=283012, Draw=16148},
                new Card(){Name="Rosa",Power=4,Attack=3, Armor=17, Played=499305, Victory=199384, Defeat=283606, Draw=16315},
                new Card(){Name="Matt",Power=3,Attack=1, Armor=20, Played=499763, Victory=90918, Defeat=395978, Draw=12867},
                new Card(){Name="Vaïna",Power=3,Attack=3, Armor=18, Played=501324, Victory=148090, Defeat=339352, Draw=13882},
                new Card(){Name="Mario",Power=2,Attack=20, Armor=9, Played=499894, Victory=147942, Defeat=338290, Draw=13662}

            };

            context.Cards.AddRange(cards);

            List<User> users = new List<User>()
            {
                new User(){Username="Guest", PasswordSafe="0000",Golds=0},
                new User() { Username = "pimp", PasswordSafe ="azerty".Sha256(), Golds=200 },
                new User() { Username = "tib", PasswordSafe ="qsdfgh".Sha256(), Golds=99999 },
                new User() { Username = "vali", PasswordSafe ="wxcvbn".Sha256(), Golds=300 },
                new User() { Username = "grasu", PasswordSafe ="azert0".Sha256(),Golds=500 }
            };

            context.Users.AddRange(users);

            List<Role> roles = new List<Role>()
            {
                new Role(){ Name="utilisateur", Description="theboss" },
                new Role(){Name="premier", Description="privilèges"},
                new Role(){ Name="technique", Description="kiler" },
                new Role(){ Name="admin", Description="proxymen"  }
            };

            context.Roles.AddRange(roles);


            base.Seed(context);

        }
    }
}