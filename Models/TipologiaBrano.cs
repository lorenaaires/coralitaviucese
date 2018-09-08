using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CoralitaViucese_20171028.Models
{
    public class TipologiaBrano
    {
        public int id_gruppo_repert;
        public string descrizione_gruppo;
        public int ordine_gruppo;

        public TipologiaBrano() { }
        public TipologiaBrano(int id_gruppo_repert, string descrizione_gruppo,int ordine_gruppo)
        {
            this.id_gruppo_repert = id_gruppo_repert;
            this.descrizione_gruppo = descrizione_gruppo;
            this.ordine_gruppo = ordine_gruppo;
        }
    }
}