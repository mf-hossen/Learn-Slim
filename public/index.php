<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "Preview@Dev!@#";
$config['db']['dbname'] = "slim";

$app = new \Slim\App(["settings" => $config]);

spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
$container['view'] = new \Slim\Views\PhpRenderer("../templates/");

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});


$app->get('/', function (Request $request, Response $response) {

    $response->getBody()->write("This is home page");

    return $response;
});



$app->get('/employee', function (Request $request, Response $response) {
    $mapper = new EmployeeMapper($this->db);
    $data=$mapper->getEmployee();
    $response = $this->view->render($response, "list.php", ['employee'=>$data]);
    $this->logger->addInfo("Something  happened");
    $this->logger->error('');
    $this->logger->warning();
    return $response;
});

$app->get('/insert', function (Request $request, Response $response) {
    $response = $this->view->render($response, "insert.php");
});

$app->post('/insert', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    //var_dump($data);
    $mapper = new EmployeeMapper($this->db);
    $mapper->AddEmployee($data);
    return $response->withRedirect('/employee');


});

$app->get('/update/{id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $mapper = new EmployeeMapper($this->db);
    $update_data = $mapper->GetbyId($id);
    $response = $this->view->render($response, "update.php",['update_data'=>$update_data]);
    return $response;
});

$app->post('/update', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    //var_dump($data);
    $mapper = new EmployeeMapper($this->db);
    $message=$mapper->EditEmployee($data);


});


$app->run();