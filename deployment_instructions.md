
# Hướng Dẫn Deploy Lên InfinityFree

## Bước 1: Chuẩn Bị
1. Đăng ký tài khoản tại https://infinityfree.net
2. Tạo website mới và ghi nhớ thông tin:
   - Domain name
   - MySQL hostname
   - Database name
   - Username
   - Password

## Bước 2: Cấu Hình Database
Cập nhật file `config/config.php` với thông tin từ InfinityFree:

```php
define('DB_HOST', 'your_mysql_hostname'); // Ví dụ: sql123.infinityfree.com
define('DB_NAME', 'your_database_name'); // Ví dụ: if0_12345678_luxury_fashion
define('DB_USER', 'your_username'); // Ví dụ: if0_12345678
define('DB_PASS', 'your_password'); // Password từ InfinityFree
```

Cập nhật APP_URL:
```php
define('APP_URL', 'https://your-domain.infinityfreeapp.com');
```

## Bước 3: Upload Files
1. Sử dụng File Manager từ Control Panel
2. Upload tất cả files vào thư mục `htdocs`
3. Đảm bảo cấu trúc thư mục:
   ```
   htdocs/
   ├── assets/
   ├── config/
   ├── controllers/
   ├── models/
   ├── uploads/
   ├── views/
   ├── index.php
   └── database.sql
   ```

## Bước 4: Import Database
1. Truy cập phpMyAdmin từ Control Panel
2. Chọn database của bạn
3. Click tab "Import"
4. Upload file `database.sql`
5. Click "Go" để import

## Bước 5: Kiểm Tra Permissions
1. Đặt quyền 755 cho thư mục `uploads/`
2. Đặt quyền 755 cho thư mục `uploads/products/`
3. Đặt quyền 755 cho thư mục `uploads/profiles/`

## Bước 6: Test Website
1. Truy cập domain của bạn
2. Test đăng nhập admin: admin@luxury-fashion.com / admin123
3. Test đăng nhập user: john@example.com / user123
4. Test upload ảnh và các chức năng khác

## Lưu Ý Quan Trọng
- InfinityFree có giới hạn về CPU và bandwidth
- Tắt error reporting trong production (set error_reporting(0))
- Backup database thường xuyên
- Kiểm tra log files để debug lỗi

## Troubleshooting
- Nếu lỗi database: Kiểm tra lại thông tin kết nối
- Nếu lỗi upload: Kiểm tra permissions thư mục uploads
- Nếu lỗi 500: Kiểm tra error logs trong Control Panel
