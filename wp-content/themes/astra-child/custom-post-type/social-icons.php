<?php
if( !function_exists('custom_social_icon') )
{
    
    function custom_social_icon()
    {
    return '<div class="social_icon"><a href="https://www.facebook.com/Mones-Law-Group-PC-157602330937199/?ref=py_c" target="_blank"><img src="/wp-content/uploads/2024/02/fb_icon-legal.svg" alt=""></a></div>';
    //<a target="_blank" href="#"><img src="/wp-content/uploads/2024/02/linkedin_icon-legal.svg" alt=""></a>
    }
    add_shortcode('custom_social_icon_section', 'custom_social_icon');
}
?>