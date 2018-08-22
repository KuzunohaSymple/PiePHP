<?php
Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
//Router::connect('/raf', ['controller' => 'user', 'action' => 'lol']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/user', ['controller' => '', 'action' => 'login']);
// echo "BOUUUU";