<?php
// config.php
// Debug mode
if (!defined('DEBUG_MODE')) {
    define('DEBUG_MODE', true);
}

// Application configuration
define('APP_NAME', 'Luxury Fashion');
// Giao thức HTTPS và domain chính thức
define('APP_PROTOCOL', 'https');
define('APP_DOMAIN', 'luxuryfashion.kesug.com');
define('APP_URL', APP_PROTOCOL . '://' . APP_DOMAIN);
// BASE_URL sử dụng relative path từ webroot
define('BASE_URL', '/');

define('UPLOAD_PATH', 'uploads/products/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024);

// Database configuration
define('DB_HOST', 'sql101.infinityfree.com');
define('DB_NAME', 'if0_39557162_luxury_fashion');
define('DB_USER', 'if0_39557162');
define('DB_PASS', 'GOwRv4e2A3nOwDR');
define('DB_PORT', 3306);

// Error reporting
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', '1');
    ini_set('session.use_only_cookies', '1');
    // Chỉ set secure cookie khi dùng HTTPS
    ini_set('session.cookie_secure', APP_PROTOCOL === 'https' ? '1' : '0');
    session_start();
}

// Định nghĩa ROOT_DIR
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', dirname(__DIR__));
}

// Upload directories
define('UPLOAD_DIR', ROOT_DIR . '/uploads/');
define('PRODUCT_UPLOAD_DIR', UPLOAD_DIR . 'products/');
define('PROFILE_UPLOAD_DIR', UPLOAD_DIR . 'profiles/');

// Tạo thư mục nếu chưa tồn tại
foreach ([UPLOAD_DIR, PRODUCT_UPLOAD_DIR, PROFILE_UPLOAD_DIR] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Helpers
/**
 * Chuyển hướng
 * @param string $path URL hoặc path
 */
function redirect($path = '/')
{
    // Nếu path không phải full URL, thêm BASE_URL
    $url = preg_match('#^https?://#i', $path) ? $path : BASE_URL . ltrim($path, '/');
    header('Location: ' . $url);
    exit;
}

/**
 * Lọc dữ liệu đầu vào
 */
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

/**
 * Định dạng giá tiền
 */
function formatPrice($price)
{
    return '$' . number_format((float)$price, 2);
}

/**
 * Kiểm tra đăng nhập
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

/**
 * Kiểm tra quyền admin
 */
function isAdmin()
{
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

/**
 * Upload ảnh sản phẩm
 * @param array $file mảng $_FILES['...']
 * @param string|null $targetDir đường dẫn thư mục đích
 * @return string tên file mới
 * @throws Exception nếu lỗi
 */
function uploadImage(array $file, $targetDir = null)
{
    $targetDir = $targetDir ?: PRODUCT_UPLOAD_DIR;
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed, true)) {
        throw new Exception('Invalid file type');
    }
    if ($file['size'] > MAX_FILE_SIZE) {
        throw new Exception('File too large');
    }

    $filename = uniqid() . '.' . $ext;
    $path = rtrim($targetDir, '/') . DIRECTORY_SEPARATOR . $filename;
    if (move_uploaded_file($file['tmp_name'], $path)) {
        return $filename;
    }
    throw new Exception('Failed to upload file');
}

/**
 * Ghi log debug
 */
function debugLog($message)
{
    if (DEBUG_MODE) {
        error_log('[DEBUG] ' . print_r($message, true));
    }
}
