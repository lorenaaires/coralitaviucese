using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CoralitaViucese_20171028.Models
{
    public class Utente
    {
        public string username;
        public string email;
        public string password;

        public Utente() { }
        public Utente(string username,string email) {
            this.username = username;
            this.email=email;
        }
    }
}