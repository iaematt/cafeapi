<?php

/** Require files */
require __DIR__ . '/assets/config.php';
require __DIR__ . '/../vendor/autoload.php';

/** Dependencies */
use MatheusBastos\CafeApi\Subscriptions;

$subscription = new Subscriptions('localhost/fsphp/api/', 'nome@servidor.com', 'senhasecreta');

/** Index */
echo '<h1>Index</h1>';
$index = $subscription->index(null);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}

/** Create */
echo '<h1>Create</h1>';

$create = $subscription->create([
    'plan_id' => 1,
    'card_number' => '5583983765729729',
    'card_holder_name' => 'ROBSON LEITE',
    'card_expiration_date' => '12/2020',
    'card_cvv' => '654',
]);

if ($create->error()) {
    echo "<p class='error'>{$create->error()->message}</p>";
} else {
    var_dump($create->response());
}

/** Read */
echo '<h1>Read</h1>';

$read = $subscription->read();

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/** Update */
echo '<h1>UPDATE</h1>';

//$update = $subscription->update(["plan_id" => 2]);
$update = $subscription->update([
    'card_number' => '4024007190034479',
    'card_holder_name' => 'ROBSON LEITE',
    'card_expiration_date' => '12/2020',
    'card_cvv' => '654',
]);

if ($update->error()) {
    echo "<p class='error'>{$update->error()->message}</p>";
} else {
    var_dump($update->response());
}
