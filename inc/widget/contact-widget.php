<?php
/**
 * Custom Widgets
 */

// Creating About widget 
class wpb_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
			'wpb_widget', 
			// Widget name will appear in UI
			__('Contct Us', 'vw-gardening-landscaping-pro'), 
			// Widget description
			array( 'description' => __( 'Widget for About Us section', 'vw-gardening-landscaping-pro' ), ) 
		);
	}
// Creating widget front-end
// This is where the action happens
	public function widget( $args, $instance ) {
		?>
		<div class="about_me">
		<?php
        
		//creating main title
		$custom_title = apply_filters( 'widget_custom_title', esc_html($instance['custom_title']) );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ($custom_title !='' ){?>	
			<h3 class="top_title">
				<?php echo esc_html($custom_title); ?>
			</h3>		
		<?php }
		//creating content
		$custom_content = apply_filters( 'widget_custom_content', esc_html($instance['custom_content']) );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $custom_content ) )?>
		<p class="message">
			<?php echo esc_textarea($custom_content);?>
		</p>
		<?php
		//creating Location
		$location = apply_filters( 'widget_location', esc_html($instance['location'] ));
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $location ) ) ?>
		<p class="location">
			<?php if($location != ''){ ?>
				<div class="contact-table">
					<div class="row">
						<div class="col-lg-2 col-sm-2 col-md-2">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-lg-10 col-sm-10 col-md-10">
							<p class="contact-text">
							<a href="http://maps.google.com/?q=1200 <?php echo esc_textarea($location); ?>" target="_blank"><?php echo esc_textarea($location); ?></a>								
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
		</p>
		<?php
		//creating Phone
		$phone = apply_filters( 'widget_phone', esc_html($instance['phone'] ));
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $phone ) ) ?>
		<p class="phone">
			<?php if($phone != ''){ ?>
				<div class="contact-table">
					<div class="row">
						<div class="col-lg-2 col-sm-2 col-md-2">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="col-lg-10 col-sm-10 col-md-10">
							<p class="contact-text"><a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</p>
		<?php
		//creating Email
		$email = apply_filters( 'widget_email', esc_html($instance['email'] ));
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $email ) ) ?>
		<p class="email">
			<?php if($email != ''){ ?>
				<div class="contact-table">
					<div class="row">
						<div class="col-lg-2 col-sm-2 col-md-2">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="col-lg-10 col-sm-10 col-md-10">
							<p class="contact-text"><a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a></p>
						</div>
					</div>
				</div>
			<?php } ?>		
		</p>
		<?php
		//creating Email
		$time = apply_filters( 'widget_time', esc_html($instance['time'] ));
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $time ) ) ?>
		<p class="time">
			<?php if($time != ''){ ?>
				<div class="contact-table">
					<div class="row">
						<div class="col-lg-2 col-sm-2 col-md-2">
							<i class="far fa-clock"></i>
						</div>
						<div class="col-lg-10 col-sm-10 col-md-10">
							<p class="contact-text"><?php echo esc_html($time); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>			
		</p>
		</div>
		<?php
		// This is where you run the code and display the output
		//echo __( 'Hello, World!', 'vw-gardening-landscaping-pro' );
		//echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance ) {
		//Main title
		if ( isset( $instance[ 'custom_title' ] ) ) {
			esc_html($custom_title = $instance[ 'custom_title' ]);
		}
		else {
			esc_html($custom_title = __( 'New title', 'vw-gardening-landscaping-pro' ));
		}		
		//custom_content
		if ( isset( $instance[ 'custom_content' ] ) ) {
			esc_html($custom_content = $instance[ 'custom_content' ]);
		}
		else {
			esc_html($custom_content = __( 'Custom Content', 'vw-gardening-landscaping-pro' ));
		}
		//Location
		if ( isset( $instance[ 'location' ] ) ) {
			esc_html($location = $instance[ 'location' ]);
		}
		else {
			esc_html($location = __( 'Location', 'vw-gardening-landscaping-pro' ));
		}
		//Phone
		if ( isset( $instance[ 'phone' ] ) ) {
			esc_html($phone = $instance[ 'phone' ]);
		}
		else {
			esc_html($phone = __( 'Phone', 'vw-gardening-landscaping-pro' ));
		}
		//Email
		if ( isset( $instance[ 'email' ] ) ) {
			esc_html($email = $instance[ 'email' ]);
		}

		else {
			esc_html($email = __( 'Email', 'vw-gardening-landscaping-pro' ));
		}	

		// Time

		if ( isset( $instance[ 'time' ] ) ) {
			esc_html($time = $instance[ 'time' ]);
		}
		
		else {
			esc_html($time = __( 'Time', 'vw-gardening-landscaping-pro' ));
		}		

		?>
			<!--Main title field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'custom_title' )); ?>"><?php esc_html_e( 'Title:', 'vw-gardening-landscaping-pro' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'custom_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_title' )); ?>" type="text" value="<?php echo esc_attr( $custom_title ); ?>" />
			</p>			
			<!--Message field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'custom_content' )); ?>"><?php esc_html_e( 'Content:','vw-gardening-landscaping-pro' ); ?></label> 
				<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'custom_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_content' )); ?>" type="text"  value="<?php echo esc_attr( $custom_content ); ?>" ><?php if (!empty($custom_content))  { echo esc_html($custom_content); } ?></textarea>
			</p>
			<!--Location field-->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'location' )); ?>"><?php esc_html_e( 'Location:', 'vw-gardening-landscaping-pro'); ?></label> 
				<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'location' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'location' )); ?>" type="text" value="<?php echo esc_attr( $location ); ?>" ><?php if (!empty($location)){ echo esc_html($location); } ?></textarea>
			</p>
			<!--Phone field-->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"><?php esc_html_e( 'Phone:', 'vw-gardening-landscaping-pro'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
			</p>
			<!--Email field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"><?php esc_html_e( 'Email:', 'vw-gardening-landscaping-pro'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
			</p>
			<!-- Time  -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'time' )); ?>"><?php esc_html_e( 'Time:', 'vw-gardening-landscaping-pro'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'time' )); ?>" type="text" value="<?php echo esc_attr( $time ); ?>" />
			</p>	 
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		//title instance
		$instance['custom_title'] = (!empty( $new_instance['custom_title']))? strip_tags( $new_instance['custom_title'] ) : '';
		//location instance
		$instance['location'] = (! empty( $new_instance['location']))? strip_tags( $new_instance['location'] ) : '';
		//content instance
		$instance['custom_content'] = ( ! empty( $new_instance['custom_content']))? strip_tags( $new_instance['custom_content'] ) : '';
		//phone instance
		$instance['phone'] = (! empty( $new_instance['phone']))? strip_tags( $new_instance['phone'] ) : '';
		//email instance
		$instance['email'] = (! empty( $new_instance['email']))? strip_tags( $new_instance['email'] ) : '';

		//email instance
		$instance['time'] = (! empty( $new_instance['time']))? strip_tags( $new_instance['time'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
	// Register and load the widget
	function wpb_load_widget() {
		register_widget( 'wpb_widget' );
	}
add_action( 'widgets_init', 'wpb_load_widget' );