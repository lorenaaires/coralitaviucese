using CoralitaViucese_20171028.Models;
using Microsoft.Owin.Security;
using Microsoft.Owin.Security.OAuth;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.OleDb;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Security.Claims;
using System.Web;
using System.Web.Http;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Net.Http.Headers;
using System.Threading.Tasks;
using System.Web.Security;
using System.Web.UI;
using System.IO;
using System.Text.RegularExpressions;

namespace CoralitaViucese_20171028.Controllers
{
    //[Authorize]  
    [RoutePrefix("api/Values")]
    public class ValuesController : ApiController
    {
        // GET api/values
        //public IEnumerable<string> Get()
        //{
        //    return new string[] { "value1", "value2" };
        //}

        //// GET api/values/5
        //public string Get(int id)
        //{
        //    return "value";
        //}

        // POST api/values
        public void Post([FromBody]string value)
        {
        }

        // PUT api/values/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE api/values/5
        public void Delete(int id)
        {
        }
        // POST api/Values/Prova
        [Route("Login")]
        public async Task<IHttpActionResult> Login(string username, string password)
        {

            OleDbDataReader reader = null;
            OleDbConnection conn = ConnectToAccess();
            bool isAuth = false;
            Utente user = null;
            try
            {

                OleDbCommand cmd = new OleDbCommand("SELECT * from loginCoro where nickname='" + username + "' and password='" + password + "';", conn);
                DataTable table = new DataTable("InfoCoro");
                table.Load(cmd.ExecuteReader());
                isAuth = (table.Rows.Count == 1);
                //bool isInGS_Users = myDBM.UserExists(txtUsername.Text);


                if (isAuth)
                {
                    user = new Utente(table.Rows[0]["nickname"].ToString(), table.Rows[0]["mailGenerico"].ToString());
                    FormsAuthenticationTicket tkt;
                    string cookiestr;
                    HttpCookie ck;
                    int CookieRetention = Convert.ToInt32(ConfigurationManager.AppSettings["CookieRetention"].ToString());
                    tkt = new FormsAuthenticationTicket(1, username, DateTime.Now,
                    DateTime.Now.AddMinutes(CookieRetention), true, username);
                    cookiestr = FormsAuthentication.Encrypt(tkt);
                    ck = new HttpCookie(FormsAuthentication.FormsCookieName, cookiestr);
                    ck.Expires = tkt.Expiration;
                    ck.Path = FormsAuthentication.FormsCookiePath;

                    //AccountController ac = new AccountController();
                    user.password = password;
                    //ac.Register(user);


                }
            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                if (reader != null) reader.Close();
                if (conn != null) conn.Close();
            }


            return Ok(user);
        }
        // POST api/Values/Prova
        [Route("Brani")]
        public List<Brano> Brani()
        {
            OleDbDataReader reader = null;
            List<Brano> elenco = new List<Brano>();
            List<TipologiaBrano> elencoTipologie = new List<TipologiaBrano>();
            OleDbConnection conn = ConnectToAccess();
            try
            {
                OleDbCommand cmd =
                   new OleDbCommand("SELECT * from repertorio;", conn);
                //reader = cmd.ExecuteReader();
                // dichiaro le var che conterranno i valori


                // --> sistema semplice:
                // creo una tabella e ci carico i risultati della query
                DataTable table = new DataTable("Repertorio");
                table.Load(cmd.ExecuteReader());

                OleDbCommand cmd2 =
                  new OleDbCommand("SELECT * from gruppo_Repertorio;", conn);
                DataTable table2 = new DataTable("TipologiaRepertorio");
                table2.Load(cmd2.ExecuteReader());
                for (int i = 0; i < table2.Rows.Count; i++)
                {

                    TipologiaBrano tiponuovo = new TipologiaBrano(Convert.ToInt32(table2.Rows[i]["id_gruppo_repertorio"]), table2.Rows[i]["descrizione_gruppo"].ToString(), Convert.ToInt32(table2.Rows[i]["ordine_gruppo"].ToString()));


                    elencoTipologie.Add(tiponuovo);
                }
                // leggo i risultati
                for (int i = 0; i < table.Rows.Count; i++)
                {
                    Brano nuovo = new Brano(Convert.ToInt32(table.Rows[i]["id_canti"]), Convert.ToInt32(table.Rows[i]["Gruppo_id"].ToString()), table.Rows[i]["Titolo"].ToString(), table.Rows[i]["Armonizzazione"].ToString());
                    TipologiaBrano tipo = new TipologiaBrano();
                    tipo = elencoTipologie.Where(a => a.id_gruppo_repert == nuovo.Gruppo_id).FirstOrDefault();
                    nuovo.setTipologia(tipo);
                    elenco.Add(nuovo);
                }

            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                if (reader != null) reader.Close();
                if (conn != null) conn.Close();
            }
            return elenco;
        }

