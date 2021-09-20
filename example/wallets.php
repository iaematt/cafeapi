<?php

/** Require files */
require __DIR__ . '/assets/config.php';
require __DIR__ . '/../vendor/autoload.php';

/** Dependencies */
use MatheusBastos\CafeApi\Wallets;

$wallets = new Wallets('localhost/fsphp/api/', 'nome@servidor.com', 'senhasecreta');

/** Index */
echo '<h1>INDEX</h1>';
$index = $wallets->index(null);
$index = $wallets->index([
    'free' => 1, //0 ou 1
    'page' => 1,
]);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}

/** Create */
echo '<h1>CREATE</h1>';

//$create = $wallets->create(["wallet" => "Create By PHP Api"]);
$create = $wallets->create([]);

if ($create->error()) {
    echo "<p class='error'>{$create->error()->message}</p>";
} else {
    var_dump($create->response());
}

/** Read */
echo '<h1>READ</h1>';

$read = $wallets->read(500);
$read = $wallets->read(24);

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/** Update */
echo '<h1>UPDATE</h1>';

$update = $wallets->update(29, ['wallet' => 'Updated By PHP API']);

if ($update->error()) {
    echo "<p class='error'>{$update->error()->message}</p>";
} else {
    var_dump($update->response());
}

/** Delete */
echo '<h1>DELETE</h1>';

$delete = $wallets->delete(35);

if ($delete->error()) {
    echo "<p class='error'>{$delete->error()->message}</p>";
} else {
    var_dump($delete->response());
}
