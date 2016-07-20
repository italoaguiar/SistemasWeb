<h1>Realizar novo procedimento</h1>
<?php
    echo $this->Form->create('Exame');
    echo $this->Form->input('paciente_id', array(
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value'=> $id));
    echo $this->Form->input('data', array(
                        'class' => 'form-control'));
    echo $this->Form->select('procedimento_id', $procedimentos,array('empty'=> 'Selecione:','class' => 'form-control'));
    echo $this->Form->end('Salvar');
?>