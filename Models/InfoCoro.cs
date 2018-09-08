using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace CoralitaViucese_20171028.Models
{
    public class InfoCoro
    {

        public string storiaCoro;
        public string indirizzoCoro;
        public string codiceFiscaleCoro;
        public string nomePresidente;
        public string nomeDirettore;
        public string telefonoPresidente;
        public string telefonoDirettore;
        public string emailPresidente;
        public string emailDirettore;


        public InfoCoro() { }
        public InfoCoro(string storiaCoro, string indirizzoCoro, string codiceFiscaleCoro, string nomePresidente, string nomeDirettore, string telefonoPresidente, string telefonoDirettore, string emailPresidente, string emailDirettore
            )
        {
            this.storiaCoro = storiaCoro;
            this.indirizzoCoro = indirizzoCoro;
            this.codiceFiscaleCoro = codiceFiscaleCoro;
            this.nomePresidente = nomePresidente;
            this.nomeDirettore = nomeDirettore;
            this.telefonoPresidente = telefonoPresidente;
            this.telefonoDirettore = telefonoDirettore;
            this.emailPresidente = emailPresidente;
            this.emailDirettore = emailDirettore;
        }
    }
}