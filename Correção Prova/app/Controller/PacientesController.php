<?php
    class PacientesController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $ss = $this->Session->read("Paciente.id");
            if(isset($ss))
            {
                $this-> set('exames', $this->Paciente->Exame->find('all',array('conditions' => 
                array('Paciente.id' => $ss), 'order' => "data DESC, procedimento.nome ASC")));
            }else{
                $this->redirect(array("action" => '/login/'));
            }            
        }
        public function add(){
            if ($this->request->is("post")) {
                $this->loadModel('Exame');
                if ($this->Exame->save($this->request->data)) {                    
                    $this->redirect(array("action" => '/index/'));
                } else {
                    $this->Flash->set("Erro: não foi possível salvar o registro.");
                    $this->redirect(array("action" => '/index/'));
                }
                
            }else{
                $ss = $this->Session->read("Paciente.id");
                $this-> set('id', $ss);
                $this->loadModel('Procedimento');
                $procedimentos = $this->Procedimento->Find('list',array('fields' => array('id','nome')));
                $this-> set('procedimentos', $procedimentos);
            }
        }
        public function logout(){
            $this->Session->destroy();
            $this->Session->delete('Paciente.nome');
            $this->Session->delete('Paciente.id');
            $this->redirect(array("action" => '/index/', "controller" => 'Procedimentos'));
        }
        public function login(){
            if ($this->request->is("post")) {
                $login = $this->request->data('Paciente.login');
                $senha = $this->request->data('Paciente.senha');
                $user = $this->Paciente->find('all',array('conditions' => 
                array('login' => $login, 'senha' => $senha)));
                
                if(count($user)> 0){                    
                    $this->Session->write("Paciente.nome", $user[0]['Paciente']['nome']);
                    $this->Session->write("Paciente.id", $user[0]['Paciente']['id']);
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