<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../bootstrap/bootstrap.php';

// Retornando mais informações do livro informado pelo id
$app->get('/book', function (Request $request, Response $response) use($app) {
    $payload = json_encode(['message' => 'Lista de livros']);
    $response->getBody()->write($payload);
    return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
});

// Retornando mais informações do livro informado pelo id
$app->get('/book/{id}', function (Request $request, Response $response, array $args) use($app) {
    $payload = json_encode(['message' => "Exibindo o livro {$args['id']}"]);
    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

});

// Cadastra um novo Livro
$app->post('/book', function (Request $request, Response $response, array $args) use ($app){
    $payload = json_encode(['message' => "Cadastrando um novo livro"]);
    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

});

// Atualiza os dados de um livro
$app->put('/book/{id}', function (Request $request, Response $response, array $args) use ($app){
    $payload = json_encode(['message' => "Modificando o livro {$args['id']}"]);
    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

});

// Deleta o livro informado pelo ID
$app->delete('/book/{id}', function (Request $request, Response $response, array $args) use ($app){
    $payload = json_encode(['message' => "Deletando o livro {$args['id']}"]);
    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);

});

// Run application
$app->run();