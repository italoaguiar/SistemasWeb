<?php
    class CidadesController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $this-> set('cidades', $this->Cidade->find('all'));
        }
        public function view($codigo){
            
        }
        public function add(){
            if(empty($this->request->data)){
                $estados = $this->Cidade->Estado->Find('list',
                array('fields' => array('id','nome')));

                $this->set('estados', $estados);
            }else{
                $this->Cidade->save($this->request->data);

                $this->Flash->set('Cidade inserida com sucesso');
                $this->redirect(array('action'=> 'index'));
            }
        }
    }
?>
