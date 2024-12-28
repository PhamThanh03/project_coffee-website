<?php
    $listProducts = $ProductModel->select_products_limit(8);

    $listCategories = $CategoryModel->select_categories_limit(8);

    $product_limit_3 = $ProductModel->select_products_limit(3);
    $product_order_by = $ProductModel->select_products_order_by(3, 'ASC');
?>

<!-- Banner Section Begin -->
<section class="container my-4">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="border-radius: 10px;">
                        <div class="carousel-item active" >
                            <img class="img-fluid" src="public/img/banner/banner-1.PNG" alt="Image">
                            
                        </div>  
                        <div class="carousel-item" >
                            <img class="img-fluid" src="public/img/banner/banner-2.PNG" alt="Image">
                            
                        </div>  
                        <div class="carousel-item " >
                            <img class="img-fluid" src="public/img/banner/banner-3.PNG" alt="Image">
                            
                        </div>  
                        <div class="carousel-item " >
                            <img class="img-fluid" src="public/img/banner/banner-4.PNG" alt="Image">
                            
                        </div>  
                            
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                    
                </div>
            </div>
            
        </div>
    </section>
    <!-- Banner Section End -->


<!-- Product Section Begin -->
<section class="product spad" style="background-color: #F4F4F9;">

    <!-- CATER -->
    <section class="container cate-home" style="background-color: #ffffff; border-radius: 10px;">    

        <div class="section-title pt-2" style="margin-bottom: 30px;">
            <h4>Danh mục sản phẩm</h4>
        </div>
        
        <div class="row g-1 mb-4 mt-2 pb-4">
            <?php foreach ($listCategories as $value) {
                extract($value);
                $link = 'index.php?url=danh-muc-san-pham&id=' .$category_id;
            ?>
            <div class="col-lg-2 col-md-3 col-sm-6 text-center p-1 cate-gory">
                <a href="<?=$link?>"><img style="width: 165px; height: 165px;" src="upload/<?=$image?>" alt=""></a>
                <div class="mt-2">
                    <a class="cate-name text-dark" href="<?=$link?>"><?=$name?></a>
                </div>
            </div>
            
            <?php
            }
            ?>
            
            
        </div>
    </section>
    <!-- CATE END-->


    <div class="container" style="background-color: #ffffff; border-radius: 10px;">
        
        <div class="row pt-3">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Sản phẩm</h4>
                </div>
            </div>
            
        </div>
        <div class="row property__gallery">
            <?php foreach ($listProducts as $product) {
                extract($product);

                $discount_percentage = $ProductModel->discount_percentage($price, $sale_price);
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix sach-1">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="upload/<?=$image?>">
                        <!-- <div class="label sale">Sale</div> -->
                        <!-- <div class="label_right sale">-<?=$discount_percentage?></div> -->
                        <ul class="product__hover">
                            <li><a href="upload/<?=$image?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li>
                                <a href="index.php?url=chitietsanpham&id_sp=<?=$product_id?>&id_dm=<?=$category_id?>">
                                <span class="icon_search_alt"></span>
                                </a>
                            </li>
                            
                            
                            <li>
                                <?php if(isset($_SESSION['user'])) {?>
                                <form action="index.php?url=gio-hang" method="post">
                                    <input value="<?=$product_id?>" type="hidden" name="product_id">
                                    <input value="<?=$_SESSION['user']['id']?>" type="hidden" name="user_id">
                                    <input value="<?=$name?>" type="hidden" name="name">
                                    <input value="<?=$image?>"type="hidden" name="image">
                                    <input value="<?=$price?>" type="hidden" name="price">
                                    <input value="1" type="hidden" name="product_quantity">
                                    <input value="<?=$image?>" type="hidden" name="image">

                                    <button type="submit" name="add_to_cart" id="toastr-success-top-right">
                                        <a href="#" ><span class="icon_bag_alt"></span></a>
                                    </button>
                                </form>
                                <?php }else{?>
                                    <button type="submit" onclick="alert('Vui lòng dăng nhập để thực hiện chức năng');" name="add_to_cart" id="toastr-success-top-right">
                                        <a href="dang-nhap" ><span class="icon_bag_alt"></span></a>
                                    </button>
                                <?php }?>
                            </li>
                            
                        </ul>
                        
                    </div>
                    <div class="product__item__text">
                        <h6 class="text-truncate-1"><a href="index.php?url=chitietsanpham&id_sp=<?=$product_id?>&id_dm=<?=$category_id?>"><?=$name?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?=number_format($price) ."₫"?> </div>
                    </div>
                </div>
            </div>

            <?php 
            } 
            ?>

            
            
            <div class="col-lg-12 text-center mb-4">
                <a href="index.php?url=cua-hang" class="btn btn-outline-primary">Xem tất cả</a>
            </div>
        </div>
        
    </div>


    

</section>





