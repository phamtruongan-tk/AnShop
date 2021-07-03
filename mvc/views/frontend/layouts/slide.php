<div class="slide-area container-fluid px-0">
        <div class="slide">
            <?php  foreach($data['slides'] as $slide){?>
            <div>
                <a href="<?php echo $slide['slide_link'] ?>">
                    <img src="public/backend/uploads/slide/<?php echo $slide['slide_img'] ?>" alt="" class="img-fuild">
                    <p><?php echo $slide['slide_des'] ?></p>
                </a>
            </div>
            <?php  } ?>
        </div>
    </div>