<div class="wp-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Giới thiệu <span class="sr-only">(current)</span></a>
                        </li>
                        <?php foreach($data['cates_5'] as $cate_5){ ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="home/cate/<?php  echo $cate_5['cate_id']?>"><?php echo $cate_5['cate_name']?> <span class="sr-only">(current)</span></a>
                            <?php if($cate_5['cate_des']!='' || $cate_5['cate_img']!=''){ ?>
                            <div class="wp-menu">
                                <div class="container">
                                    <div class="col-6 " style="min-width:500px">
                                        <p><?php echo $cate_5['cate_des'] ?></p>
                                    </div>
                                    <div class="col-6" style="min-width:500px; margin: 20px 0">
                                        <a href="" class="product">
                                            <img style=" 100%" src="public/backend/uploads/cate/<?php echo $cate_5['cate_img']?>" alt="">
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php  } ?>
                        </li>
                        <?php }?>
                        <li class="nav-item dropdown">
                            
                            <?php if(isset($data['cates_read_more'])){ ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Xem thêm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach($data['cates_read_more'] as $cates_read_more){?>
                                <a class="dropdown-item" href="home/cate/<?php  echo $cates_read_more['cate_id']?>"><?php echo $cates_read_more['cate_name'] ?></a>
                                <?php } ?>
                            </div>
                            <?php  } ?>
                        </li>
                    </ul>
                </div>
              </nav>
        </div> 
    </div>