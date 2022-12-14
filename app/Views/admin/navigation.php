
    
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="javascript:;">
                <img class="img-fluid" src="<?php echo site_url('uploads/logo.png'); ?>" alt="logo" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <?php
            $uri = current_url(true);
            $uri = explode("/", $uri);
            ?>
            <ul>
                <li class="nav-item <?php echo $uri[4] == 'dashboard' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/dashboard'); ?>">
                        <span class="icon">
                            <i class="lni lni-bar-chart"></i>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'categories' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/categories'); ?>">
                        <span class="icon">
                            <i class="lni lni-folder"></i>
                        </span>
                        <span class="text">Categories</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'products' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/products'); ?>">
                        <span class="icon">
                            <i class="lni lni-wheelbarrow"></i>
                        </span>
                        <span class="text">Products</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'orders' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/orders'); ?>">
                        <span class="icon">
                            <i class="lni lni-printer"></i>
                        </span>
                        <span class="text">Orders</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'reviews' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/reviews'); ?>">
                        <span class="icon">
                            <i class="lni lni-radio-button"></i>
                        </span>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'requirements' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/requirements'); ?>">
                        <span class="icon">
                            <i class="lni lni-check-box"></i>
                        </span>
                        <span class="text">Requirements</span>
                    </a>
                </li>
                <li class="nav-item <?php echo $uri[4] == 'users' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/users'); ?>">
                        <span class="icon">
                            <i class="lni lni-user"></i>
                        </span>
                        <span class="text">Users</span>
                    </a>
                </li>
                <li class="nav-item nav-item-has-children <?php echo $uri[4] == 'logo' || $uri[4] == 'social-links' || $uri[4] == 'testimonials' || $uri[4] == 'countries' || $uri[4] == 'privacy-policy' || $uri[4] == 'terms' || $uri[4] == 'refund-policy' ? 'active' : ''; ?>">
                    <a href="javascript:;" class="<?php echo $uri[4] == 'logo' || $uri[4] == 'social-links' || $uri[4] == 'testimonials' || $uri[4] == 'countries' || $uri[4] == 'privacy-policy' || $uri[4] == 'terms' || $uri[4] == 'refund-policy' ? '' : 'collapsed'; ?>" data-bs-toggle="collapse" data-bs-target="#settings_menu" aria-controls="settings_menu" aria-expanded="<?php echo $uri[4] == 'logo' || $uri[4] == 'social-links' || $uri[4] == 'testimonials' || $uri[4] == 'countries' || $uri[4] == 'privacy-policy' || $uri[4] == 'terms' || $uri[4] == 'refund-policy' ? 'true' : 'false'; ?>" aria-label="Toggle navigation">
                        <span class="icon">
                            <i class="lni lni-cog"></i>
                        </span>
                        <span class="text">Settings</span>
                    </a>
                    <ul id="settings_menu" class="collapse dropdown-nav <?php echo $uri[4] == 'logo' || $uri[4] == 'social-links' || $uri[4] == 'testimonials' || $uri[4] == 'countries' || $uri[4] == 'privacy-policy' || $uri[4] == 'terms' || $uri[4] == 'refund-policy' ? 'show' : ''; ?>">
                        <li>
                            <a href="<?php echo site_url('admin/logo'); ?>" class="<?php echo $uri[4] == 'logo' ? 'active' : ''; ?>"> Logo</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/social-links'); ?>" class="<?php echo $uri[4] == 'social-links' ? 'active' : ''; ?>"> Social Links</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/testimonials'); ?>" class="<?php echo $uri[4] == 'testimonials' ? 'active' : ''; ?>"> Testimonials</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/countries'); ?>" class="<?php echo $uri[4] == 'countries' ? 'active' : ''; ?>"> Countries</a>
                        </li>
                        <!-- <li>
                            <a href="<?php // echo site_url('admin/countries'); ?>" class="<?php // echo $uri[4] == 'countries' ? 'active' : ''; ?>"> Website</a>
                        </li>
                        <li>
                            <a href="<?php // echo site_url('admin/countries'); ?>" class="<?php // echo $uri[4] == 'countries' ? 'active' : ''; ?>"> Banner</a>
                        </li> -->
                        <li>
                            <a href="<?php echo site_url('admin/privacy-policy'); ?>" class="<?php echo $uri[4] == 'privacy-policy' ? 'active' : ''; ?>"> Privacy Policy</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/terms'); ?>" class="<?php echo $uri[4] == 'terms' ? 'active' : ''; ?>"> Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/refund-policy'); ?>" class="<?php echo $uri[4] == 'refund-policy' ? 'active' : ''; ?>"> Refund Policy</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->