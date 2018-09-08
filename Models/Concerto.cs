using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CoralitaViucese_20171028.Models
{
    public class Concerto
    {
        public int id_uscita;
        public DateTime data_inizio;
        public DateTime data_fine;
        public string quandoDescrizione;
        public string luogo_uscita;
        public string dettagli_uscita;
        public string indirizzoFileVolantini;

        public Concerto() { }
        public Concerto(int id_uscita, DateTime data_inizio, DateTime data_fine, string quandoDescrizione, string luogo_uscita, string dettagli_uscita, string indirizzoFileVolantini)
        {
            this.id_uscita = id_uscita;
            this.data_inizio = data_inizio;
            this.data_fine = data_fine;
            this.quandoDescrizione = quandoDescrizione;
            this.luogo_uscita = luogo_uscita;
            this.dettagli_uscita = dettagli_uscita;
            this.indirizzoFileVolantini = indirizzoFileVolantini;
        }
    }
}