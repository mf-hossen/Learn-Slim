<?php
    session_start();
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

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};


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
    $delete_message = $this->flash->getMessages();
    $response = $this->view->render($response, "list.php", ['employee'=>$data,'delete_message'=>$delete_message]);
    $this->logger->addInfo("Something  happened");
    $this->logger->error('');
    $this->logger->warning();
    return $response;
});

$app->get('/add', function (Request $request, Response $response) {
    $response = $this->view->render($response, "insert.php");
});

$app->post('/insert', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    //var_dump($data);
    $mapper = new EmployeeMapper($this->db);
    $id=$mapper->AddEmployee($data);
    //var_dump($sql);die();
    $this->flash->addMessage('message', 'Successfuly employee added !!!');
    return $response->withRedirect('/details/'.$id);


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
    $sql=$mapper->EditEmployee($data);
    $this->flash->addMessage('update_message', 'Successfuly updated !!!');
    return $response->withRedirect('/details/'.$sql);
});

$app->get('/details/{id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $mapper = new EmployeeMapper($this->db);
    $details_data = $mapper->GetDetails($id);
    $messages = $this->flash->getMessages();
    $response = $this->view->render($response, "details.php",['details'=>$details_data,'msg'=>$messages]);
    return $response;
});

$app->get('/delete/{id}', function(Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $mapper = new EmployeeMapper($this->db);
    $mapper->EmpDelete($id);
    $this->flash->addMessage('delete_message', 'Employee Deleted!!!');
    return $response->withRedirect('/employee');
});


$app->run();