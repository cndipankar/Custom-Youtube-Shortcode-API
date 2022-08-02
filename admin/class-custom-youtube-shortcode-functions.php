<?php
add_shortcode( CYS_YT_SHORTCODE , 'cysf_shortcode_handler' );
function cysf_shortcode_handler( $atts ) {
    ob_start(); 
    global $post;
    $attributes = shortcode_atts( array(
        'video_id' => '',
        'thumb_src'  =>  '',
        'thumb_class' => '',
        'main_class' => '',
        'container_class' => '',
        'height' => '',
        'width' => '',
        'iframe_id' => '',
        'title' => '',
        'description' => ''
    ), $atts );
    
    $height = $attributes['height'] ? $attributes['height'] : '390';
    $width = $attributes['width'] ? $attributes['width'] : '640';
    $thumb_class = $attributes['thumb_class'] ? $attributes['thumb_class'] : 'cys_yt_vdo_thumb';
    $iframe_id = $attributes['iframe_id'] ? $attributes['iframe_id'] : 'cys_'.uniqid();
    $thumbnail = $attributes['thumb_src'] ? $attributes['thumb_src'] : CYS_URL . 'public/img/thumbnail.png';
    ?>

    <div class="cysa-lightbox <?php echo $attributes['main_class']?>">
        <div class="lightbox-container <?php echo $attributes['container_class']?>">  
        <div class="lightbox-content">
            <div class="video-container ar-video-container hytPlayerWrap1-<?php echo $attributes['video_id']?>">
                <div id="<?php echo $iframe_id;?>" data-height="<?php echo $height;?>" data-width="<?php echo $width;?>" data-video="<?php echo $attributes['video_id']?>" class="cys_eachframe ytvdo_<?php echo $post->ID.'_'.$iframe_id;?>"></div>
                <?php if($thumbnail){?>
                <img src="<?php echo $thumbnail;?>" alt="" id="ytyhumbnail-<?php echo $attributes['video_id']?>" class="<?php echo $thumb_class;?>">
                <!-- <div class="playbutton" id="ytr_playbtn_<?php //echo $attributes['video_id'];?>">
                    <a href="javascript:void(0)" class="home_video_btn" id="yt-play-button-home-<?php //echo $attributes['video_id'];?>"><i class="icon-play" style="font-size:1.5em;"></i></a>
                </div> -->
                <div class="innerwrap" id="innerwrap-<?php echo $attributes['video_id'];?>">
                    <a href="javascript:void(0)" class="home_video_btn" id="yt-play-button-home-<?php echo $attributes['video_id'];?>"><i class="icon-play" style="font-size:1.5em;"></i></a>
                    <?php if( !empty($attributes['title']) || !empty($attributes['description'])) {?>
                    <div class="innercontent">
                        <h3><?php echo $attributes['title'];?></h3>
                        <p><?php echo $attributes['description'];?></p>
                    </div>
                    <?php } ?>
                </div>  
                <?php }?>
            </div>        
        </div>
        </div>
    </div>
   <?php 
    return ob_get_clean();
}
