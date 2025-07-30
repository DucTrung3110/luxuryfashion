<?php
require_once __DIR__ . '/../layout/header.php';
?>
<!-- Hero Section -->
<section class="hero-section hero">
    <div class="hero-image">
        <img src="https://images.pexels.com/photos/833052/pexels-photo-833052.jpeg" alt="LUXURY Collection" />
    </div>
    <div class="hero-content hero-overlay">
        <h1 class="hero-title">COMING SOON....2025</h1>
        <p class="hero-subtitle">Discover the finest collection of fashion items</p>
        <a href="?controller=products" class="btn">Shop Now</a>
    </div>
</section>

<!-- Shop By Category -->
<section class="category-section shop-category">
    <h2 class="section-title">Shop By Category</h2>

    <?php
    // Danh sách 4 URL fallback, vị trí 0 → ảnh đầu, 1 → ảnh thứ hai…
    $fallbackList = [
        'https://images.pexels.com/photos/1460838/pexels-photo-1460838.jpeg',
        'https://images.pexels.com/photos/18530981/pexels-photo-18530981.jpeg',
        'https://images.pexels.com/photos/8365688/pexels-photo-8365688.jpeg',
        'https://images.pexels.com/photos/298852/pexels-photo-298852.jpeg',
    ];
    ?>

    <div class="category-grid category-list">
        <?php if (!empty($categories)): ?>
            <?php foreach (array_slice($categories, 0, 4) as $index => $category): ?>
                <?php
                // Nếu CSDL có image, dùng image đó, còn không lấy fallback theo vị trí
                if (!empty($category['image'])) {
                    $imgUrl = $category['image'];
                } else {
                    // Nếu index vượt ngoài fallbackList, dùng placeholder
                    $imgUrl = $fallbackList[$index] ?? 'https://via.placeholder.com/300x200';
                }
                ?>
                <div class="category-card category-item">
                    <a href="?controller=products&category_id=<?php echo $category['id']; ?>">
                        <img src="<?php echo $imgUrl; ?>"
                             alt="<?php echo htmlspecialchars($category['name']); ?>" />
                        <div class="category-overlay">
                            <h3 class="category-title">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Nếu không có categories, có thể hiển thị 4 fallback luôn -->
            <?php foreach ($fallbackList as $url): ?>
                <div class="category-card category-item">
                    <a href="?controller=products">
                        <img src="<?php echo $url; ?>" alt="Default category" />
                        <div class="category-overlay">
                            <h3 class="category-title">Coming Soon</h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>


<!-- Timeless Staples -->
<section class="timeless-staples">
    <h2 class="section-title">Timeless Staples</h2>
</section>

<!-- FEATURED COLLECTION / CLASSIC ARRIVALS -->
<section class="featured-collection">
  <?php
  // Fallback images cho 2 sản phẩm đầu
  $fallbackTop = [
      'https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg',
      'https://images.pexels.com/photos/3050943/pexels-photo-3050943.jpeg',
  ];
  // Fallback images cho 2 sản phẩm giữa
  $fallbackMid = [
      'https://images.pexels.com/photos/1805411/pexels-photo-1805411.jpeg',
      'https://images.pexels.com/photos/4132651/pexels-photo-4132651.jpeg',
  ];
  ?>

  <!-- Hàng trên: 2 sản phẩm dọc -->
  <div class="collection-top">
    <div class="collection-products-left">
      <?php foreach (array_slice($featuredProducts, 0, 2) as $i => $p): ?>
        <?php
        $img = !empty($p['image'])
            ? $p['image']
            : ($fallbackTop[$i] ?? 'https://via.placeholder.com/300x300');
        ?>
        <div class="card product-card border-0 shadow-sm mb-4">
          <div class="product-image">
            <span class="product-badge position-absolute">NEW</span>
            <img src="<?= $img ?>"
                 class="card-img-top"
                 alt="<?= htmlspecialchars($p['name']) ?>" />
          </div>
          <div class="card-body product-info text-center">
            <h5 class="card-title product-title mb-2"><?= htmlspecialchars($p['name']) ?></h5>
            <p class="card-text product-price fw-bold">$<?= number_format($p['price'], 2) ?></p>
            <a href="?controller=products&action=show&id=<?= $p['id'] ?>"
               class="btn btn-dark btn-sm">VIEW</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="collection-banner-right">
      <!-- giữ nguyên banner bên phải -->
      <img src="https://images.pexels.com/photos/18731381/pexels-photo-18731381.jpeg"
           alt="Shop Our Latest Classic Arrivals" />
      <div class="banner-overlay">
        <h2>Shop our Latest Classic Arrivals</h2>
        <a href="?controller=products" class="btn">Shop Now</a>
      </div>
    </div>
  </div>

  <!-- Hàng giữa: 2 sản phẩm ngang -->
  <div class="row row-cols-1 row-cols-md-2 g-4 collection-middle mb-5">
    <?php foreach (array_slice($featuredProducts, 2, 2) as $j => $p): ?>
      <?php
      $img2 = !empty($p['image'])
          ? $p['image']
          : ($fallbackMid[$j] ?? 'https://via.placeholder.com/300x300');
      ?>
      <div class="col">
        <div class="card product-card border-0 shadow-sm h-100">
          <div class="product-image">
            <img src="<?= $img2 ?>"
                 class="card-img-top"
                 alt="<?= htmlspecialchars($p['name']) ?>" />
          </div>
          <div class="card-body product-info text-center">
            <h5 class="card-title product-title mb-2"><?= htmlspecialchars($p['name']) ?></h5>
            <p class="card-text product-price fw-bold">$<?= number_format($p['price'], 2) ?></p>
            <a href="?controller=products&action=show&id=<?= $p['id'] ?>"
               class="btn btn-dark btn-sm">VIEW</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
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
        <img src="https://images.pexels.com/photos/1599941/pexels-photo-1599941.jpeg" alt="Be stylish" />
        <div class="banner-overlay">
            <h2>Be stylish, not tacky!</h2>
            <a href="?controller=products" class="btn">Shop Now</a>
        </div>
    </div>
</section>
<?php
require_once __DIR__ . '/../layout/footer.php';
?>
