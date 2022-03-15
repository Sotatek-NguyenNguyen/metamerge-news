

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
	<section class="header_single">
        <div class="container-fluid">
          <h2 class="title_header_news">News and Partnerships</h2>
          <button type="button" class="btn btn_sign_up" data-bs-toggle="modal" data-bs-target="#modalSignUp">
            Sign up for our newsletter
          </button>
        </div>
      </section>


      <div class="clearfix"></div>

      <section class="section_content_news_detail">
        <div class="container-fluid">

			<div class="swap_new_detail">
				
            <div class="left_new_detail">
			
				<?php while ( have_posts() ) : the_post(); ?>
				<?php 
				$categories = get_the_category();
				?>
				
					<h2 class="categories_detail">
						<a href="/">News</a> > 
						<a href="<?php echo esc_url( get_category_link(end($categories)->term_id)); ?>">
						<?php echo end($categories)->name; ?></a>
					</h2>
					<div class="clearfix clearfix-5"></div>
					<div class="date_categories_detail"> <?php the_time(get_option( 'date_format' )) ?></div>
					<div class="clearfix clearfix-5"></div>
					<h3 class="title_detail"><?php the_title(); ?></h3>
					<div class="clearfix clearfix-30"></div>
					<div class="body_text_news">
						<?php the_post_thumbnail('cstm_name', array( 'class' => 'w_100' )); ?>
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
            </div>

            <div class="right_new_detail">
              <h2 class="title_right_detail">RECENT POSTS</h2>
              <div class="list_news_detail">
			  	<?php 
				// the query
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
				)); 
				?>	
				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="card_news_detail">
					<a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>" class="img_new">
					<?php the_post_thumbnail(); ?> 
				</a>
					<div class="clearfix clearfix-20"></div>
					<h3 class="title_new">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?></a>
					</h3>
					<div class="clearfix clearfix-5"></div>
					<div class="des_new"><?php echo wp_trim_words(get_the_excerpt(), 14); ?></div>
					</div>
					
					
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<p><?php __('No News'); ?></p>
				<?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="clearfix"></div>
      
    </article>

<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal_dialog_sign_up" role="document">
	<div class="modal-content">
	  
	  <!-- Modal Header -->
	  <div class="modal-header modal_header_sign_up">
		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	  </div>

	  <div class="modal-body">
		<form autocomplete="off" method="post" action="" class="g-3 needs-validation form_sign_up" novalidate>
		  <h4 class="modal_title">Thank You!</h4>
		  <div class="des_modal_title">we will contact you</div>
		  
		  <div class="clearfix clearfix-35"></div>
		  <div class="text-center"><button type="button" data-bs-dismiss="modal" class="btn btn-primary btn_see_more" data-bs-dismiss="modal" data-bs-toggle="modal" >Close</button></div>
		</form>
	  </div>
	</div>
  </div>
</div>

<script type="text/javascript">
	var pagedGlobal = 2;
	$(document).ready(function(){
		$('.btn_loadmore').click(function(){
			$.ajax({
				type : "post", //Phương thức truyền post hoặc get
				dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
				url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
				data : {
					action: "loadpost", //Tên action
					paged: pagedGlobal
				},
				context: this,
				beforeSend: function(){
					//Làm gì đó trước khi gửi dữ liệu vào xử lý
				},
				success: function(response) {
					//Làm gì đó khi dữ liệu đã được xử lý
					if(response.success) {
						$('.list_news').append(response.data);
						
						pagedGlobal ++;
					}
					else {
						console.error('Error');
					}
				},
				error: function( jqXHR, textStatus, errorThrown ){
					console.log( 'The following error occured: ' + textStatus, errorThrown );
				}
			})
			return false;
		});

		//form 
		$('.btn_contact').on('click',function(){
			//validate: //TODO
			//get value;
			var formData = {
				name: $('#name').val(),
				email: $('#email').val(),
				mobile_phone: $('#mobile_phone').val(),
				country: $('#country').val(),
				company: $('#company').val(),
				position: $('#position').val(),
				media_inquiries: $('#media_inquiries').val(),
			}; 
			
			$.ajax({
				type : "post", 
				dataType : "json", 
				url : '<?php echo admin_url('admin-ajax.php');?>', 
				data : {
					action: "contact", 
					formData: formData
				},
				context: this,
				beforeSend: function(){
					
				},
				success: function(response) {					
					if(response.success) {
						$('#modalContact').modal('show');
					}
					else {
						console.error('Error');
					}
				},
				error: function( jqXHR, textStatus, errorThrown ){
					console.log( 'The following error occured: ' + textStatus, errorThrown );
				}
			})
			return false;

		});
	});

</script>
    
<?php
get_footer();