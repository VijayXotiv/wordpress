<?php /**
 * Template Name:Blog Page 
 */ ?>
<?php
get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type'   => 'post',
  'post_status'   => 'publish',
  'orderby'       =>  'date',
  'order'         =>  'desc',
  'posts_per_page' => get_option('post_per_page'),
  'tax_query' => array(
    array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => 'blog',
    ),
  ),
  'paged' => $paged
  );
$query = new WP_Query( $args ); 

$i = 0;
$htmlData="";
$feat_image_url="";
if ( $query->have_posts() ){
    while ( $query->have_posts() ){ 
      $query->the_post();  
      global $dynamic_featured_image;    
      
      if (has_post_thumbnail() ) {
        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
      } 
      ob_start();
      the_permalink();
      $tPermaLink = ob_get_clean();
      
      ob_start();
      the_author();
      $tAuthor = ob_get_clean();

      ob_start();
      the_time( get_option( 'date_format' ) );
      $tTime= ob_get_clean();
      $tTime = date("M d, Y", strtotime($tTime));

      ob_start();
      the_title();
      $tTitle= ob_get_clean();
	  $margin="";
	  if( $i > 2) { 
		$margin="mt-5";
	  }
      $htmlData.='<div class="xt-col-4 xt-col-md-12 mt-md-5 '.$margin.'">
      <div class="card h-100 pb-5">
        <div class="card-image"> <img src="'.$feat_image_url.'" class="card-img-top img-fluid" alt="..."></div>
        <div class="card-body">
          <p class="card-title">'.$tTitle.'</p>
          <p class="card-date"><span class="text-left"><i class="fa fa-clock-o pe-1"></i>'.$tTime.'</span</p>
          <p class="card-text">'.substr(strip_tags($post->post_content), 0, 100).'...</p>
          <a href="'.$tPermaLink.'" class="card-btn">Read More<i class="fa fa-angle-right ps-2"></i></a>
        </div>
      </div>
    </div>
      ';
      $i++;
    }
  }
?>
<section class="xt-full-container news-section px-sm-0">
		<div class="xt-container px-sm-0">
			<div class="xt-row">
      <?php echo $htmlData; ?> 
			</div>
        <div class="blog-btn mt-5 pb-5">
		  <nav class="pagination"> 	
			  <?php
			  $total_pages = $query->max_num_pages;
 
				if ($total_pages > 1){
					$current_page = max(1, get_query_var('paged'));

					echo paginate_links(array(
						'base' => get_pagenum_link(1) . '%_%',
						'format' => '/page/%#%',
						'current' => $current_page,
						'total' => $total_pages,
					));
				}
			  ?>
                <?php //previous_posts_link( '<< Prev', $query->max_num_pages ); ?>
                <?php //next_posts_link( 'Next >>', $query->max_num_pages ); ?>
            </nav>
        </div>
		</div>
</section> 
<?php   wp_reset_query();  ?>  
<?php  get_footer(); ?>