<?php
    class ExamesController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $this-> set('exames', $this->Exame->find('all', 
            array( 'order' => "nome ASC")));
        }
        public function view($codigo){
            
        }
    }
?>