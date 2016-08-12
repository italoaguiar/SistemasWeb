using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Financeiro4.Controllers
{
    public class TransacoesController : Controller
    {
        public ActionResult Index()
        {
            Models.financeiroEntities db = new Models.financeiroEntities();
            //ordem crescente de cliente e decrescente de data
            var data = db.trans.OrderBy(p => p.clientes.nome).OrderBy(p => p.data).Reverse();

            return View(data);
        }

        // GET: Transacoes
        public ActionResult Cadastrar()
        {
            return View();
        }

        public ActionResult Salvar(Models.trans trans)
        {
            Models.financeiroEntities db = new Models.financeiroEntities();

            db.trans.Add(trans);


            db.SaveChanges();

            return RedirectToAction("Index", "Cliente");
        }
    }
}