using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace Financeiro4.Controllers
{
    
    public class ClienteController : Controller
    {
        // GET: Cliente
        public ActionResult Index()
        {
            Models.financeiroEntities db = new Models.financeiroEntities();

            //ordena por data e nome
            db.trans.OrderBy(p => p.data).OrderBy(p=> p.tipos.nome);

            return View(db);
        }

        
        public ActionResult Login()
        {
            return View();
        }
        [HttpPost]
        public ActionResult Login(Models.LoginModel model)
        {
            Models.financeiroEntities db = new Models.financeiroEntities();

            var user = db.clientes.Where(p => p.login == model.Login && p.senha == model.Senha).FirstOrDefault();

            if(user != null)
            {

                FormsAuthenticationTicket ticket = new FormsAuthenticationTicket(
                  1,                                     // ticket version
                  model.Login,                              // authenticated username
                  DateTime.Now,                          // issueDate
                  DateTime.Now.AddMinutes(30),           // expiryDate
                  true,                          // true to persist across browser sessions
                  "",                              // can be used to store additional user data
                  FormsAuthentication.FormsCookiePath);  // the path for the cookie

                // Encrypt the ticket using the machine key
                string encryptedTicket = FormsAuthentication.Encrypt(ticket);

                // Add the cookie to the request to save it
                HttpCookie cookie = new HttpCookie(FormsAuthentication.FormsCookieName, encryptedTicket);
                cookie.HttpOnly = true;
                Response.Cookies.Add(cookie);

                return Redirect("Index");
            }
            else
            {
                return View();
            }

            return View();
        }
    }
}