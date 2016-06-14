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

$cakeDescription = 'CakePHP: the rapid development php framework';
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

    <?= $this->Html->script('jquery-2.1.4.js') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css(['navbar.css','form.css','comments.css']) ?>

    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <!-- Second navbar for sign in -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Blog</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link('Home','/') ?></li>
            <?php if($user): ?>
                <li><?= $this->Html->link('Profile','/profile') ?></li>

                <?php if($user['role']=='admin'): ?>
                   <li><?= $this->Html->link('Users','/admin/users') ?></li>
                <?php endif ?>

                <li><?= $this->Html->link('Logout','/logout') ?></li>

            <?php endif ?>

            <?php if(!$user): ?>
            <li><?= $this->Html->link('Register','/register') ?></li>
              <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
            </li>
            <?php endif ?>
          
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
           
            <?= $this->Form->create(false,['class'=>'navbar-form navbar-right form-inline','role'=>'form']) ?>
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" name='email' class="form-control" id="Email" placeholder="Email" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" name='password' class="form-control" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            <?= $this->Form->end() ?>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
      <?php if(isset($errors)): ?>

                <?php foreach($errors as $error): foreach($error as $er): ?>

                  <ul><li class='error'><?= $er ?></li></ul>
                <?php  endforeach; endforeach; ?>

                <?php endif ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    <?= $this->Html->script('bootstrap.min.js') ?>
    </footer>
</body>
</html>
