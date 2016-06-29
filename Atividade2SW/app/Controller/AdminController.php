<?php
    class AdminController extends AppController{
        public $helpers = array('Form', 'Html','Session');
        public $components = array("Flash");
        public function index(){
            $ss = $this->Session->read("Usuario.admin");
            if(isset($ss))
            {
                $this->set("title", "Produtos");
                $this->loadModel('Produto');
                $this->set('produtos', $this->Produto->find('all'));
                if($ss == '1'){
                    $this->set('CanDelete', True);
                }else{
                    $this->set('CanDelete', FALSE);
                }
            }else{
                $this->redirect(array("action" => '/login/'));
            }
        }
        public function adicionar() {
            $this->loadModel('Produto');
            $this->set('title', 'Adicionar produto');
            if ($this->request->is("post")) {
                $this->Produto->create();
                if ($this->Produto->saveAssociated($this->request->data)) {
                    $this->Flash->set("Registro salvo com sucesso.");
                    $this->redirect(array("action" => '/index/'));
                } else {
                    $this->Flash->set("Erro: não foi possível salvar o registro.");
                    $this->redirect(array("action" => '/adicionar/'));
                }
            }
        }
        public function novo(){
            
        }
        public function editar($id = NULL) {
            $this->loadModel('Produto');
            $this->set("title", "Editar produto");
            $this->Produto->id = $id;
            if (!$this->Produto->exists()) {
                throw new NotFoundException(__('Registro não encontrado.'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Produto->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__('Registro salvo com sucesso.'));
                    $this->redirect(array('action' => '/index/'));
                } else {
                    $this->Flash->set('Erro: não foi possível salvar o registro.');
                }
            } else {
                $this->request->data = $this->Produto->read(NULL, $id);
            }
        }
        public function excluir($id = NULL) {
            $this->loadModel('Produto');
            if (!$this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
            $this->Produto->id = $id;
            if (!$this->Produto->exists()) {
                throw new NotFoundException(__('Registro não encontrado.'));
            }
            if ($this->Produto->delete()) {
                $this->Flash->set('Registro excluído com sucesso.');
                $this->redirect(array('action' => '/index/'));
            }
            $this->Flash->set('Erro: não foi possível excluir o registro.');
            $this->redirect(array('action' => '/index/'));
        }
        public function login(){
            if ($this->request->is("post")) {
                $this->loadModel('Usuario');
                $login = $this->request->data('Usuario.login');
                $senha = $this->request->data('Usuario.senha');
                $user = $this->Usuario->find('all',array('conditions' => 
                array('login' => $login, 'senha' => $senha)));
                
                if(count($user)> 0){                    
                    $this->Session->write("Usuario.admin", $user[0]['Usuario']['tipo']);
                    $this->redirect(array("action" => '/index/'));                    
                }   
                else {
                    $this->Flash->set("Usuário ou senha inválidos.");
                    $this->redirect(array("action" => '/login/'));
                }
            }
        }
    }
?>
