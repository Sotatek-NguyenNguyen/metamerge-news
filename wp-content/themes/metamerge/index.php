

	<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>



    <article id="body_home">
      <section class="section_header_news">
        <div class="container-fluid">
          <h2 class="title_header_news">News and Partnerships</h2>
          <button type="button" class="btn btn_sign_up" data-bs-toggle="modal" data-bs-target="#modalSignUp">
            Sign up for our newsletter
          </button>
        </div>
      </section>
      <div class="clearfix"></div>
      <section class="section_list_news">
        <div class="container-fluid">
          
		  <?php wp_nav_menu( array( 
			  	'theme_location' 	=> 'meta-menu', 
		  		'container_class'	=> '',
				'menu_class'       	=> 'nav nav_news',
        		'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				   ) ); ?>

          <div class="clearfix"></div>

          <div class="list_news">
<?php
	// $args = array(
	// );
	// $result = new WP_Query( $args );

?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $categories = get_the_category(); ?>

			<div class="card_new">
				<h2 class="name_categories"><a href="<?php echo esc_url( get_category_link(end($categories)->term_id)); ?>"><?php echo end($categories)->name; ?></a></h2>
				<div class="date_card"> <?php the_time(get_option( 'date_format' )) ?> </div>
				<a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>" class="img_new">
					<?php the_post_thumbnail(); ?> 
				</a>
				<div class="sub_new">
					<h3 class="title_new"><a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>   
					</a></h3>
					<div class="des_new">
					<?php echo wp_trim_words(get_the_excerpt(), 15); ?> 
					</div>
				</div>
			</div>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

          </div>

          <div class="clearfix clearfix-50"></div>

			<div class="text-center">
			<?php 
			if (  $wp_query->max_num_pages > 1 )
				echo '<button type="button" class="misha_loadmore btn btn_see_more btn_loadmore">See more</button>'; // you can use <a> as well
			?>
			</div>

          <div class="clearfix clearfix-35"></div>
        </div>
      </section>

      
    
<?php
get_footer();