<?php
if( !function_exists('custom_latest_blog_mobile_callback') )
{
    add_shortcode('home_latest_blog_mobile', 'custom_latest_blog_mobile_callback');
    
    function custom_latest_blog_mobile_callback()
    {

        ob_start();

        $args = array(
            'post_type'   => 'post',
            'post_status'   => 'publish',
            'posts_per_page' => 6,
            'orderby'       =>  'date',
            'order'         =>  'desc',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'blog',
                ),
            ),
        );

        $the_latest_blog = new WP_Query( $args );
?>
            <?php
            if( $the_latest_blog->have_posts() )
            {
            	$i = 0;
                while ( $the_latest_blog->have_posts() ) : $the_latest_blog->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                ob_start();
                the_title();
                $tTitle= ob_get_clean();

                ob_start();
                the_permalink();
                $tPermaLink = ob_get_clean();
            ?>
          		 <div class="item single-mobile-blog">
                    <div class="post-left-content">
                        <a href="<?php echo $tPermaLink; ?>" class="single_blog<?php echo $i;?>">
                            <div class="post-card">
                                <div class="post-img">
                                    <img src="<?php echo $featured_img_url; ?>" class="img-fluid" alt="<?php echo $tTitle; ?>">
                                </div>
                                <div class="post-content">
                                <div class="post-card-desc"><p class="post-desc"><span class="text-left by-post"><?php echo get_the_author_meta( 'display_name' );?></span><span class="text-right by-date"><?php echo date("d M Y", strtotime(get_the_date())); ?></span></p></div>
                                <div class="post-card-title"><?php echo $tTitle; ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
				</div>           
            <?php
            	$i++;
                endwhile;
                wp_reset_postdata();           
             }
            wp_reset_query();
            ?>
        </div>
<?php
        return ob_get_clean();
    }
}
