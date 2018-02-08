<?php
/**
 *
 * PHP 5
 *
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'ACR ');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('utf-8');?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');


                echo $this->Html->css('jquery-ui-1.9.0.custom');
                echo $this->Html->css('jquery-ui-1.9.0.custom.min');
				// echo $this->Html->css('bootstrap.min');
				echo $this->Html->css('stylos');
				echo $this->Html->css('videos');
               
                
				//combobox autocomplete
                echo $this->Html->script('jquery-1.10.2.js');
                echo $this->Html->script('jquery.min.js');
                echo $this->Html->script('jquery-ui.js');
                echo $this->Html->script('jquery-1.8.2.min');
                echo $this->Html->script('jquery-ui-1.9.0.custom.min');
               
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer id="footer">
			
		</footer>
	</div>
	<?php 
	     // echo $this->element('sql_dump'); 
         echo $this->Js->writeBuffer();
        ?>
</body>
</html>
