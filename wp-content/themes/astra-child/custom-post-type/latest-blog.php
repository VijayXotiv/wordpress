<?php
if( !function_exists('custom_latest_blog_callback') )
{
    add_shortcode('home_latest_blog_web', 'custom_latest_blog_callback');
    
    function custom_latest_blog_callback()
    {

        ob_start();

        $args = array(
            'post_type'   => 'post',
            'posts_per_page' => 4,
            'post_status'   => 'publish',
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
				ob_start();
				the_time(get_option('date_format'));
				$time = ob_get_clean();
				  ob_start();
				  the_author();
				  $author_name = ob_get_clean();
				 ob_start();
				  the_content();
				  $content = ob_get_clean();
				
					foreach ((get_the_category()) as $category) {
					$post_category = $category->name;
				  }
            ?>
                <div class="xt-col-6 xt-col-md-12 mb-4">
                    <div class="blog-sec rpc_bg">
                        <div class="latest-image"><img class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="<?php echo $tTitle; ?>" />
						</div>
                        <div class="blog-sec-inner">
                         <div class="rpc_title pb-1"><?php echo $tTitle; ?></div>
							<div class="rpc_desc"><?php 
                                          $str = substr(strip_tags($content), 0, 75)."(...)";
				                          echo $str;
                                      ?></div>
						<a href="<?php echo $tPermaLink; ?>" class="hom_single_blog">Read more<i class="fa fa-arrow-right ps-2 fs-16"></i></a>	
                    </div>
                </div>
            </div>
            <?php
            	$i++;
                endwhile;
                wp_reset_postdata();            
			}
            wp_reset_query();
            ?>
<?php
        return ob_get_clean();
    }
}