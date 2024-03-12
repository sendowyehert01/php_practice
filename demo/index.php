<?php 

require "Database.php";
require "functions.php";
//require "router.php";
$config = require("config.php");

$db = new Database($config['database'], $config['account']['username'], $config['account']['password']);

$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id={$id}";

$post = $db->query($query)->fetchAll();

dd($post);
