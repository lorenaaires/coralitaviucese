using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CoralitaViucese_20171028.Models
{
    public class Brano
    {
        public int id_canti;
        public int Gruppo_id;
        public string Titolo;
        public string Armonizzazione;
        public TipologiaBrano tipologia;

        public Brano() { }
        public Brano(int id_canti, int Gruppo_id,string Titolo,string Armonizzazione){
            this.id_canti = id_canti;
            this.Gruppo_id = Gruppo_id;
            this.Titolo = Titolo;
            this.Armonizzazione = Armonizzazione;
        }
        public void setTipologia(TipologiaBrano tipologia)
        {
            this.tipologia = tipologia;
        }
    }
}