<?php
class ClientesController extends AppController{
        public $helpers = array('Form', 'Html','Session');
        public $components = array("Flash");
        public function index(){
            $this->redirect(array("action" => '/index/', "controller" => "produtos"));
        }

        public function login(){
            if ($this->request->is("post")) {
                $login = $this->request->data('Usuario.login');
                $senha = $this->request->data('Usuario.senha');
                $user = $this->Cliente->find('all',array('conditions' => 
                array('login' => $login, 'senha' => $senha)));
                
                if(count($user)> 0){                    
                    $this->Session->write("Cliente.nome", $user[0]['Cliente']['nome']);
                    $this->Session->write("Cliente.id", $user[0]['Cliente']['id']);
                    $this->redirect(array("action" => '/index/'));                    
                }   
                else {
                    $this->Flash->set("Usuário ou senha inválidos.");
                    $this->redirect(array("action" => '/login/'));
                }
            }
        }
        public function register(){
            if ($this->request->is("post")) {
                if ($this->Cliente->save($this->request->data)) {                    
                    $this->Session->write("Cliente.nome", $this->request->data('Cliente.nome'));
                    $this->Session->write("Cliente.id", $this->Cliente->getLastInsertId());
                    $this->redirect(array("action" => '/index/'));
                } else {
                    echo $this->request->data('Usuario.login');
                    debug($this->request->data); die();
                    $this->Flash->set("Erro: não foi possível salvar o registro.");
                    $this->redirect(array("action" => '/register/'));
                }
                
            }
        }
}
?>
