<?php

class Hotels extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'Hotels';
	}

	public function get_title()
	{
		return __('Hotels', 'plugin-name');
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
			'color_section',
			[
				'label' => __('Colors', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_hotels_box_background_color',
			[
				'label' => __('Box Background Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-widget-info' => 'background-color: {{obpress_hotels_box_background_color}}',
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
					'.obpress-hotels-widget-info h3' => 'color: {{obpress_hotels_box_title_color}}',
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
					'.obpress-hotels-widget-info p' => 'color: {{obpress_hotels_box_text_color}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'link_section',
			[
				'label' => __('Link', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_hotels_link_color',
			[
				'label' => __('Hotel Link Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-link' => 'color: {{obpress_hotels_box_text_color}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_link_typography',
				'label' => __('Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-link',
			]
		);		

		$this->end_controls_section();


		$this->start_controls_section(
			'overlay_section',
			[
				'label' => __('Overlay', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hotels_overlay_opacity_control',
			[
				'label' => __('Hotels Overlay Opacity', 'OBPress_Incentives'),
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
				'label' => __('Hotels Overlay Transition(s)', 'OBPress_Incentives'),
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

		// $this->add_control(
		// 	'obpress_hotels_link_color',
		// 	[
		// 		'label' => __('Hotel Link Color', 'OBPress_Hotels'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.obpress-hotels-link' => 'color: {{obpress_hotels_box_text_color}}',
		// 		],
		// 	]
		// );

		$this->end_controls_section();

		$this->start_controls_section(
			'hotels_button_section',
			[
				'label' => __('Button', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_incentive_button_background_color',
			[
				'label' => __('Button Background Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-widget-button' => 'background-color: {{obpress_incentive_button_background_color}}'
				],
			]
		);

		$this->add_control(
			'obpress_incentive_button_text_color',
			[
				'label' => __('Button Text Color', 'OBPress_Hotels'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-hotels-widget-button' => 'color: {{obpress_incentive_button_text_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_button_typography',
				'label' => __('Typography', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-widget-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hotels_button_border',
				'label' => __('Border', 'OBPress_Hotels'),
				'selector' => '.obpress-hotels-widget-button',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_section',
			[
				'label' => __('Slider', 'OBPress_Hotels'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'hotels_slide_pagination',
			[
				'label' => __( 'Hotels Pagination', 'OBPress_SearchBarPlugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'lines',
				'options' => [
					'lines'  => __( 'Lines', 'plugin-domain' ),
					'bullets' => __( 'Bullets', 'plugin-domain' ),
					'disabled' => __( 'Disabled', 'plugin-domain')
				],
			]
		);

		$this->add_control(
			'obpress_hotels_pagination_bullet_color',
			[
				'label' => __('Pagination Bullet Color', 'OBPress_SpecialOffers'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-hotels-swiper-nav .swiper-pagination-bullet' => 'background-color: {{obpress_hotels_pagination_bullet_color}}'
				],
			]
		);		

		$this->add_control(
			'obpress_hotels_pagination_bullet_back_icon',
			[
				'label' => __( 'Back Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'obpress_hotels_pagination_bullet_next_icon',
			[
				'label' => __( 'Next Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
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
	


		$hotels = BeApi::getHotelSearchForChain($chain, "true", $language);

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

		if(strlen($firstHotelDesc) > 230) {
			$firstHotelDesc = substr($firstHotelDesc, 0, 230) . '...';
		}

		$prevIcon = "";
		$nextIcon = "";


		if(isset($settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url']) && !empty($settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url'])) {
			$prevIcon = $settings_hotels['obpress_hotels_pagination_bullet_back_icon']['value']['url'];
		}

		if(isset($settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url']) && !empty($settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url'])){
			$nextIcon = $settings_hotels['obpress_hotels_pagination_bullet_next_icon']['value']['url'];
		}

		require_once(WP_PLUGIN_DIR . '/OBPress_Hotels/widget/assets/templates/template.php');
	}
}
