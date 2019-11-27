using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Web;

namespace E_commerce.Models
{
    public static class StringExtensions
    {
        // this 
        public static string Sha256(this string _value)
        {
            //est eq à new SHA256 créer une nouvelle instance
            //ici on peut changer sha512 ...

            SHA256 algo = SHA256.Create();

            //creation tableux de bite
            byte[] input = Encoding.UTF8.GetBytes(_value); //convertire un string en tableau de byte avec l'encodage UTF8

            input = algo.ComputeHash(input); //encoder chaque byte avec l'algorithme SHA256 crée plus haut

            StringBuilder stringConstruit = new StringBuilder();//crée une nouvelle instance de StringBuilder

            foreach (byte b in input) // on parcourt le tableau de byte encodé
            {
                //x pour hexadecimale et 2 pour 2 caractere decimaux 
                stringConstruit.Append(b.ToString("x2"));
                //chaque byte est converti en héxadécimal (x) sur 2 caractéres (2) = x2
                //puis est ajouté au stringbuilder grace à la méthode Append()
            }
            //returne le string stocké dans le stringbuilder
            return stringConstruit.ToString();


        }
    }
}