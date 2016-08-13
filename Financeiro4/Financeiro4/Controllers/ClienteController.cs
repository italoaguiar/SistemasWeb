using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace Financeiro4.Controllers
{
    [Authorize]
    public class ClienteController : Controller
    {
        // GET: Cliente
        public ActionResult Index()
        {
            Models.DatabaseEntities db = new Models.DatabaseEntities();

            //ordena por data e nome
            var result = db.trans.OrderBy(p => p.data).OrderBy(p=> p.tipos.nome);

            return View(result);
        }

        public ActionResult Logout()
        {
            FormsAuthentication.SignOut();
            return RedirectToAction("Login");
        }

        [AllowAnonymous]
        public ActionResult Login()
        {
            return View();
        }
        [HttpPost]
        [AllowAnonymous]
        public ActionResult Login(Models.LoginModel model)
        {
            Models.DatabaseEntities db = new Models.DatabaseEntities();

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

                Session["id"] = user.id;
          

                return Redirect("Index");
            }
            else
            {
                ViewBag.Error = "Login Inválido!";
                return View();
            }

            return View();
        }
    }
}