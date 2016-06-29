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
                <div class="navbar-brand site-logo"></div>
               
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link("Produtos",
                    array('controller' => 'produtos',
                            'action' => 'index'));?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                    $cliente = $this->Session->read("Cliente.nome");
                    if(isset($cliente)){
                        echo '<li title="Sair">'.$this->Html->link("Olá $cliente",
                    array('controller' => 'clientes',
                            'action' => 'logout')).'</li>';
                    }else{
                        echo '<li>'.$this->Html->link("Login",
                    array('controller' => 'clientes',
                            'action' => 'login')).'</li>';
                        echo '<li>'.$this->Html->link("Registrar",
                    array('controller' => 'clientes',
                            'action' => 'register')).'</li>';
                    }

                ?>                
                </ul>
            </div>
        </div>
    </div>
    <header class="image-bg-fluid-height">
        <div class="container">
            <div class="col-md-6">
                <h1 class="site-title">Cuide do seu bichinho como se fosse você mesmo!</h1>
            </div>
            <div class="col-md-6">
                <?php echo $this->Html->image('animals.png', array('alt' => 'Animais')); ?>
            </div>
        </div>
    </header>
    <div class="container body-content">
        <?php echo $this->Flash->render(); ?>

		<?php echo $this->fetch('content'); ?>
        <hr />
        <footer>
            <p>Copyright &copy; PetStore</p>
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
