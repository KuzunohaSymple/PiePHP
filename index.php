<?php
define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

// require_once('Core/Core.php');
// require_once('Core/Controller.php');
// require_once('src/Controller/UserController.php');
// require_once('src/Model/UserModel.php');


$app = new Core\Core();
$app->run();
//$lol = new UserModel();
//$lol->save();



