using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Financeiro4.Controllers
{
    public class AdminController : Controller
    {
        // GET: Admin
        public ActionResult Index()
        {
            Models.financeiroEntities db = new Models.financeiroEntities();

            return View(db.clientes.OrderBy(p=> p.nome));
        }
    }
}