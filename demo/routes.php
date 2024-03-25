<?php 

// return [
//   '/' => 'controllers/index.php',
//   '/about' => 'controllers/about.php',
//   '/notes' => 'controllers/notes/index.php',
//   '/note' => 'controllers/notes/show.php',
//   '/contact' => 'controllers/contact.php',
//   '/notes/create' => 'controllers/notes/create.php',
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/store', 'controllers/notes/store.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->patch('/notes', 'controllers/notes/update.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');
?>  