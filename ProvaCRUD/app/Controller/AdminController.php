<?php
    class AdminController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $this->loadModel('Exame');
            $this-> set('exames', $this->Exame->find('all',array('order' => "data DESC")));
        }

        public function pacientes(){
            $this->loadModel('Paciente');
            $this-> set('pacientes', $this->Paciente->find('all',array( 'order' => "nome ASC")));
        }

        public function total(){
            $this->loadModel('Paciente');
            $this-> set('total', $this->Paciente->Exame->find('all'));
        }
    }
?>
