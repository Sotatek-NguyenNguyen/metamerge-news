<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<section class="section_contact">
        <div class="container-fluid">
          <form autocomplete="off" method="post" action="/" class="row g-3 needs-validation form_contact" novalidate>
            <div class="text-center">
              <h3 class="title_contact">CONTACT US</h3>
              <h2 class="des_title_contact">Media Contact</h2>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control input_form_contact" id="name" name="name" placeholder="Name *" required>
              <div class="invalid-feedback">
                Please provide a valid name.
              </div>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control input_form_contact" id="email" name="email" placeholder="Email *" required>
              <div class="invalid-feedback">
                Please provide a valid email.
              </div>
            </div>
            <div class="col-md-6">
              <input type="number" class="form-control input_form_contact" id="mobile_phone" name="mobile_phone" placeholder="Mobile Phone *" required>
              <div class="invalid-feedback">
                Please provide a valid Mobile Phone.
              </div>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control input_form_contact" id="country" name="country" placeholder="Country *" required>
              <div class="invalid-feedback">
                Please provide a valid Country.
              </div>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control input_form_contact" id="company" name="company" placeholder="Company *" required>
              <div class="invalid-feedback">
                Please provide a valid Company.
              </div>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control input_form_contact" id="position" name="position" placeholder="Position *" required>
              <div class="invalid-feedback">
                Please provide a valid Position.
              </div>
            </div>
            <div class="col-md-12">
              <textarea id="media_inquiries" class="form-control textarea_form_contact" name="media_inquiries" placeholder="Media Inquiries.... *" style="height:200px" required></textarea>
              <div class="invalid-feedback">
                Please provide a valid Media Inquiries.
              </div>
            </div>
            
            <div class="col-12 text-center">
              <button type="button" class="btn btn-primary btn_see_more btn_contact">Submit</button>
            </div>
          </form>
        </div>
      </section>
      
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


		<div class="clearfix"></div>

<footer id="footer"></footer>

<!-- Modal Sign up -->
<div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal_dialog_sign_up" role="document">
	<div class="modal-content">
	  
	  <!-- Modal Header -->
	  <div class="modal-header modal_header_sign_up">
		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	  </div>

	  <div class="modal-body">
		<form autocomplete="off" method="post" action="" class="g-3 needs-validation form_sign_up" novalidate>
		  <h4 class="modal_title">Sign up</h4>
		  <div class="des_modal_title">for our newsletter</div>
		  <div class="sub_modal_title">
			Join our newsletter list to <a href="#">get the latest announcements and updates</a> directly to your inbox.
			Don’t worry, you can unsubscribe anytime.
		  </div>
		  
		  <div class="clearfix"></div>
		  
		  <div class="group_input_modl">
			<input type="email" class="form-control input_form_sign_up" id="your_email" name="your_email" placeholder="Your email here *" required>
			<div class="invalid-feedback">
			  Please provide a valid Position.
			</div>
		  </div>

		  <div class="clearfix clearfix-35"></div>
		  <div class="text-center"><button type="submit" class="btn btn-primary btn_see_more" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalSignUpSuccess">Submit</button></div>
		</form>
	  </div>
	</div>
  </div>
</div>

<!-- Modal Modal Sign Up Success-->
<div class="modal fade" id="modalSignUpSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal_dialog_sign_up_success" role="document">
	<div class="modal-content">
	  
	  <!-- Modal Header -->
	  <div class="modal-header modal_header_sign_up">
		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	  </div>

	  <div class="modal-body modal_body_sign_up_success">
		<div class="content_sign_up_success" novalidate>
		  <h4 class="modal_title">Thank you</h4>
		  <div class="des_modal_title">for signing up</div>
		  <div class="sub_modal_title">
			We will keep you updated.
		  </div>
		  <div class="clearfix clearfix-35"></div>
		  <div class="text-center">
			<button type="submit" class="btn btn-primary btn_see_more" data-bs-dismiss="modal">
			  <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/icon-return.svg" alt="">
			  Return
			</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>


<script>

  (function () {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	// var forms = document.querySelectorAll('.needs-validation')

	// // Loop over them and prevent submission
	// Array.prototype.slice.call(forms)
	//   .forEach(function (form) {
	// 	form.addEventListener('submit', function (event) {
	// 	  if (!form.checkValidity()) {
	// 		event.preventDefault()
	// 		event.stopPropagation()
	// 	  }

	// 	  form.classList.add('was-validated')
	// 	}, false)
	//   })
  })()
</script>

</body>
</html>
