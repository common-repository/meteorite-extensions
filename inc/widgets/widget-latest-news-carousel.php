<?php
/**
 * Latest News Carousel Widget
 *
 * @package Meteorite
 */

class Meteorite_Latest_News_Carousel extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_latest_news_carousel_widget', 'description' => __( 'Show the latest news from your blog in a carousel.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Latest News Carousel', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_latest_news_carousel';
    }
	
	function form($instance) {
		$title     		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number			 = isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category  		 = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$itemsLarge		 = isset( $instance['itemsLarge'] ) ? esc_attr( $instance['itemsLarge'] ) : '3';
		$itemsMedium	 = isset( $instance['itemsMedium'] ) ? esc_attr( $instance['itemsMedium'] ) : '2';
		$itemsSmall		 = isset( $instance['itemsSmall'] ) ? esc_attr( $instance['itemsSmall'] ) : '1';
		$enable_autoplay = isset( $instance['enable_autoplay'] ) ? esc_attr( $instance['enable_autoplay'] ) : 'On';
		$autoplay		 = isset( $instance['autoplay'] ) ? absint( $instance['autoplay'] ) : 10000;
		$pagination		 = isset( $instance['pagination'] ) ? esc_attr( $instance['pagination'] ) : 'Show';
		$hide_date		 = isset( $instance['hide_date'] ) ? esc_attr( $instance['hide_date'] ) : 'No';
		$hide_excerpt	 = isset( $instance['hide_excerpt'] ) ? esc_attr( $instance['hide_excerpt'] ) : 'No';
		$animation 		 = isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Title', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter a widget title.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Number', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Number of articles to show (-1 shows all of them).', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" class="form-control tt-form-element" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Category', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the slug for your category or leave empty to show posts from all categories.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Number Of Items', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose how many articles should be shown on the same time.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Desktop', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsLarge'); ?>" id="<?php echo $this->get_field_id('itemsLarge'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsLarge == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Tablet', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsMedium'); ?>" id="<?php echo $this->get_field_id('itemsMedium'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsMedium == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Mobile', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsSmall'); ?>" id="<?php echo $this->get_field_id('itemsSmall'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsSmall == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Customize', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Customize this carousel', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Autoplay', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('enable_autoplay'); ?>" id="<?php echo $this->get_field_id('enable_autoplay'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('On', 'Off');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $enable_autoplay == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Enter an autoplay time [ms].', 'meteorite_extensions' ); ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" type="text" value="<?php echo $autoplay; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Pagination', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('pagination'); ?>" id="<?php echo $this->get_field_id('pagination'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Show', 'Hide');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $pagination == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Hide Date', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_date'); ?>" id="<?php echo $this->get_field_id('hide_date'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_date == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Hide Excerpt', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_excerpt'); ?>" id="<?php echo $this->get_field_id('hide_excerpt'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_excerpt == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Animation', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose an animation type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('animation'); ?>" id="<?php echo $this->get_field_id('animation'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Fade In', 'Fade In Up', 'Fade In Left', 'Fade In Right', 'Fade In One By One', 'Fade In Up One By One');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $animation == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			 = sanitize_text_field($new_instance['title']);
		$instance['number'] 		 = intval($new_instance['number']);
		$instance['category'] 		 = sanitize_text_field($new_instance['category']);
		$instance['itemsLarge'] 	 = sanitize_text_field($new_instance['itemsLarge']);
		$instance['itemsMedium'] 	 = sanitize_text_field($new_instance['itemsMedium']);
		$instance['itemsSmall'] 	 = sanitize_text_field($new_instance['itemsSmall']);
		$instance['enable_autoplay'] = sanitize_text_field($new_instance['enable_autoplay']);
		$instance['autoplay'] 		 = absint($new_instance['autoplay']);
		$instance['pagination'] 	 = sanitize_text_field($new_instance['pagination']);
		$instance['hide_date']	 	 = sanitize_text_field($new_instance['hide_date']);
		$instance['hide_excerpt']	 = sanitize_text_field($new_instance['hide_excerpt']);
		$instance['animation'] 		 = sanitize_text_field($new_instance['animation']);

		return $instance;
	}
		
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 			 = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$category 		 = isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$number 		 = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number )
			$number = -1;
		$itemsLarge		 = isset( $instance['itemsLarge'] ) ? esc_attr($instance['itemsLarge']) : '3';
		$itemsMedium	 = isset( $instance['itemsMedium'] ) ? esc_attr($instance['itemsMedium']) : '2';
		$itemsSmall		 = isset( $instance['itemsSmall'] ) ? esc_attr($instance['itemsSmall']) : '1';
		$enable_autoplay = isset( $instance['enable_autoplay'] ) ? esc_attr($instance['enable_autoplay']) : 'On';
		$autoplay 		 = ( ! empty( $instance['autoplay'] ) ) ? absint( $instance['autoplay'] ) : 10000;
		$pagination		 = isset( $instance['pagination'] ) ? esc_attr($instance['pagination']) : 'Show';
		$hide_date		 = isset( $instance['hide_date'] ) ? esc_attr($instance['hide_date']) : 'No';
		$hide_excerpt	 = isset( $instance['hide_excerpt'] ) ? esc_attr($instance['hide_excerpt']) : 'No';
		$animation 		 = isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$latest_news_carousel = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'posts_per_page'	  => $number,
			'category_name'		  => $category,
			'ignore_sticky_posts' => 1
		) );

		$data_autoplay = 'false';
		if ( $enable_autoplay == 'On' ) :
			$data_autoplay = absint( $autoplay );
		endif;

		$data_pagination = 'false';
		if ( $pagination == 'Show' ) :
			$data_pagination = 'true';
		endif;

		$animation_class = '';
		$animation_single = '';
		if ( $animation == 'Fade In' ) {
			$animation_class = 'fade-in';
		} elseif ( $animation == 'Fade In Up' ) {
			$animation_class = 'fade-in-up';
		} elseif ( $animation == 'Fade In Left' ) {
			$animation_class = 'fade-in-left';
		} elseif ( $animation == 'Fade In Right' ) {
			$animation_class = 'fade-in-right';
		} elseif ( $animation == 'Fade In One By One' ) {
			$animation_single = 'fade-in-single';
		} elseif ( $animation == 'Fade In Up One By One' ) {
			$animation_single = 'fade-in-up-single';
		}

		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; }

		if ( $latest_news_carousel->have_posts() ) :
		?>

		<div class="meteorite-latest-news-carousel row carousel owl-carousel <?php echo $animation_class . $animation_single ?>" data-items-large="<?php echo $itemsLarge; ?>" data-items-medium="<?php echo $itemsMedium; ?>" data-items-small="<?php echo $itemsSmall; ?>" data-autoplay="<?php echo $data_autoplay; ?>" data-pagination="<?php echo $data_pagination; ?>">
			<?php while ( $latest_news_carousel->have_posts() ) : $latest_news_carousel->the_post(); ?>
			<div class="blog-post meteorite-item">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('meteorite-medium-thumb'); ?>
					</a>
				</div>
			<?php endif; ?>

			<?php  if ( function_exists('meteorite_get_time_string') && $hide_date == 'No' ) :
				meteorite_get_time_string();
			endif; ?>

			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				
			<?php if ( $hide_excerpt == 'No' ) : ?>
				<div class="entry-summary"><?php the_excerpt(); ?></div>
			<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>

		<?php
		wp_reset_postdata();

		elseif ( current_user_can('edit_theme_options') ) :
		echo '<div class="no-posts-notice">' . sprintf( _x('Info: you have not created any posts.Create some posts %s', 'no posts info', 'meteorite_extensions'),
			'<a href="' . esc_url( get_admin_url('', 'edit.php') ) . '">' . __('here', 'meteorite_extensions') . '</a>'
		) . '</div>';
		endif;
		echo $args['after_widget'];

	}
	
}