<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('Site');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
               
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link("Procedimentos",
                    array('controller' => 'procedimentos',
                            'action' => 'index'));?></li>
                    <li><?php echo $this->Html->link("Pacientes",
                    array('controller' => 'pacientes',
                            'action' => 'index'));?></li>
                    <li><?php echo $this->Html->link("Admnistrador",
                    array('controller' => 'admin',
                            'action' => 'index'));?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                    $paciente = $this->Session->read("Paciente.nome");
                    if(isset($paciente)){
                        echo '<li title="Sair">'.$this->Html->link("Olá $paciente",
                    array('controller' => 'pacientes',
                            'action' => 'logout')).'</li>';
                    }else{
                        echo '<li>'.$this->Html->link("Login do Paciente",
                    array('controller' => 'pacientes',
                            'action' => 'login')).'</li>';
                        /*echo '<li>'.$this->Html->link("Registrar",
                    array('controller' => 'pacientes',
                            'action' => 'register')).'</li>';*/
                    }

                ?>                
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <?php echo $this->Flash->render(); ?>

		<?php echo $this->fetch('content'); ?>
        <hr />
        <footer>
            <p>Copyright &copy; Sistema de Análises Laboratoriais</p>
            <hr/>
            <br/><br/>
            <?php echo $this->element('sql_dump'); ?>
        </footer>
    </div>
    <?php echo $this->Html->script('jquery-1.10.2.min');?>
    <?php echo $this->Html->script('bootstrap');?>
    <?php echo $this->Html->script('jquery.validate.min');?>
    <?php echo $this->Html->script('jquery.validate.unobtrusive.min');?>
</body>
</html>
