<?php
if( !function_exists('custom_star') )
{
    
    function custom_star()
    {
   
       return '<div><i class="fa fa-star primary-color"></i><i class="fa fa-star primary-color"></i> <i class="fa fa-star primary-color"></i> <i class="fa fa-star primary-color"></i><i class="fa fa-star primary-color"></i></div>';
    }
    add_shortcode('custom_star_section', 'custom_star');
}
?>