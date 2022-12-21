<?php
// echo $_SERVER['REQUEST_URI']." ";

$request = parse_url($_SERVER['REQUEST_URI']);
switch ($request['path']) {
    case '/indiastock/index':
        require __DIR__ . '/main/index.php';
        break;
    case '/indiastock/':
        require __DIR__ . '/main/index.php';
        break;
    case "/indiastock";
        require __DIR__ . '/main/index.php';
        break;
    case "/indiastock/administrator";
        require __DIR__ . '/main/admin.php';
        break;
    case "/indiastock/about";
        require __DIR__ . '/main/about.php';
        break;
    case "/indiastock/login";
        require __DIR__ . '/main/login.php';
        break;
    case "/indiastock/adminlogin";
        require __DIR__ . '/main/adminlogin.php';
        break;
    case "/indiastock/checklogin";
        require __DIR__ . '/main/checklogin.php';
        break;
    case "/indiastock/transaction";
        require __DIR__ . '/main/viewtransaction.php';
        break;
    case "/indiastock/todaytransaction";
        require __DIR__ . '/main/viewtodaytransaction.php';
        break;
    case "/indiastock/users";
        require __DIR__ . '/main/viewusers.php';
        break;
    case "/indiastock/register";
        require __DIR__ . '/main/addusers.php';
        break;
    case "/indiastock/insertuser";
        require __DIR__ . '/main/insertuser.php';
        break;
    case "/indiastock/somepage";
        require __DIR__ . '/main/somepage.php';
        break;
    case "/indiastock/logout";
        require __DIR__ . '/main/logout.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/main/404.php';
        # code...
        break;
}