        // POST api/Values/Prova
        [Route("Concerti")]
        public List<Concerto> Concerti(string anno)
        {
            OleDbDataReader reader = null;
            List<Concerto> elenco = new List<Concerto>();
            OleDbConnection conn = ConnectToAccess();
            try
            {
                OleDbCommand cmd =
                   new OleDbCommand("SELECT * from registroUscite;", conn);
                //reader = cmd.ExecuteReader();
                // dichiaro le var che conterranno i valori


                // --> sistema semplice:
                // creo una tabella e ci carico i risultati della query
                DataTable table = new DataTable("registroUscite");
                table.Load(cmd.ExecuteReader());

                // leggo i risultati
                for (int i = 0; i < table.Rows.Count; i++)
                {
                    Concerto nuovo = new Concerto(Convert.ToInt32(table.Rows[i]["id_uscita"]), Convert.ToDateTime(table.Rows[i]["data_inizio"].ToString()), Convert.ToDateTime(table.Rows[i]["data_fine"].ToString()), table.Rows[i]["quandoDescrizione"].ToString(), table.Rows[i]["luogo_uscita"].ToString(), table.Rows[i]["dettagli_uscita"].ToString(), table.Rows[i]["indirizzoFileVolantini"].ToString());

                    elenco.Add(nuovo);
                }
                if (anno != "home")
                {
                    elenco = elenco.Where(a => a.data_inizio.Year == Convert.ToInt32(anno)).ToList();
                }
                else
                {
                    List<Concerto> elencoFiltrato = elenco.Where(a => a.data_inizio > DateTime.Now).OrderBy(a => a.data_inizio).Take(3).ToList();
                    if (elencoFiltrato.Count < 3)
                    {
                        elencoFiltrato.AddRange(elenco.Where(a => a.data_inizio < DateTime.Now).OrderByDescending(a => a.data_inizio).Take(3 - elencoFiltrato.Count).ToList());
                    }
                    elenco = elencoFiltrato;
                }
            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                if (reader != null) reader.Close();
                if (conn != null) conn.Close();
            }
            return elenco;
        }
        // POST api/Values/Prova
        [Route("UserConnected")]
        public Utente UserConnected()
        {
            Utente user = null;

            try
            {
                //AccountController ac = new AccountController();
                //UserInfoViewModel userconn = ac.GetUserInfo();
                //if (userconn.HasRegistered)
                    user = new Utente();
            }
            catch (Exception ex)
            {
                throw ex;
            }
            return user;
        }
        // POST api/Values/Prova
        [Route("Contatti")]
        public List<InfoCoro> Contatti()
        {
            OleDbDataReader reader = null;
            List<InfoCoro> elenco = new List<InfoCoro>();
            OleDbConnection conn = ConnectToAccess();
            try
            {
                OleDbCommand cmd =
                   new OleDbCommand("SELECT * from Storia;", conn);

                OleDbCommand cmd2 =
                   new OleDbCommand("SELECT * from informazioniSito;", conn);
                //reader = cmd.ExecuteReader();
                // dichiaro le var che conterranno i valori


                // --> sistema semplice:
                // creo una tabella e ci carico i risultati della query
                DataTable table = new DataTable("InfoCoro");
                DataTable table2 = new DataTable("Storia");
                table.Load(cmd2.ExecuteReader());
                table2.Load(cmd.ExecuteReader());
                // leggo i risultati
                for (int i = 0; i < table.Rows.Count; i++)
                {

                    InfoCoro nuovo = new InfoCoro(table2.Rows[i]["storiaCoro"].ToString(), table.Rows[i]["indirizzoCoro"].ToString(), table.Rows[i]["codiceFiscaleCoro"].ToString(), table.Rows[i]["nomePresidente"].ToString(), table.Rows[i]["nomeDirettore"].ToString(), table.Rows[i]["telefonoPresidente"].ToString(), table.Rows[i]["telefonoDirettore"].ToString(), table.Rows[i]["mailPresidente"].ToString(), table.Rows[i]["mailDirettore"].ToString());

                    elenco.Add(nuovo);
                }

            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                if (reader != null) reader.Close();
                if (conn != null) conn.Close();
            }
            return elenco;
        }

        private OleDbConnection ConnectToAccess()
        {

            OleDbConnection conn = null;
            try
            {
                conn = new OleDbConnection(
                    "Provider=Microsoft.Jet.OLEDB.4.0; " +
                    "Data Source= C:/Users/loren/Documents/visual studio 2015/Projects/CoralitaViucese_20171028/CoralitaViucese_20171028/DB/dbcoro.mdb");
                conn.Open();


            }
            catch (Exception e)
            {
                throw e;
            }
            //finally
            //{
            //    if (conn != null) conn.Close();
            //}
            return conn;
        }


