<?php
require_once __DIR__ . '/../layout/header.php';
?>
<!-- Hero Section -->
<section class="hero-section">
    <img src="https://cdn.pixabay.com/photo/2016/09/07/11/37/fashion-1623092_1280.jpg" alt="LUXURY Collection" />
    <div class="hero-content">
        <h1 class="hero-title">COMING SOON....2025</h1>
        <p class="hero-subtitle">Discover the finest collection of fashion items</p>
        <a href="?controller=products" class="btn">Shop Now</a>
    </div>
</section>

<!-- Shop By Category -->
<section class="category-section">
    <h2 class="section-title">Shop By Category</h2>
    <div class="category-grid">
        <?php if (isset($categories) && !empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <a href="?controller=products&category_id=<?php echo $category['id']; ?>">
                        <?php if (!empty($category['image'])): ?>
                            <img src="<?php echo $category['image']; ?>" alt="<?php echo htmlspecialchars($category['name']); ?>" />
                        <?php else: ?>
                            <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/shirt-3064334_1280.jpg" alt="<?php echo htmlspecialchars($category['name']); ?>" />
                        <?php endif; ?>
                        <div class="category-overlay">
                            <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Default categories when none exist -->
            <div class="category-card">
                <a href="?controller=products">
                    <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/shirt-3064334_1280.jpg" alt="Shirts" />
                    <div class="category-overlay">
                        <h3>Shirts</h3>
                    </div>
                </a>
            </div>
            <div class="category-card">
                <a href="?controller=products">
                    <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/pants-3064335_1280.jpg" alt="Pants" />
                    <div class="category-overlay">
                        <h3>Pants</h3>
                    </div>
                </a>
            </div>
            <div class="category-card">
                <a href="?controller=products">
                    <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/jacket-3064336_1280.jpg" alt="Jackets" />
                    <div class="category-overlay">
                        <h3>Jackets</h3>
                    </div>
                </a>
            </div>
            <div class="category-card">
                <a href="?controller=products">
                    <img src="https://cdn.pixabay.com/photo/2015/11/07/11/46/jeans-1031332_1280.jpg" alt="Denim" />
                    <div class="category-overlay">
                        <h3>Denim</h3>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Timeless Staples -->
<section class="timeless-staples">
    <h2 class="section-title">Timeless Staples</h2>
</section>

<!-- FEATURED COLLECTION / CLASSIC ARRIVALS -->
<section class="featured-collection">
    <!-- Hàng trên: Sản phẩm bên trái + Banner bên phải -->
    <div class="collection-top">
        <!-- Cột trái: 2 sản phẩm (xếp dọc) -->
        <div class="collection-products-left">
            <?php if (isset($featuredProducts) && !empty($featuredProducts)): ?>
                <?php $count = 0; ?>
                <?php foreach ($featuredProducts as $product): ?>
                    <?php if ($count >= 2) break; ?>
                    <div class="product-card">
                        <span class="product-badge">NEW</span>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                        <?php else: ?>
                            <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/denim-jacket-3064337_1280.jpg" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                        <?php endif; ?>
                        <div class="product-info">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                        <div class="product-overlay">
                            <a href="?controller=products&action=show&id=<?php echo $product['id']; ?>" class="btn">View</a>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default products when none exist -->
                <div class="product-card">
                    <span class="product-badge">NEW</span>
                    <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/denim-jacket-3064337_1280.jpg" alt="Blue Denim Jacket" />
                    <div class="product-info">
                        <h3 class="product-title">Blue Denim Jacket</h3>
                        <p class="product-price">$120.00</p>
                    </div>
                </div>
                <div class="product-card">
                    <span class="product-badge">NEW</span>
                    <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/t-shirt-3064338_1280.jpg" alt="White Cotton T-shirt" />
                    <div class="product-info">
                        <h3 class="product-title">White Cotton T-shirt</h3>
                        <p class="product-price">$90.00</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- Cột phải: Banner lớn -->
        <div class="collection-banner-right">
            <img src="https://cdn.pixabay.com/photo/2016/09/07/11/37/fashion-1623093_1280.jpg" alt="Shop Our Latest Classic Arrivals" />
            <div class="banner-overlay">
                <h2>Shop our Latest Classic Arrivals</h2>
                <a href="?controller=products" class="btn">Shop Now</a>
            </div>
        </div>
    </div>

    <!-- Hàng giữa: 2 sản phẩm ngang -->
    <div class="collection-middle">
        <?php if (isset($featuredProducts) && count($featuredProducts) > 2): ?>
            <?php $count = 0; ?>
            <?php foreach (array_slice($featuredProducts, 2, 2) as $product): ?>
                <div class="product-card">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                    <?php else: ?>
                        <img src="https://cdn.pixabay.com/photo/2015/11/07/11/46/trousers-1031332_1280.jpg" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                    <?php endif; ?>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                    </div>
                    <div class="product-overlay">
                        <a href="?controller=products&action=show&id=<?php echo $product['id']; ?>" class="btn">View</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Default products -->
            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2015/11/07/11/46/trousers-1031332_1280.jpg" alt="Oxford Grey Pants" />
                <div class="product-info">
                    <h3 class="product-title">Oxford Grey Pants</h3>
                    <p class="product-price">$110.00</p>
                </div>
            </div>
            <div class="product-card">
                <img src="https://cdn.pixabay.com/photo/2018/01/21/16/12/blazer-3064340_1280.jpg" alt="Brown Wool Blazer" />
                <div class="product-info">
                    <h3 class="product-title">Brown Wool Blazer</h3>
                    <p class="product-price">$230.00</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Đoạn giới thiệu -->
    <div class="collection-intro">
        <h2>LUXURY's Way</h2>
        <h3>Redefining Comfortable Classics</h3>
        <p>
            This is the space to introduce the Spring season. Briefly describe
            the type of service offered and highlight key features. The
            combination of various design elements can lure new and returning
            shoppers by the fall of an extreme effect, it means...
        </p>
    </div>

    <!-- Banner dưới -->
    <div class="collection-bottom-banner">
        <img src="https://cdn.pixabay.com/photo/2017/08/07/00/37/people-2598023_1280.jpg" alt="Be stylish" />
        <div class="banner-overlay">
            <h2>Be stylish, not tacky!</h2>
            <a href="?controller=products" class="btn">Shop Now</a>
        </div>
    </div>
</section>
<?php
require_once __DIR__ . '/../layout/footer.php';
?>