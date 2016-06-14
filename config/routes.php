<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {

     $routes->connect('/', ['controller' => 'Users','action'=>'home']);
     $routes->connect('/register',['controller'=>'Users','action'=>'register']);
      $routes->connect('/logout', ['controller' => 'Users','action'=>'logout']);
});

Router::scope('/profile',function($routes){
    $routes->connect('/',['controller'=>'Users','action'=>'profile']);
    $routes->connect('/getUserName',['controller'=>'Users','action'=>'getUserName']);
});

Router::scope('/posts',function($routes){
    $routes->connect('/:id',['controller'=>'Posts','action'=>'view'],['id'=>'\d+','pass'=>['id']]);
    $routes->connect('/delete/:id',['controller'=>'Posts','action'=>'delete'],['id'=>'\d+','pass'=>['id']]);
    $routes->connect('/edit/:id',['controller'=>'Posts','action'=>'edit'],['id'=>'\d+','pass'=>['id']]);
    $routes->connect('/comments/add',['controller'=>'Comments','action'=>'add']);
    $routes->connect('/user/show/:id',['controller'=>'Posts','action'=>'show'],['id'=>'\d+','pass'=>['id']]);

});

Router::scope('/admin',function($routes){
    $routes->connect('/users',['controller'=>'Admins','action'=>'index']);
    $routes->connect('/users/role/:id',['controller'=>'Admins','action'=>'changeRole'],['id'=>'\d+','pass'=>['id']]);
    $routes->connect('/users/delete/:id',['controller'=>'Admins','action'=>'delete'],['id'=>'\d+','pass'=>['id']]);
    
});



/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
