<?php

if (!$argv[0]) {
  die("Access denied");
}

require_once "./db-controller.php";

echo "\r\n";

$db = new DBController($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);

switch($argv[1]) {
  case 'new':
    newUser($db, $argv[2], $argv[3]);
    break;
  case 'reset':
    resetPass($db, $argv[2]);
    break;
}

echo "\r\n\r\n";
$db->close();

function newUser($db, $user, $pass) {
  $res = $db->newUser($user, $pass);
  echo $res;
}

function resetPass($db, $user) {
  $res = $db->resetPassword($user);
  echo $res;
}