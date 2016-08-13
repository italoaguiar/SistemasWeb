using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Financeiro4.Controllers
{
    public class TransacoesController : Controller
    {
        Models.DatabaseEntities db = new Models.DatabaseEntities();
        public ActionResult Index()
        {
            
            //ordem crescente de cliente e decrescente de data
            var data = db.trans.OrderBy(p => p.clientes.nome).OrderByDescending(p => p.data);

            return View(data);
        }

        // GET: Transacoes
        public ActionResult Cadastrar()
        {
            ViewBag.Tipos = new SelectList(db.tipos.ToList(),"id","nome");

            return View();
        }

        public ActionResult Salvar(Models.trans trans)
        {
            trans.cliente_id = int.Parse(Session["id"].ToString());

            db.trans.Add(trans);


            db.SaveChanges();

            return RedirectToAction("Index", "Cliente");
        }
    }
}