<?php

class StarterBlog_Builder_Item_Footer_Widget_1 {
	public $id = 'footer-1';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 1', 'starter-blog' ),
			'id'      => 'footer-1',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-1',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-1', 'sidebar-widgets-footer-1' );
	}
}

class StarterBlog_Builder_Item_Footer_Widget_2 { //phpcs:ignore
	public $id = 'footer-2';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 2', 'starter-blog' ),
			'id'      => 'footer-2',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-2',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-2', 'sidebar-widgets-footer-2' );
	}
}

class StarterBlog_Builder_Item_Footer_Widget_3 { //phpcs:ignore
	public $id = 'footer-3';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 3', 'starter-blog' ),
			'id'      => 'footer-3',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-3',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-3', 'sidebar-widgets-footer-3' );
	}
}

class StarterBlog_Builder_Item_Footer_Widget_4 { //phpcs:ignore
	public $id = 'footer-4';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 4', 'starter-blog' ),
			'id'      => 'footer-4',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-4',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-4', 'sidebar-widgets-footer-4' );
	}
}

class StarterBlog_Builder_Item_Footer_Widget_5 { //phpcs:ignore
	public $id = 'footer-5';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 5', 'starter-blog' ),
			'id'      => 'footer-5',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-5',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-5', 'sidebar-widgets-footer-5' );
	}
}

class StarterBlog_Builder_Item_Footer_Widget_6 { //phpcs:ignore
	public $id = 'footer-6';

	function item() {
		return array(
			'name'    => __( 'Footer Sidebar 6', 'starter-blog' ),
			'id'      => 'footer-6',
			'width'   => '3',
			'section' => 'sidebar-widgets-footer-6',
		);
	}

	function customize() {
		return starterblog_footer_layout_settings( 'footer-6', 'sidebar-widgets-footer-6' );
	}
}


function starterblog_change_footer_widgets_location( $wp_customize ) {
	for ( $i = 1; $i <= 6; $i ++ ) {
		if ( $wp_customize->get_section( 'sidebar-widgets-footer-' . $i ) ) {
			$wp_customize->get_section( 'sidebar-widgets-footer-' . $i )->panel = 'footer_settings';
		}
	}

}

add_action( 'customize_register', 'starterblog_change_footer_widgets_location', 999 );

/**
 * Always show footer widgets for customize builder
 *
 * @param bool   $active
 * @param string $section
 *
 * @return bool
 */
function starterblog_customize_footer_widgets_show( $active, $section ) {
	if ( strpos( $section->id, 'widgets-footer-' ) ) {
		$active = true;
	}

	return $active;
}

add_filter( 'customize_section_active', 'starterblog_customize_footer_widgets_show', 15, 2 );


/**
 * Display Footer widget
 *
 * @param string $footer_id
 */
function starterblog_builder_footer_widget_item( $footer_id = 'footer-1' ) {
	$show = false;
	if ( is_active_sidebar( $footer_id ) ) {
		echo '<div class="widget-area">';
		dynamic_sidebar( $footer_id );
		$show = true;
		echo '</div>';
	}

	// Show admin notice.
	if ( ! $show ) {
		if ( current_user_can( 'edit_theme_options' ) ) {
			echo '<div class="widget-area">';
			$id = str_replace( 'footer-', '', $footer_id );
			the_widget(
				'WP_Widget_Text',
				array(
					'title'  => sprintf( __( 'Widget %s', 'starter-blog' ), $id ),
					'text'   => sprintf( // WPCS: XSS ok.
						/*Translators: 1: Admin URL2: Customize URL 3: Footer ID */
						__( '<p>Replace this widget content by going to <a href="%1$s"><strong>Appearance &rarr; Customize &rarr; Footer &rarr; Footer %2$s</strong></a> and adding widgets into this widget area.</p>', 'starter-blog' ),
						esc_url( admin_url( 'customize.php?autofocus[section]=sidebar-widgets-footer-' . $id ) ),
						$id
					),
					'filter' => true,
					'visual' => true,
				),
				array(
					'before_widget' => '<section id="placeholder-widget-text" class="widget widget_text">',
					'after_widget'  => '</section>',
					'before_title'  => '<h4 class="widget-title" aria-label="Widget Title">',
					'after_title'   => '</h4>',
				)
			);
			echo '</div>';
		}
	}

}

function starterblog_builder_footer_1_item() {
	starterblog_builder_footer_widget_item( 'footer-1' );
}

function starterblog_builder_footer_2_item() {
	starterblog_builder_footer_widget_item( 'footer-2' );
}

function starterblog_builder_footer_3_item() {
	starterblog_builder_footer_widget_item( 'footer-3' );
}

function starterblog_builder_footer_4_item() {
	starterblog_builder_footer_widget_item( 'footer-4' );
}

function starterblog_builder_footer_5_item() {
	starterblog_builder_footer_widget_item( 'footer-5' );
}

function starterblog_builder_footer_6_item() {
	starterblog_builder_footer_widget_item( 'footer-6' );
}

StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_1() );
StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_2() );
StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_3() );
StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_4() );
StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_5() );
StarterBlog_Customize_Layout_Builder()->register_item( 'footer', new StarterBlog_Builder_Item_Footer_Widget_6() );
