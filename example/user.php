<?php

/** Require files */
require __DIR__ . '/assets/config.php';
require __DIR__ . '/../vendor/autoload.php';

/** Dependencies */
use MatheusBastos\CafeApi\Me;

$me = new Me('localhost/fsphp/api/', 'nome@servidor.com', 'senhasecreta');

/** Get data user */
echo '<h1>Me</h1>';

$user = $me->me();
var_dump($user->response());

/** Update data user */
echo '<h1>Update</h1>';

$update = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

if ($update && !empty($update['user'])) {
    $user->update($update);

    if ($user->error()) {
        echo "<p class='error'>{$user->error()->message}</p>";
    } else {
        var_dump($user->response()->user);
    }
}

$user_data = $user->me()->response()->user;
?>
    <form action="" method="post">
        <input type="hidden" name="user" value="true"/>
        <input type="text" name="first_name" value="<?= $user_data->first_name ?? null ?>"/>
        <input type="text" name="last_name" value="<?= $user_data->last_name ?? null ?>"/>
        <input type="text" name="genre" value="<?= $user_data->genre ?? null ?>"/>
        <input type="text" name="date_birth" value="<?= $user_data->date_birth ?? null ?>"/>
        <input type="text" name="document" value="<?= $user_data->document ?? null ?>"/>
        <button>Atualizar</button>
    </form>
<?php
/** Upload a new photo for user */
echo '<h1>Photo</h1>';

$photo = $_FILES['photo'] ?? null;

if ($photo) {
    $user->photo($photo);

    if ($user->error()) {
        echo "<p class='error'>{$user->error()->message}</p>";
    } else {
        var_dump($user->me()->response()->user->photo);
    }
}
?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photo"/>
        <button>Enviar</button>
    </form>