        /// <summary>
        /// Metodo per il carimento di un documento relativo a una pratica
        /// </summary>
        /// <param name="value1">idPratica</param>
        /// <param name="value2">docSelezionato</param>
        /// <param name="value3">idModelloSelezionato</param>
        /// <returns></returns>
        [Route("SaveConcerto")]
        public string SaveConcerto(string concerto)
        {

            Concerto c = Newtonsoft.Json.JsonConvert.DeserializeObject<Concerto>(concerto);
            int iUploadedCnt = 0;

            // DEFINE THE PATH WHERE WE WANT TO SAVE THE FILES.
            DirectoryInfo sPath = new DirectoryInfo(System.Web.Hosting.HostingEnvironment.MapPath("~/Doc_Volantini/"));

            if (!sPath.Exists) sPath.Create();

            HttpFileCollection hfc = HttpContext.Current.Request.Files;

            if (hfc.Count > 0)
            {
                // CHECK THE FILE COUNT.
                for (int iCnt = 0; iCnt <= hfc.Count - 1; iCnt++)
                {
                    System.Web.HttpPostedFile hpf = hfc[iCnt];

                    string fileName = hpf.FileName;

                    if (hpf.ContentLength > 0)
                    {


                        try
                        {
                            //string header = DateTime.Now.Millisecond.ToString();
                            FileInfo myFile1 = new FileInfo(Path.Combine(sPath.FullName, Path.GetFileName(hpf.FileName)));
                            if (!myFile1.Exists)
                            {
                                hpf.SaveAs(Path.Combine(sPath.FullName, Path.GetFileName(hpf.FileName)));

                                FileInfo myFile = new FileInfo(Path.Combine(sPath.FullName, Path.GetFileName(hpf.FileName)));

                                //FileInfo myDestFile = new FileInfo(Path.Combine(sPath, myDoc.tipologia + myFile.Extension));
                                FileInfo myDestFile = new FileInfo(Path.Combine(sPath.FullName, Regex.Replace(myFile.Name, "[^a-zA-Z0-9_.]+", "", RegexOptions.Compiled)));

                                //if (myDestFile.Exists) myDestFile.Delete();

                                myFile.MoveTo(Path.Combine(myDestFile.DirectoryName, myDestFile.Name));
                                c.indirizzoFileVolantini = "/Doc_Volantini/" + myDestFile.Name;
                                if (myFile.Exists)
                                {

                                    UpdateConcerto(c);
                                }
                                else
                                    throw new Exception("No upload done!");
                            }
                            else
                            {
                                if (myFile1.Exists)
                                {

                                    UpdateConcerto(c);
                                }
                                else
                                    throw new Exception("No upload done!");
                            }

                            iUploadedCnt = iUploadedCnt + 1;

                        }
                        catch (Exception ex)
                        {
                            throw ex;
                        }
                    }
                }
            }
            else
            {
                UpdateConcerto(c);
            }
            // RETURN A MESSAGE (OPTIONAL).
            if (iUploadedCnt > 0)
            {
                return iUploadedCnt + "Files Uploaded Successfully";
            }
            else
            {
                return "Upload Failed";
            }
        }

        private void UpdateConcerto(Concerto c)
        {
            OleDbDataReader reader = null;
            List<Concerto> elenco = new List<Concerto>();
            OleDbConnection conn = ConnectToAccess();
            try
            {
                string query = string.Empty;
                c.quandoDescrizione = "pomeriggio";
                if (c.id_uscita > 0)
                    query = "UPDATE registroUscite SET data_inizio='" + Convert.ToDateTime(c.data_inizio) + "',data_fine='" + Convert.ToDateTime(c.data_fine) + "',quandoDescrizione='" + c.quandoDescrizione + "' ,luogo_uscita='" + c.luogo_uscita + "' ,dettagli_uscita='" + c.dettagli_uscita + "' ,indirizzoFileVolantini='" + c.indirizzoFileVolantini + "'  where id_uscita=" + c.id_uscita + ";";
                else
                    query = "INSERT INTO registroUscite (data_inizio, data_fine, quandoDescrizione, luogo_uscita,dettagli_uscita,indirizzoFileVolantini) VALUES('"+ Convert.ToDateTime(c.data_inizio).ToShortDateString()+ "', '" + Convert.ToDateTime(c.data_fine).ToShortDateString() + "', '" + c.quandoDescrizione + "', '" + c.luogo_uscita + "', '" + c.dettagli_uscita + "', '" + c.indirizzoFileVolantini+"'); ";


                OleDbCommand cmd =
                   new OleDbCommand(query, conn);
                //reader = cmd.ExecuteReader();
                // dichiaro le var che conterranno i valori


                // --> sistema semplice:
                // creo una tabella e ci carico i risultati della query
                DataTable table = new DataTable("registroUscite");
                table.Load(cmd.ExecuteReader());

                // leggo i risultati
                var i = 0;

            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                if (reader != null) reader.Close();
                if (conn != null) conn.Close();
            }

        }
    }

}
