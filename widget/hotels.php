<?php

class Hotels extends \Elementor\Widget_Base
{
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		
		wp_register_script( 'hotels_js',  plugins_url( '/OBPress_Hotels/widget/assets/js/hotels.js'), array('jquery'), [ 'elementor-frontend' ], '1.0.0', true );

		wp_register_style( 'hotels_css', plugins_url( '/OBPress_Hotels/widget/assets/css/hotels.css') );        
	}
	
	public function get_script_depends()
	{
		return ['hotels_js'];
	}

	public function get_style_depends()
	{
		return ['hotels_css'];
	}
	
	public function get_name()
	{
		return 'Hotels';
	}

	public function get_title()
	{
		return __('Hotels', 'OBPress_Hotels');
	}

	public function get_icon()
	{
		return 'fa fa-calendar';
	}

	public function get_categories()
	{
		return ['OBPress'];
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'main_section',
			[
				'label' => __('Hotels Discription Part Style', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_widget_height',
			[
				'label' => esc_html__( 'Height', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 250,
						'max' => 1000,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 516,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 516,
					'unit' => 'px',
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-holder' => 'max-height: {{SIZE}}px',
					'.obpress-hotels-holder .obpress-hotel-widget-gallery' => 'height: calc({{SIZE}}px - 2px)',
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_box_margin',
			[
				'label' => __( 'Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '9',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '9',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_box_padding',
			[
				'label' => __( 'Padding', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '86',
					'right' => '100',
					'bottom' => '53',
					'left' => '100',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '86',
					'right' => '100',
					'bottom' => '53',
					'left' => '100',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'obpress_hotels_box_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'OBPress_Hotels' ),
				'selector' => '.obpress-hotels-holder .obpress-hotels-widget-info',
				'fields_options' => [
					'box_shadow_type' => [ 
						'default' =>'yes' 
					],
					'box_shadow' => [
						'default' =>[
							'horizontal' => 0,
							'vertical' => 14,
							'blur' => 24,
							'color' => '#bead8e33'
						]
					]
				]
			]
		);

		$this->add_control(
			'obpress_hotels_box_background_color',
			[
				'label' => __('Background Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info' => 'background-color: {{obpress_hotels_box_background_color}}',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_box_title_color',
			[
				'label' => __('Hotel Title Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info h3' => 'color: {{obpress_hotels_box_title_color}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'obpress_hotels_box_title_typography',
				'label' => __('Hotel Title Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-holder .obpress-hotels-widget-info h3',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '45',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_box_title_alignment',
			[
				'label' => __( 'Hotel Title Alignment', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info h3' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_box_title_margin',
			[
				'label' => __( 'Hotel Title Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '53',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_box_text_color',
			[
				'label' => __('Hotel Description Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info p' => 'color: {{obpress_hotels_box_text_color}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'obpress_hotels_box_text_typography',
				'label' => __('Hotel Description Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-holder .obpress-hotels-widget-info p',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_box_text_alignment',
			[
				'label' => __( 'Hotel Description Alignment', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info p' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_box_text_margin',
			[
				'label' => __( 'Hotel Description Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '72',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '72',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-info p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hotels_button_section',
			[
				'label' => __('Buttons Section', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_hotels_button_background_color',
			[
				'label' => __('Button Background Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'background-color: {{obpress_hotels_button_background_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_button_text_color',
			[
				'label' => __('Button Text Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'color: {{obpress_hotels_button_text_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_button_hover_transition',
			[
				'label' => __( 'Button Transition', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_button_background_hover_color',
			[
				'label' => __('Button Background Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button:hover' => 'background-color: {{obpress_hotels_button_background_hover_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_button_text_hover_color',
			[
				'label' => __('Button Text Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#191919',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button:hover' => 'color: {{obpress_hotels_button_text_hover_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_button_typography',
				'label' => __('Button Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-holder .obpress-hotels-widget-button',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '2.8',
						],
					],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hotels_button_border',
				'label' => __( 'Button Border', 'OBPress_Hotels' ),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => '1',
							'right' => '1',
							'bottom' => '1',
							'left' => '1',
							'isLinked' => true,
						],
					],
					'color' => [
						'default' => '#000',
					],
				],
				'selector' => '.obpress-hotels-holder .obpress-hotels-widget-button',
			]
		);

		$this->add_control(
			'hotels_button_border_hover_color',
			[
				'label' => __('Button Border Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#191919',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button:hover' => 'border-color: {{hotels_button_border_hover_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_button_margin',
			[
				'label' => __( 'Button Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '22',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '22',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_button_padding',
			[
				'label' => __( 'Button Padding', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '16',
					'right' => '65',
					'bottom' => '16',
					'left' => '65',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '16',
					'right' => '65',
					'bottom' => '16',
					'left' => '65',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_button_alignment',
			[
				'label' => __( 'Button Alignment', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-widget-button' => 'align-self: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_text_color',
			[
				'label' => __('Link Text Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#191919',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link' => 'color: {{obpress_hotels_link_text_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_text_bg_color',
			[
				'label' => __('Link Text Bg Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link' => 'background-color: {{obpress_hotels_link_text_bg_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_hover_transition',
			[
				'label' => __( 'Link Transition', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_hover_color',
			[
				'label' => __('Link Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link:hover' => 'color: {{obpress_hotels_link_hover_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_hover_bg_color',
			[
				'label' => __('Link Hover Bg Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#191919',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link:hover' => 'background-color: {{obpress_hotels_link_hover_bg_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_link_hover_border_color',
			[
				'label' => __('Link Hover Border Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#191919',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link:hover' => 'border-color: {{obpress_hotels_link_hover_border_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_link_typography',
				'label' => __('Link Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-holder .obpress-hotels-link!important',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '16',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '19',
						],
					],
					'text_decoration' => [
						'default' => 'underline',
					],
				],
			]
		);

		$this->add_responsive_control(
			'hotels_link_alignment',
			[
				'label' => __( 'Link Alignment', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'OBPress_Hotels' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-link' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'overlay_section',
			[
				'label' => __('Overlay', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hotels_overlay_opacity_control',
			[
				'label' => __('Hotels Overlay Opacity', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['opacity'],
				'range' => [
					'opacity' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					]
				],
				'default' => [
					'unit' => 'opacity',
					'size' => 0.38,
				],
				'selectors' => [
					'.obpress-hotels-swiper .obpress-swiper-overlay' => 'background-color: rgba(0, 0, 0, {{SIZE}})',
				],				
			]
		);

		$this->add_control(
			'hotels_overlay_transition_control',
			[
				'label' => __('Hotels Overlay Transition(s)', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['seconds'],
				'range' => [
					'seconds' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.05,
					]
				],
				'default' => [
					'unit' => 'seconds',
					'size' => 0.2,
				],
				'selectors' => [
					'.obpress-hotels-swiper .obpress-swiper-overlay' => '-webkit-transition: opacity {{SIZE}}s ease-in',
				],				
			]
		);		

		$this->add_control(
			'obpress_hotel_name_color',
			[
				'label' => __('Hotel Name Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper .obpress-swiper-overlay h4' => 'color: {{obpress_hotel_name_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'obpress_hotel_name_typography',
				'label' => __('Hotel Name Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-holder .obpress-hotels-swiper .obpress-swiper-overlay h4',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '16',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '3.2',
						],
					]
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'obpress_hotels_pagination_section',
			[
				'label' => __('Pagination And Buttons', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_slider_previous_nest_btn_width',
			[
				'label' => __( 'Button Width', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-prev, .obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-next' => 'width: {{SIZE}}px',
				]
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_previous_nest_btn_height',
			[
				'label' => __( 'Button Height', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-prev, .obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-next' => 'height: {{SIZE}}px',
				]
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_previous_button_margin',
			[
				'label' => __( 'Previous Button Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '80',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '80',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_next_button_margin',
			[
				'label' => __( 'Next Button Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '80',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '80',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-button-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hotels_slide_pagination',
			[
				'label' => __( 'Hotels Pagination', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'lines',
				'options' => [
					'lines'  => __( 'Lines', 'OBPress_Hotels' ),
					'bullets' => __( 'Bullets', 'OBPress_Hotels' ),
					'disabled' => __( 'Disabled', 'OBPress_Hotels')
				],
			]
		);

		$this->add_control(
			'obpress_hotels_pagination_bullet_color',
			[
				'label' => __('Pagination Bullet Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-pagination-bullet' => 'background-color: {{obpress_hotels_pagination_bullet_color}}'
				],
			]
		);		

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_hover_transition',
			[
				'label' => __( 'Buttons Hover Transition(seconds)', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 's'],
				'range' => [
					's' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
					]
				],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'.obpress-hotels-holder svg .custtom_bg_color, .obpress-hotels-holder svg .custtom_color' => 'transition: {{SIZE}}s',
				]
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_bg_color',
			[
				'label' => __('Buttons Bg Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .custtom_bg_color' => 'fill: {{obpress_hotels_next_and_previous_buttons_bg_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_border_color',
			[
				'label' => __('Buttons Border Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .custtom_bg_color' => 'stroke: {{obpress_hotels_next_and_previous_buttons_border_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_arrows_color',
			[
				'label' => __('Buttons Arrows Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .custtom_color' => 'stroke: {{obpress_hotels_next_and_previous_buttons_arrows_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_bg_hover_color',
			[
				'label' => __('Buttons Bg Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav svg:hover .custtom_bg_color' => 'fill: {{obpress_hotels_next_and_previous_buttons_bg_hover_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_border_hover_color',
			[
				'label' => __('Buttons Border Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav svg:hover .custtom_bg_color' => 'stroke: {{obpress_hotels_next_and_previous_buttons_border_hover_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_hotels_next_and_previous_buttons_arrows_hover_color',
			[
				'label' => __('Buttons Arrows Hover Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav svg:hover .custtom_color' => 'stroke: {{obpress_hotels_next_and_previous_buttons_arrows_hover_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_pagination_margin',
			[
				'label' => __( 'Pagination Margin', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '10',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '10',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_pagination_active_width',
			[
				'label' => __( 'Pagination Active Width', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-lines .swiper-pagination-bullet-active' => 'width: {{SIZE}}px!important',
				]
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_pagination_inactive_width',
			[
				'label' => __( 'Pagination Width', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-lines .swiper-pagination-bullet' => 'width: {{SIZE}}px',
				]
			]
		);

		$this->add_responsive_control(
			'obpress_hotels_pagination_height',
			[
				'label' => __( 'Pagination Height', 'OBPress_Hotels' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'selectors' => [
					'.obpress-hotels-holder .obpress-hotels-swiper-nav .swiper-pagination-bullet' => 'height: {{SIZE}}px',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render()
	{

		ini_set('xdebug.var_display_max_depth', 10);
		ini_set('xdebug.var_display_max_children', 256);
		ini_set('xdebug.var_display_max_data', 1024);

		$settings_hotels = $this->get_settings_for_display();
		$chain = get_option('chain_id');
		
		require_once(WP_CONTENT_DIR . '/plugins/obpress_plugin_manager/BeApi/BeApi.php');

		Lang_Curr_Functions::chainOrHotel($id);

		$language = Lang_Curr_Functions::getLanguage();
	

		// $hotels = BeApi::getHotelSearchForChain($chain, "true", $language);

        $hotels = BeApi::ApiCache('hotel_search_chain_'.$chain.'_'.$language.'_true', BeApi::$cache_time['hotel_search_chain'], function() use ($chain, $language){
            return BeApi::getHotelSearchForChain($chain, "true",$language);
        });



        // See if its single hotel or chain
        if ( count( $hotels->PropertiesType->Properties) == 1 ) {
        	$singleHotel = true;
        } else {
        	$singleHotel = false;
        }

		if ($hotels->PropertiesType != null) {
			$properties = $hotels->PropertiesType->Properties;
			foreach ($properties as $key => $propertyFromHotels) {
				$properties[$propertyFromHotels->HotelRef->HotelCode] = $propertyFromHotels;
				unset($properties[$key]);
			}

			$HotelDescriptiveContents = $properties;
		} else {
			$HotelDescriptiveContents = null;
		}

		$firstHotelDesc = '';
		$firstHotel = array_values($HotelDescriptiveContents)[0];

		if ($firstHotel->VendorMessagesType != null) {
			foreach ($firstHotel->VendorMessagesType->VendorMessages as $VendorMessage) {
				$firstHotelDesc .= $VendorMessage->Description;
			}
		}

		if(strlen($firstHotelDesc) > 100) {
			$firstHotelDesc = substr($firstHotelDesc, 0, 100) . '...';
		}

		$prevIcon = "";
		$nextIcon = "";


		if(isset($settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url']) && !empty($settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url'])) {
			$prevIcon = $settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url'];
		}

		if(isset($settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url']) && !empty($settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url'])){
			$nextIcon = $settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url'];
		}


		// get rooms for single hotel only
		if ($singleHotel == true) {


			$hotels_in_chain = [];
			$hotels = BeApi::ApiCache('hotel_search_chain_'.$chain.'_'.$language.'_true', BeApi::$cache_time['hotel_search_chain'], function() use ($chain, $language){
				return BeApi::getHotelSearchForChain($chain, "true",$language);
			});
		
		
			foreach($hotels->PropertiesType->Properties as $Property) {
				$hotels_in_chain[$Property->HotelRef->HotelCode]["HotelCode"] = $Property->HotelRef->HotelCode;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["HotelName"] = $Property->HotelRef->HotelName;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["ChainName"] = $Property->HotelRef->ChainName;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["Country"] = $Property->Address->CountryCode;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["City"] = $Property->Address->CityCode;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["StateProvCode"] = $Property->Address->StateProvCode;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["AddressLine"] = $Property->Address->AddressLine;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["Latitude"] = $Property->Position->Latitude;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["Longitude"] = $Property->Position->Longitude;
				$hotels_in_chain[$Property->HotelRef->HotelCode]["MaxPartialPaymentParcel"] = $Property->MaxPartialPaymentParcel;
			}

			$descriptive_infos = BeApi::ApiCache('descriptive_infos_'.$chain.'_'.$language, BeApi::$cache_time['descriptive_infos'], function() use($hotels_in_chain, $language){
				return BeApi::getHotelDescriptiveInfos($hotels_in_chain, $language);
			});


			$rooms = [];

			foreach ($descriptive_infos->HotelDescriptiveContentsType->HotelDescriptiveContents as $HotelDescriptiveContent) {
				foreach($HotelDescriptiveContent->FacilityInfo->GuestRoomsType->GuestRooms as $GuestRoom) {
					$rooms[$HotelDescriptiveContent->HotelRef->HotelCode][$GuestRoom->ID] = $GuestRoom;
				}
			}



		}


		// go to speficif template, regarding its is single or chain
		if ($singleHotel == false ) { 
			require_once(WP_PLUGIN_DIR . '/OBPress_Hotels/widget/assets/templates/template.php');
		} else {
			require_once(WP_PLUGIN_DIR . '/OBPress_Hotels/widget/assets/templates/single_hotel_template.php');
		}

	}
}
