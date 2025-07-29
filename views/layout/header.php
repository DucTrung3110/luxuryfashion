<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'DCM Fashion'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <style>
        /* Fallback CSS để đảm bảo layout cơ bản */
        body {
            font-family: "Roboto", sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 80px;
            position: fixed;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .main-content {
            margin-left: 80px;
            min-height: 100vh;
        }

        .luxury-navbar {
            padding: 20px 40px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
        }
    </style>
</head>

<body>
    <!-- Sidebar dọc bên trái -->
    <aside class="sidebar">
        <div class="sidebar-text">DCM</div>
    </aside>

    <!-- Phần nội dung chính bên phải -->
    <main class="main-content">
        <!-- Header (logo + menu) -->
        <header class="luxury-navbar">
            <div class="luxury-brand">DCM</div>
            <nav class="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>/?controller=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>/?controller=products">Products</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <?php if (isAdmin()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_URL ?>/?controller=admin">
                                    <i class="fas fa-cog"></i> Admin
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>/?controller=orders&action=history">Orders</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link position-relative" href="<?= BASE_URL ?>/?controller=cart">
                            <i class="fas fa-shopping-bag"></i> Cart
                            <span class="cart-count" id="cartCount">
                                <?php
                                if (isLoggedIn()) {
                                    $cartModel = new Cart();
                                    echo $cartModel->getItemCount($_SESSION['user_id']);
                                } else {
                                    echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
                                }
                                ?>
                            </span>
                        </a>
                    </li>

                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/?controller=users&action=profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/?controller=users&action=logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>/?controller=users&action=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>/?controller=users&action=register">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <!-- Alert messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>