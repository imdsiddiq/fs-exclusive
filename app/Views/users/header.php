
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row top-bar py-2 px-xl-5">
            <div class="col-4 col-lg-6">
                <div class="d-inline-flex align-items-center">
                    <a class="text-light px-2" href="javascript:;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-light px-2" href="javascript:;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-light px-2" href="javascript:;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="col-8 col-lg-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <select id="changeCountry" class="mx-auto pl-2" style="border: none; border-radius: 5px;">
                        <?php
                        $countries = $this->db->table("country")->where("status", 1)->get()->getResultArray();
                        foreach ($countries as $country): ?>
                            <option value="<?php echo $country['id'] ?>" <?php echo ($this->session->get("countryId") == $country["id"] ? "selected" : "") ?>><?php echo $country["code"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($this->session->get("logged_in")): ?>
                    <div class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle text-light py-0" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->get("userName"); ?></a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php if ($this->session->get("userRole") === "1"): ?>
                            <a href="<?php echo site_url("admin/dashboard"); ?>" class="dropdown-item">Dashboard</a>
                            <?php endif; ?>
                            <a href="<?php echo site_url('wishlist'); ?>" class="dropdown-item">Wishlist</a>
                            <a href="<?php echo site_url('orders'); ?>" class="dropdown-item">Orders</a>
                            <a href="<?php echo site_url("logout"); ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                    <?php else: ?>
                    <a class="text-light px-2 ml-3 show-modal" href="javascript:;" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fa-user"></i> Login
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <div class="container-fluid py-2 px-xl-5">
        <div class="row justify-content-between">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12 col-md-4 d-flex justify-content-center justify-content-lg-start">
                        <a href="<?php echo site_url(); ?>"><img class="img-fluid py-3" src="<?php echo site_url('uploads/logo.png'); ?>" width="120px"></a>
                    </div>
                    <div class="col-md-8 d-md-flex justify-content-center my-auto">
                        <form method="GET" action="<?php echo site_url('search'); ?>" class="searchform order-lg-last">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control pl-3" name="keyword" placeholder="Search" style="height: auto;">
                                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex my-auto justify-content-center justify-content-lg-end py-3">
                <?php
                if ($this->session->get("logged_in")):
                $cartCount = $this->db->table("cart")->where(array("userId" => $this->session->get("userId"), "country" => $this->session->get("countryId")))->countAllResults();
                $wishlistCount = $this->db->table("wishlist")->where(array("userId" => $this->session->get("userId"), "country" => $this->session->get("countryId")))->countAllResults();
                ?>
                <a href="<?php echo site_url('wishlist'); ?>" class="btn border mr-1">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge"><?php echo $wishlistCount; ?></span>
                </a>
                <a href="<?php echo site_url('cart'); ?>" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $cartCount; ?></span>
                </a>
                <?php else: ?>
                <a href="javascript:;" class="btn border mr-1">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <?php
                if (isset($_SESSION['cartItems']) && $_SESSION['cartItems'] != NULL) {
                    $sessCartCount = count($_SESSION['cartItems']);
                } else {
                    $sessCartCount = 0;
                }
                ?>
                <a href="<?php echo site_url('cart'); ?>" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $sessCartCount; ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
        
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light bg-dark" id="ftco-navbar">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler text-white" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span> Menu
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto">
                    <a href="<?php echo site_url(); ?>" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php
                            $categories = $this->db->table("category")->where(array("parent" => NULL, "status" => 1, "country" => $this->session->get("countryId")))->get()->getResultArray();
                            foreach ($categories as $key => $category): ?>
                            <a href="<?php echo site_url('category/' . $category['slug'] . '/' . $category['id']); ?>" class="dropdown-item"><?php echo $category["name"]; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a href="<?php echo site_url('contact'); ?>" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </div>
    </nav>