<?php get_header(); 
while (have_posts()) : the_post(); 
  ob_start();
  the_permalink();
  $permalink = ob_get_clean();

  ob_start();
  the_author();
  $author_name = ob_get_clean();

  ob_start();
  the_time(get_option('date_format'));
  $time = ob_get_clean();

  ob_start();
  the_content();
  $content = ob_get_clean();

  ob_start();
  the_title();
  $title = ob_get_clean();

  foreach ((get_the_category()) as $category) {
    $post_category = $category->name;
  }

  if (has_post_thumbnail()) {
    $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID, 'large'));
  }
?>
<section class="xt-full-container news-section" id="genesis-content">
		<div class="xt-container px-sm-0">
			<div class="xt-row">
				<div class="xt-col-12 mt-4 px-sm-0">
					<div class="post-image">
					<img src="<?= $thumbnail;?>" class="img-fluid w-100">
					</div>
					<div class="user-info w-100 float-left my-3">
						<span class="float-left fs-18 fw-500">By: <?= $author_name;?></span>
						<span class="float-right fs-18 fw-500"><?= $time;?></span>
					</div>
					<div class="user-data w-100 float-left">
						<h1>
							<?= $title;?>
						</h1>
						<span class="primary-color fs-18 fw-500 mb-4 d-block"><?= $post_category;?></span>
					</div>
					<div class="single-post-content w-100 float-left">
					  <?= $content;?>
					</div>
					
					<div class="related-post mt-5 pt-5 pb-5">
						<div class="para-heading-2">Related Articles</div>
						<div class="xt-row">
						<?php
							global $post;
							if (is_single()) {
								$related_posts = '';
								$categories = get_the_category();
								foreach ($categories as $category) {
								$rel_cat[] = $category->cat_ID;
								}
								$args = array(
								'post__not_in' => array($post->ID),
								'posts_per_page' => 3,
								'orderby' => 'rand'
								);
								$query = new wp_query($args);
								if ($query->have_posts()) {
								while ($query->have_posts()) : $query->the_post();
									$related_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID, 'large'));
									$related_title =  get_the_title();
									$related_link = get_permalink();
									echo '<div class="xt-col-4 xt-col-md-6 xt-col-xs-12 mt-xs-5 mt-md-5"><a href="'.$related_link.'">
									<div class="card h-100">
									  <div class="related-img card-img"><img src="'.$related_image.'" class="card-img-top img-fluid" alt="..."></div>
									  <div class="card-body">
										<p class="card-title">'.$related_title.'</p>
									  </div>
									</div>
								  </a></div>';
								endwhile;
								wp_reset_postdata();
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php 
endwhile;
get_footer(); ?>