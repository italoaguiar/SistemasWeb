using System;
using System.Globalization;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;
using System.Web;
using System.Web.Mvc;
using TP2SW.Models;

namespace TP2SW.Controllers
{
    [Authorize]
    public class AccountController : Controller
    {

        public AccountController()
        {
        }


        

        //
        // GET: /Account/Login
        [AllowAnonymous]
        public ActionResult Login(string returnUrl, bool? admin)
        {
            ViewBag.Admin = admin;
            ViewBag.ReturnUrl = returnUrl;
            return View();
        }

        //
        // POST: /Account/Login
        [HttpPost]
        [AllowAnonymous]
        [ValidateAntiForgeryToken]
        public ActionResult Login(LoginViewModel model, bool? admin, string returnUrl)
        {
            if (!ModelState.IsValid)
            {
                return View(model);
            }

            Models.petshopEntities e = new petshopEntities();

            if(admin != null && admin == true)
            {
                var k = e.usuarios.Where(p => p.login == model.Username && p.senha == model.Password);
                if (k.Count() > 0)
                {
                    System.Web.Security.FormsAuthentication.SetAuthCookie(model.Username, model.RememberMe);                    
                    Session["user"] = k.First().nome;
                    Session["permission"] = k.First().tipo;
                    return RedirectToAction("Index","Admin");
                }
            }
            var u = e.clientes.Where(p => p.login == model.Username && p.senha == model.Password);
            if (u.Count() > 0)
            {
                System.Web.Security.FormsAuthentication.SetAuthCookie(model.Username, model.RememberMe);
                Session["user"] = u.First().nome;
                return RedirectToLocal(returnUrl);
            }

            return View();
        }

           

    //
    // GET: /Account/Register
    [AllowAnonymous]
        public ActionResult Register()
        {
            return View();
        }

        //
        // POST: /Account/Register
        [HttpPost]
        [AllowAnonymous]
        [ValidateAntiForgeryToken]
        public async Task<ActionResult> Register(RegisterViewModel model)
        {
            if (ModelState.IsValid)
            {
                Models.petshopEntities e = new petshopEntities();
                Models.clientes cli = new clientes();
                cli.login = model.Username;
                cli.senha = model.Password;
                cli.nome = model.Name;

                try
                {
                    e.clientes.Add(cli);
                    await e.SaveChangesAsync();
                    System.Web.Security.FormsAuthentication.SetAuthCookie(model.Username, false);
                    Session["user"] = model.Name;
                    return RedirectToAction("Index", "Home");
                }
                catch(Exception ex)
                {
                    System.Diagnostics.Debug.WriteLine(ex);
                    return View(model);
                }
            }

            // If we got this far, something failed, redisplay form
            return View(model);
        }

       

        //
        // POST: /Account/LogOff
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult LogOff()
        {
            System.Web.Security.FormsAuthentication.SignOut();
            return RedirectToAction("Index", "Home");
        }

        //
        // GET: /Account/ExternalLoginFailure
        [AllowAnonymous]
        public ActionResult ExternalLoginFailure()
        {
            return View();
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                
            }

            base.Dispose(disposing);
        }
        private ActionResult RedirectToLocal(string returnUrl)
        {
            if (Url.IsLocalUrl(returnUrl))
            {
                return Redirect(returnUrl);
            }
            return RedirectToAction("Index", "Home");
        }
    }
}