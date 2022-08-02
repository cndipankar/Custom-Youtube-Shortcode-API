<?php
add_action( 'admin_menu', 'yvs_main_menu' );
function yvs_main_menu(){
    add_options_page(
        'Youtube Shortcode',
        'Youtube Shortcode',
        'manage_options',
        'cys_menu',
        'cys_settings_page'
    );
}

function cys_settings_page(){
    ?>
    <h4>Youtube Video Shortcode</h2>
    <h6>Shortcode: <strong>[<?php echo CYS_YT_SHORTCODE;?>]</strong></h4>
    <p>Sample Shortcode</p>
    <code>[<?php echo CYS_YT_SHORTCODE;?> video_id="Pkh8UtuejGw" iframe_id="home_page_vdo" thumb_src="https://staging-aromatru.kinsta.cloud/wp-content/uploads/2022/07/Rectangle-2403-1.jpg" main_class="main_container" container_class="sub_container" height="500" width="700"  title="This is a Title" description="This is a sample description. Description goes here"]</code>
    <p>List of attributes and definition</p>
    <ul class="list-group">
        <li class="list-group-item"><strong>`video_id`</strong>&nbsp;&nbsp;The Video ID of youtube. EX. Pkh8UtuejGw</li>
        <li class="list-group-item"><strong>`thumb_src`</strong>&nbsp;&nbsp;Thumbnail image over the Video, Should be a absolute src.</li>
        <li class="list-group-item"><strong>`thumb_class`</strong>&nbsp;&nbsp;A class will be on Thumbnail img tag</li>
        <li class="list-group-item"><strong>`main_class`</strong>&nbsp;&nbsp;A class would be on main div element</li>
        <li class="list-group-item"><strong>`container_class`</strong>&nbsp;&nbsp;A class would be on container div element after the main div element</li>
        <li class="list-group-item"><strong>`height`</strong>&nbsp;&nbsp;The height of IFRAME</li>
        <li class="list-group-item"><strong>`width`</strong>&nbsp;&nbsp;The width of IFRAME</li>
        <li class="list-group-item"><strong>`iframe_id`</strong>&nbsp;&nbsp;The ID of IFRAME</li>
        <li class="list-group-item"><strong>`title`</strong>&nbsp;&nbsp;The text title over the thumbnmail</li>
        <li class="list-group-item"><strong>`description`</strong>&nbsp;&nbsp;The description over the thumbnail</li>
    </ul>
    <?php
}
