<?php
/**
 * Create widgets for the post Grids Tags builder.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Implement widgets Goblog Free Grids Tags
 *
 * @since 1.0
 */
class Goblog_Free_Grids_Tags extends WP_Widget {



	/**
	 * Sets up a new Goblog Free Grids Tags widget instance.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		$box = array(
			'classname'                   => 'goblog_grids_tags',
			'description'                 => esc_html__( 'This widget only applies to the Front Page section.', 'goblog-free' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'goblog_grids_tags', esc_html__( 'Goblog Posts Builder (By: Tags)', 'goblog-free' ), $box );
	}

	/**
	 * Outputs the content for the current Goblog Free Grids Tags widget instance.
	 *
	 * @since 1.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Goblog Free Grids Tags widget instance.
	 */
	public function widget( $args, $instance ) {
		$title    = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
		$number   = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 4;
		$category = ! empty( $instance['category'] ) ? sanitize_key( $instance['category'] ) : false;
		$author   = ! empty( $instance['author'] ) ? sanitize_key( $instance['author'] ) : false;
		$comment  = ! empty( $instance['comment'] ) ? sanitize_key( $instance['comment'] ) : false;
		$date     = ! empty( $instance['date'] ) ? sanitize_key( $instance['date'] ) : false;
		$pagi     = ! empty( $instance['pagi'] ) ? sanitize_key( $instance['pagi'] ) : false;
		$post     = ! empty( $instance['post'] ) ? sanitize_key( $instance['post'] ) : 'post3';
		$posttags = ! empty( $instance['posttags'] ) ? esc_html( $instance['posttags'] ) : '';
		$layout   = ! empty( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';
		$paged    = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$post = array(
			'post__not_in'   => get_option( 'sticky_posts' ),
			'tag'            => $posttags,
			'posts_per_page' => $number,
			'post_type'      => 'post',
			'paged'          => $paged,
		);

		$posting = new WP_Query( $post );

		echo $args['before_widget'];

		if ( $posting->have_posts() ) :

			if ( $layout === 'layout1' ) {
				echo '<div class="grids grids1">';
			} elseif ( $layout === 'layout2' ) {
				echo '<div class="grids grids2">';
			} elseif ( $layout === 'layout3' ) {
				echo '<div class="grids grids3">';
			} else {
				echo '<div class="grids grids1">';
			}

			if ( ! empty( $instance['title'] ) ) : ?>
				<div class="name-post builder-grids-tags">
					<h2 class="title-home">
						<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
					</h2>
				</div>
			<?php endif; ?>

			<!-- Start While -->
			<?php 
			while ( $posting->have_posts() ) :
				$posting->the_post(); 
				?>

				<div class="box-content">
					<div class="content">
						<div class="categoris">
							<?php 
							if ( $category ) {
								goblog_free_display_category();
							} 
							?>
						</div>
						<?php goblog_free_display_title_post(); ?>
						<div class="box-content-info">
							<?php 
							if ( $author ) {
								goblog_free_display_author_post();
							} 
							?>
							<?php 
							if ( $comment ) {
								goblog_free_display_comment_numb();
							} 
							?>
							<?php 
							if ( $date ) {
								goblog_free_display_date_post();
							} 
							?>
						</div>
						<p><?php echo goblog_free_get_excerpt(); ?></p>
					</div>
					<div class="content-gambar">
						<?php

						if ( $layout === 'layout2' ) {
							goblog_free_display_thumbnail_post_grids2();
						} else {
							goblog_free_display_thumbnail_post();
						}

						?>
					</div>
				</div> <!-- End box-content -->

				<!-- End While -->
			<?php endwhile; ?>

			<!-- Pagination -->
			<?php if ( $pagi ) : ?>
				<nav class="navigation pagination" role="navigation" aria-label="Posts">
					<h2 class="screen-reader-text"><?php __( 'Posts navigation', 'goblog-free' ); ?></h2>
					<div class="nav-links">
						<?php
						echo paginate_links(
							array(
								'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
								'total'        => $posting->max_num_pages,
								'current'      => max( 1, get_query_var( 'paged' ) ),
								'format'       => '?paged=%#%',
								'show_all'     => false,
								'type'         => 'plain',
								'end_size'     => 2,
								'mid_size'     => 1,
								'prev_next'    => true,
								'prev_text'    => '<i class="fas fa-chevron-left"></i><span class="screen-reader-text">prev</span>',
								'next_text'    => '<i class="fas fa-chevron-right"></i><span class="screen-reader-text">next</span>',
								'add_args'     => false,
								'add_fragment' => '',
							)
						);
						?>
					</div>
				</nav>
			<?php endif; ?>

			</div> <!-- End grids number -->

			<!-- Get post none -->
			<?php 
		else :
			get_template_part( 'template-parts/post/content', 'none' ); 
			?>

			<?php 
		endif; // End check have_posts() 
		?>

		<!-- Reset post data -->
		<?php wp_reset_postdata(); ?>

		<?php 
		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Goblog Free Grids Tags widget.
	 *
	 * @since 1.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title    = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
		$number   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
		$category = isset( $instance['category'] ) ? (bool) $instance['category'] : true;
		$author   = isset( $instance['author'] ) ? (bool) $instance['author'] : true;
		$comment  = isset( $instance['comment'] ) ? (bool) $instance['comment'] : true;
		$date     = isset( $instance['date'] ) ? (bool) $instance['date'] : true;
		$pagi     = isset( $instance['pagi'] ) ? (bool) $instance['pagi'] : false;
		$posttags = isset( $instance['posttags'] ) ? esc_html( $instance['posttags'] ) : '';
		$layout   = isset( $instance['layout'] ) ? sanitize_key( $instance['layout'] ) : 'layout1';

		?>
		<!-- Title -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'goblog-free' ); ?>
			</label>
			<input class="widefat" value="<?php echo esc_attr( $title ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" />
		</p>

		<!-- Number -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
				<?php esc_html_e( 'Number of post:', 'goblog-free' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" />
		</p>

		<!-- category -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $category ); ?> id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Display category?', 'goblog-free' ); ?></label>
		</p>

		<!-- author -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $author ); ?> id="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'author' ) ); ?>"><?php esc_html_e( 'Display author?', 'goblog-free' ); ?></label>
		</p>

