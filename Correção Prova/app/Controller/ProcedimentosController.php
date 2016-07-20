<?php
    class ProcedimentosController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $this-> set('procedimentos', $this->Procedimento->find('all', 
            array( 'order' => "nome ASC")));
        }
        public function view($codigo){
            
        }
    }
?>