<?php

class StarterBlog_Builder_Footer extends StarterBlog_Customize_Builder_Panel {
	public $id = 'footer';

	function get_config() {
		return array(
			'id'         => $this->id,
			'title'      => __( 'Footer Builder', 'starter-blog' ),
			'control_id' => 'footer_builder_panel',
			'panel'      => 'footer_settings',
			'section'    => 'footer_builder_panel',
			'devices'    => array(
				'desktop' => __( 'Footer Layout', 'starter-blog' ),
			),
		);
	}

	function get_rows_config() {
		return array(
			'main'   => __( 'Footer Main', 'starter-blog' ),
			'bottom' => __( 'Footer Bottom', 'starter-blog' ),
		);
	}

	function customize() {
		$fn     = 'starterblog_customize_render_footer';
		$config = array(
			array(
				'name'     => 'footer_settings',
				'type'     => 'panel',
				'priority' => 98,
				'title'    => __( 'Footer', 'starter-blog' ),
			),

			array(
				'name'  => 'footer_builder_panel',
				'type'  => 'section',
				'panel' => 'footer_settings',
				'title' => __( 'Footer Builder', 'starter-blog' ),
			),

			array(
				'name'                => 'footer_builder_panel',
				'type'                => 'js_raw',
				'section'             => 'footer_builder_panel',
				'theme_supports'      => '',
				'title'               => __( 'Footer Builder', 'starter-blog' ),
				'selector'            => '#site-footer',
				'render_callback'     => $fn,
				'container_inclusive' => true,
			),

		);

		return $config;
	}

	function row_config( $section = false, $section_name = false ) {

		if ( ! $section ) {
			$section = 'footer_top';
		}
		if ( ! $section_name ) {
			$section_name = __( 'Footer Top', 'starter-blog' );
		}

		// Text skin.
		$color_mode = 'dark-mode';
		if ( 'footer_top' == $section ) {
			$color_mode = 'light-mode';
		}

		$selector           = '#cb-row--' . str_replace( '_', '-', $section );
		$skin_mode_selector = '.footer--row-inner.' . str_replace( '_', '-', $section ) . '-inner';

		$fn = 'starterblog_customize_render_footer';

		$config = array(
			array(
				'name'           => $section,
				'type'           => 'section',
				'panel'          => 'footer_settings',
				'theme_supports' => '',
				'title'          => $section_name,
			),

			array(
				'name'            => $section . '_layout',
				'type'            => 'select',
				'section'         => $section,
				'title'           => __( 'Layout', 'starter-blog' ),
				'selector'        => $selector,
				'render_callback' => $fn,
				'css_format'      => 'html_class',
				'default'         => 'layout-full-contained',
				'choices'         => array(
					'layout-full-contained' => __( 'Full width - Contained', 'starter-blog' ),
					'layout-fullwidth'      => __( 'Full Width', 'starter-blog' ),
					'layout-contained'      => __( 'Contained', 'starter-blog' ),
				),
			),

			array(
				'name'        => $section . '_noti_layout',
				'type'        => 'custom_html',
				'section'     => $section,
				'title'       => '',
				'description' => __( "Layout <code>Full width - Contained</code> and <code>Full Width</code> will not fit browser width because you've selected <a class='focus-control' data-id='site_layout' href='#'>Site Layout</a> as <code>Boxed</code> or <code>Framed</code>", 'starter-blog' ),
				'required'    => array(
					array( 'site_layout', '=', array( 'site-boxed', 'site-framed' ) ),
				),
			),

			array(
				'name'       => $section . '_text_mode',
				'type'       => 'image_select',
				'section'    => $section,
				'selector'   => $skin_mode_selector,
				'css_format' => 'html_class',
				'title'      => __( 'Skin Mode', 'starter-blog' ),
				'default'    => $color_mode,
				'choices'    => array(
					'dark-mode'  => array(
						'img'   => esc_url( get_template_directory_uri() ) . '/assets/images/customizer/text_mode_light.svg',
						'label' => 'Dark',
					),
					'light-mode' => array(
						'img'   => esc_url( get_template_directory_uri() ) . '/assets/images/customizer/text_mode_dark.svg',
						'label' => 'Light',
					),
				),
			),

			array(
				'name'       => "{$section}_background_color",
				'type'       => 'color',
				'section'    => $section,
				'title'      => __( 'Background Color', 'starter-blog' ),
				'selector'   => "{$selector} .footer--row-inner",
				'css_format' => 'background-color: {{value}}',
			),
		);
		$config = apply_filters( 'starterblog/builder/' . $this->id . '/rows/section_configs', $config, $section, $section_name );
		return $config;
	}
}

function starterblog_footer_layout_settings( $item_id, $section ) {

	global $wp_customize;

	if ( is_object( $wp_customize ) ) {
		global $wp_registered_sidebars;
		$name = $section;
		if ( is_array( $wp_registered_sidebars ) ) {
			if ( isset( $wp_registered_sidebars[ $item_id ] ) ) {
				$name = $wp_registered_sidebars[ $item_id ]['name'];
			}
		}
		$wp_customize->add_section(
			$section,
			array(
				'title' => $name,
			)
		);
	}

	if ( function_exists( 'starterblog_header_layout_settings' ) ) {
		return starterblog_header_layout_settings( $item_id, $section, 'starterblog_customize_render_footer', 'footer_' );
	}

	return false;
}

StarterBlog_Customize_Layout_Builder()->register_builder( 'footer', new StarterBlog_Builder_Footer() );