		<!-- comment -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $comment ); ?> id="<?php echo esc_attr( $this->get_field_id( 'comment' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'comment' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'comment' ) ); ?>"><?php esc_html_e( 'Display comment?', 'goblog-free' ); ?></label>
		</p>

		<!-- show date -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>">
				<?php esc_html_e( 'Display post date?', 'goblog-free' ); ?>
			</label>
		</p>

		<!-- pagi -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $pagi ); ?> id="<?php echo esc_attr( $this->get_field_id( 'pagi' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pagi' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'pagi' ) ); ?>">
				<?php esc_html_e( 'Display pagination?', 'goblog-free' ); ?>
			</label>
		</p>

		<!-- posttags -->
		<p style="margin-bottom: 5px;"><?php echo __( 'Tags', 'goblog-free' ); ?></p>
		<select id="<?php echo esc_attr( $this->get_field_id( 'posttags' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posttags' ) ); ?>">
			<?php
			$getDataTag = get_tags();
			foreach ( $getDataTag as $tag ) : 
				?>
				<option <?php selected( $posttags, esc_html( $tag->slug ) ); ?> value="<?php echo esc_html( $tag->slug ); ?>">
					<?php echo esc_html( $tag->slug ); ?>
				</option>
			<?php endforeach; ?>
		</select><br /><br />

		<!-- layout -->
		<div id="builder-layout">

			<!-- Layout 1 -->
			<div class="box">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>">
						<input <?php checked( $layout, 'layout1' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout1' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post1.png" alt="layout1" />
					</label></p>
			</div>

			<!-- Layout 2 -->
			<div class="box">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>">
						<input <?php checked( $layout, 'layout2' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout2' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post2.png" alt="layout2" />
					</label></p>
			</div>

			<!-- Layout 3 -->
			<div class="box">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout3' ) ); ?>">
						<input <?php checked( $layout, 'layout3' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout3' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post3.png" alt="layout3" />
					</label></p>
			</div>

			<!-- Layout 4 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout4' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout4' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout4' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post4.png" alt="layout4" />
					</label></p>
			</div>

			<!-- Layout 5 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout5' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout5' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout5' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post5.png" alt="layout5" />
					</label></p>
			</div>

			<!-- Layout 6 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout6' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout6' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout6' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post6.png" alt="layout6" />
					</label></p>
			</div>

			<!-- Layout 7 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout7' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout7' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout7' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post7.png" alt="layout7" />
					</label></p>
			</div>

			<!-- Layout 8 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout8' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout8' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout8' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post8.png" alt="layout8" />
					</label></p>
			</div>

			<!-- Layout 9 -->
			<div class="box box-pro">
				<p><label class="label-check" for="<?php echo esc_attr( $this->get_field_id( 'layout9' ) ); ?>">
						<input readonly disabled <?php checked( $layout, 'layout9' ); ?> class="widefat label-none" value="<?php echo esc_attr( 'layout9' ); ?>" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'layout9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" />

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/post9.png" alt="layout9" />
					</label></p>
			</div>

		</div>

		<?php
	}

	/**
	 * Handles updating the settings for the current Goblog Free Grids Tags widget instance.
	 *
	 * @since 1.0
	 *
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['number']   = absint( $new_instance['number'] );
		$instance['category'] = sanitize_key( $new_instance['category'] );
		$instance['author']   = sanitize_key( $new_instance['author'] );
		$instance['comment']  = sanitize_key( $new_instance['comment'] );
		$instance['date']     = sanitize_key( $new_instance['date'] );
		$instance['pagi']     = sanitize_key( $new_instance['pagi'] );
		$instance['posttags'] = sanitize_text_field( $new_instance['posttags'] );
		$instance['layout']   = sanitize_key( $new_instance['layout'] );

		return $instance;
	}
}
