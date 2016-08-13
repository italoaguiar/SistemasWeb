using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Financeiro4.Controllers
{
    public class TiposController : Controller
    {
        // GET: Tipos
        public ActionResult Index()
        {

            Models.DatabaseEntities db = new Models.DatabaseEntities();

            return View(db.tipos.OrderBy(p=> p.nome).ToList());
        }
    }
}