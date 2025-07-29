<?php
// Bật báo cáo lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define root directory
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', __DIR__);
}

// Start session chỉ khi chưa được bắt đầu
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Load configuration
require_once ROOT_DIR . '/config/config.php';
require_once ROOT_DIR . '/config/database.php';

// Debug: Log start
debugLog("======= APP START =======");
debugLog("REQUEST: " . $_SERVER['REQUEST_URI']);

// Enhanced autoloader
spl_autoload_register(function ($className) {
    $directories = [
        ROOT_DIR . '/models/',
        ROOT_DIR . '/controllers/',
        ROOT_DIR . '/config/'
    ];

    $fileExtensions = ['.php', '.class.php'];

    foreach ($directories as $directory) {
        foreach ($fileExtensions as $extension) {
            $file = $directory . $className . $extension;
            if (file_exists($file)) {
                debugLog("Autoloading: $file");
                require_once $file;
                return;
            }
        }
    }

    debugLog("Autoload failed for class: $className");
});

// Simple routing
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Map controllers
$controllers = [
    'home' => 'HomeController',
    'products' => 'ProductController',
    'users' => 'UserController',
    'cart' => 'CartController',
    'orders' => 'OrderController',
    'admin' => 'AdminController'
];

ob_start();

try {
    debugLog("Routing: controller=$controller, action=$action");

    if (isset($controllers[$controller])) {
        $controllerClass = $controllers[$controller];
        debugLog("Controller class: $controllerClass");

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();
            debugLog("Controller instance created");

            if (method_exists($controllerInstance, $action)) {
                debugLog("Calling action: $action");
                $controllerInstance->$action();
            } else {
                throw new Exception("Action '$action' not found in controller $controllerClass");
            }
        } else {
            throw new Exception("Controller class $controllerClass not found");
        }
    } else {
        throw new Exception("Controller '$controller' not defined");
    }
} catch (Throwable $e) {
    // Clear buffer
    ob_clean();

    // Log error
    debugLog("ERROR: " . $e->getMessage());
    debugLog("TRACE: " . $e->getTraceAsString());

    // Show detailed error
    http_response_code(500);
    echo "<h1>Application Error</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";

    if (DEBUG_MODE) {
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    } else {
        echo "<p>Please contact administrator for assistance.</p>";
    }
}

$content = ob_get_clean();
echo $content;

// Debug: Log end
debugLog("======= APP END =======");
