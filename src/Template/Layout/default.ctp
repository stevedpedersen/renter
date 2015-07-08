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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Renter Management Portal';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>   

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('dashboard.css') ?>
    <?= $this->Html->css('signin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>

    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand" style="color:white; font-size:160%">Renter Management Portal</span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li role="presentation"><?= $this->Html->link('Login', 
                ['controller' => 'Users', 'action' => 'login']) ?></li>
            <li role="presentation"><?= $this->Html->link('Register', 
                ['controller' => 'Users', 'action' => 'add']) ?></li>
            <li role="presentation"><?= $this->Html->link('Logout', 
                ['controller' => 'Users', 'action' => 'logout']) ?></li>
          </ul>         
        </div>
      </div>
    </nav>

    <div id="sidebar">
      <?php echo $this->fetch('sidebar');  ?>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      

        <div class="container-fluid">

            <div id="content">

                <div class="row">
                    <?= $this->fetch('content') ?>
                </div>

            </div>
            <footer>
                <div>
                    <?= $this->Flash->render() ?>
                    <?php
                        echo $this->Flash->render();
                        //echo $this->Flash->render('auth');
                    ?>

                </div>
            </footer>
        </div>

      
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
