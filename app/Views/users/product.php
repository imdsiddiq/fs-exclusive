


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-4 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <?php
                        $productImages = $this->db->table("productimages")->orderBy("featured DESC")->where("productID", $product["id"])->get()->getResultArray();
                        foreach ($productImages as $key => $productImage): ?>
                        <div class="carousel-item <?php echo $key == 0 ? 'active' : ''; ?>">
                            <a href="javascript:;"><img class="w-100 h-100" src="<?php echo site_url('uploads/products/'.$productImage['name']); ?>" alt="<?php echo $product["name"]; ?>"></a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-8 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $product["name"]; ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <?php if ($product["isDiscount"] == 1): ?>
                <h3 class="font-weight-semi-bold mb-4"><?php echo $sessCountry["currency"] . $product["discountedPrice"]; ?><del class="text-muted ml-2"><?php echo $sessCountry["currency"] . $product["price"]; ?></del></h3>
                <?php else: ?>
                <h3 class="font-weight-semi-bold mb-4"><?php echo $sessCountry["currency"] . $product["price"]; ?></h3>
                <?php endif; ?>
                <p class="mb-4"><?php echo $product["shortDescription"]; ?></p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3">
                        <div class="input-group-btn">
                            <button class="btn btn-primary text-white btn-minus" >
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" name="productQty" value="1" readonly>
                        <div class="input-group-btn">
                            <button class="btn btn-primary text-white btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" id="addToCart" class="btn btn-primary text-white px-3" data-productid="<?php echo $product["id"]; ?>"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex">
                    <?php
                    if ($this->session->get("logged_in") == true):
                    $checkWishlist = $this->db->table("wishlist")->where(array("userId" => $this->session->get("userId"), "productId" => $product["id"]))->get()->getResultArray();
                    if (count($checkWishlist) > 0): ?>
                    <a href="javascript:;" id="toggleWishlist" data-productid="<?php echo $product['id']; ?>" data-loggedin="<?php echo isset($_SESSION['logged_in']) ? $_SESSION["logged_in"] : '0'; ?>" style="color: #d2b482;"><p class="text-decoration-underline font-weight-medium">Added to Wishlist</p></a>
                    <?php else: ?>
                    <a href="javascript:;" id="toggleWishlist" data-productid="<?php echo $product['id']; ?>" data-loggedin="<?php echo isset($_SESSION['logged_in']) ? $_SESSION["logged_in"] : '0'; ?>"><p class="text-dark text-decoration-underline font-weight-medium">Add to Wishlist</p></a>
                    <?php endif; ?>
                    <?php else: ?>
                    <a href="javascript:;" id="toggleWishlist"><p class="text-dark text-decoration-underline font-weight-medium">Add to Wishlist</p></a>
                    <?php endif; ?>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" target="_blank" rel="nofollow" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='<?php echo current_url(); ?> + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="https://twitter.com/home?status=<?php echo current_url(); ?>" target="_blank" rel="nofollow" title="Tweet on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text='<?php echo current_url(); ?> + encodeURIComponent(document.title) + ':%20' + encodeURIComponent(document.URL)); return false;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo current_url(); ?>" target="_blank" rel="nofollow" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo current_url(); ?> + encodeURIComponent(document.URL)); return false;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="https://wa.me/?text=<?php echo current_url(); ?>" target="_blank" rel="nofollow" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#description-tab">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#reviews-tab">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description-tab">
                        <h4 class="mb-3">Product Description</h4>
                        <?php echo json_decode($product["description"]); ?>
                    </div>
                    <div class="tab-pane fade" id="reviews-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="<?php echo site_url('assets/img/user.jpg'); ?>" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary text-white px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <script type="text/javascript">
        function copyToClipboard(element) {
            var text = $(this).data("link");
            alert(text);
            $("body").append(text);
            text.val($(element).text()).select();
            document.execCommand("copy");
            text.remove();
        }
    </script>