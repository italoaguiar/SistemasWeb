using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TP2SW.Models;

namespace TP2SW.Controllers
{
    [Authorize]
    public class AdminController : Controller
    {
        // GET: Admin  
        [AllowAnonymous]      
        public ActionResult Index()
        {
            if(!Request.IsAuthenticated)
                return RedirectToAction("Login", "Account", new { admin = true });

            var s = Session["permission"];
            int k = 0;

            if(s != null)
                int.TryParse(s.ToString(), out k);

            if (k == 1)
            {
                ViewBag.CanDelete = true;
            }
            else
            {
                ViewBag.CanDelete = false;
            }
                

            Models.petshopEntities e = new Models.petshopEntities();
            ViewBag.Produtos = e.produtos.ToList();
            return View();
        }

        public ActionResult Novo()
        {
            return View();
        }
        [HttpPost]
        public ActionResult AddProduto(ProdutoViewModel model)
        {
            try
            {
                string FileName = "";
                HttpPostedFileBase hpf = Request.Files["image"] as HttpPostedFileBase;
                if (hpf != null)
                {
                    var TimeStamp = DateTime.Now.ToString("ddMyyyyHHmmsf");
                    FileName = "img_" + TimeStamp + Path.GetExtension(hpf.FileName);
                    string savedFileName = Path.Combine(Server.MapPath("~/Content/Images"), FileName);
                    hpf.SaveAs(savedFileName); // Save the file                }
                }

                Models.petshopEntities e = new petshopEntities();
                Models.produtos p = new produtos();
                p.nome = model.Nome;
                p.preco = model.Preco;
                p.imagem = FileName;
                e.produtos.Add(p);
                e.SaveChanges();
                return RedirectToAction("Index", "Admin");
            }
            catch
            {

            }
            
            return View();
        }
    }
}