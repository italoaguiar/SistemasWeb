<?php
    class ProdutosController extends AppController{
        public $helpers = array('Html', 'Session');

        public function index(){
            $this->set('produtos', $this->Produto->find('all'));
        }
        public function view($codigo){
            if ($this->request->is("post")) {
                $ss = $this->Session->read('Cliente.id');
                if(isset($ss)){
                    $this->loadModel('Compra');
                    $qtd = $this->request->data('compra.quantidade');
                    $produto = $this->request->data('compra.produto');
                    $user = $this->Session->read('Cliente.id');

                    $data = array(
                        'compra' => array(
                        'cliente_id' => $user,
                        'quantidade' => $qtd,
                        'produto_id' => $produto,
                        'data' => date()
                    ));

                    if ($this->Compra->save($data)) {
                        $this->Flash->set("Registro salvo com sucesso.");
                        $this->redirect(array("action" => '/sucesso/'));
                    } else {
                        $this->Flash->set("Erro: não foi possível efetuar a compra.");
                        $this->redirect(array("action" => '/index/'));
                    }
                }else{
                    $this->redirect(array("action" => '/login/', "controller" => 'cliente'));
                }
            }

            $produto = $this->Produto->findById($codigo);
            $this->set('produto',$produto);
        }
        public function sucesso(){
            
        }
    } 
?>

