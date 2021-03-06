<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.2.5
 * 
 * Sermon Options Functions
 * Created by CMSMasters
 * 
 */


if (!function_exists('my_religion_get_custom_sermon_meta_fields')) {
function my_religion_get_custom_sermon_meta_fields() {
	$cmsmasters_option = my_religion_get_global_options();


	$cmsmasters_global_sermon_layout = (isset($cmsmasters_option['my-religion' . '_sermon_layout']) && $cmsmasters_option['my-religion' . '_sermon_layout'] !== '') ? $cmsmasters_option['my-religion' . '_sermon_layout'] : 'r_sidebar';

	$cmsmasters_global_bottom_sidebar = (isset($cmsmasters_option['my-religion' . '_bottom_sidebar']) && $cmsmasters_option['my-religion' . '_bottom_sidebar'] !== '') ? (($cmsmasters_option['my-religion' . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';

	$cmsmasters_global_bottom_sidebar_layout = (isset($cmsmasters_option['my-religion' . '_bottom_sidebar_layout'])) ? $cmsmasters_option['my-religion' . '_bottom_sidebar_layout'] : '14141414';

	$cmsmasters_global_bg = (isset($cmsmasters_option['my-religion' . '_theme_layout']) && $cmsmasters_option['my-religion' . '_theme_layout'] === 'boxed') ? true : false;


	$cmsmasters_global_sermon_title = (isset($cmsmasters_option['my-religion' . '_sermon_title']) && $cmsmasters_option['my-religion' . '_sermon_title'] !== '') ? (($cmsmasters_option['my-religion' . '_sermon_title'] == 1) ? 'true' : 'false') : 'true';
		
	$cmsmasters_global_sermon_share_box = (isset($cmsmasters_option['my-religion' . '_sermon_share_box']) && $cmsmasters_option['my-religion' . '_sermon_share_box'] !== '') ? (($cmsmasters_option['my-religion' . '_sermon_share_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_sermon_author_box = (isset($cmsmasters_option['my-religion' . '_sermon_author_box']) && $cmsmasters_option['my-religion' . '_sermon_author_box'] !== '') ? (($cmsmasters_option['my-religion' . '_sermon_author_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_sermon_more_posts_box = (isset($cmsmasters_option['my-religion' . '_sermon_more_posts_box'])) ? $cmsmasters_option['my-religion' . '_sermon_more_posts_box'] : 'related';


	$cmsmasters_option_name = 'cmsmasters_sermon_';


	$tabs_array = array();


	$tabs_array['cmsmasters_sermon'] = array( 
		'label' => esc_html__('Sermon', 'my-religion'), 
		'value'	=> 'cmsmasters_sermon' 
	);


	$tabs_array['cmsmasters_layout'] = array( 
		'label' => esc_html__('Layout', 'my-religion'), 
		'value'	=> 'cmsmasters_layout' 
	);


	if ($cmsmasters_global_bg) {
		$tabs_array['cmsmasters_bg'] = array( 
			'label' => esc_html__('Background', 'my-religion'), 
			'value'	=> 'cmsmasters_bg' 
		);
	}


	$tabs_array['cmsmasters_heading'] = array( 
		'label' => esc_html__('Heading', 'my-religion'), 
		'value'	=> 'cmsmasters_heading' 
	);


	$custom_sermon_meta_fields = array( 
		array( 
			'id'	=> $cmsmasters_option_name . 'tabs', 
			'type'	=> 'tabs', 
			'std'	=> 'cmsmasters_sermon', 
			'options' => $tabs_array 
		), 
		array( 
			'id'	=> 'cmsmasters_sermon', 
			'type'	=> 'tab_start', 
			'std'	=> 'true'
		), 
		array( 
			'label'	=> esc_html__('Embedded Video Link', 'my-religion'), 
			'desc'	=> sprintf( wp_kses( __( 'For YouTube video insert links in format https://youtube.com/embed/... <br />For the Vimeo video insert links in format https://player.vimeo.com/video/... <br />For the correct functioning please disable the Mobile Optimizer option in <a href="%s">Lightbox tab</a>.', 'my-religion' ), array(  'a' => array( 'href' => array() ), 'br' => array()) ), esc_url('admin.php?page=cmsmasters-settings-element&tab=lightbox') ), 
			'id'	=> 'cmsmasters_sermon_video_link', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Audio Link', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_audio_links', 
			'type'	=> 'repeatable', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Download Link', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_download_link', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('PDF Link', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_pdf_link', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Custom Speaker Name', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_speaker_name', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Custom Speaker Link', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_speaker_link', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		),
		array( 
			'label'	=> esc_html__('Sermon Title', 'my-religion'), 
			'desc'	=> esc_html__('Show', 'my-religion'), 
			'id'	=> 'cmsmasters_sermon_title', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_sermon_title 
		), 
		array( 
			'label'	=> esc_html__('Sharing Box', 'my-religion'), 
			'desc'	=> esc_html__('Show', 'my-religion'), 
			'id'	=> 'cmsmasters_sermon_sharing_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('About Author Box', 'my-religion'), 
			'desc'	=> esc_html__('Show', 'my-religion'), 
			'id'	=> 'cmsmasters_sermon_author_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_sermon_author_box 
		), 
		array( 
			'label'	=> esc_html__('More Sermons Box', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sermon_more_posts', 
			'type'	=> 'select', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_sermon_more_posts_box, 
			'options' => array( 
				'related' => array( 
					'label' => esc_html__('Show Related Tab', 'my-religion'), 
					'value'	=> 'related' 
				), 
				'popular' => array( 
					'label' => esc_html__('Show Popular Tab', 'my-religion'), 
					'value'	=> 'popular' 
				), 
				'recent' => array( 
					'label' => esc_html__('Show Recent Tab', 'my-religion'), 
					'value'	=> 'recent' 
				), 
				'hide' => array( 
					'label' => esc_html__('Hide More Sermons Box', 'my-religion'), 
					'value'	=> 'hide' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsmasters_sermon', 
			'type'	=> 'tab_finish'
		), 
		
		
		
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_start', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Page Color Scheme', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_page_scheme', 
			'type'	=> 'select_scheme', 
			'hide'	=> 'false', 
			'std'	=> 'default' 
		), 
		array( 
			'label'	=> esc_html__('Page Layout', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'radio_img', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_sermon_layout, 
			'options' => array( 
				'r_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg', 
					'label' => esc_html__('Right Sidebar', 'my-religion'), 
					'value'	=> 'r_sidebar' 
				), 
				'l_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg', 
					'label' => esc_html__('Left Sidebar', 'my-religion'), 
					'value'	=> 'l_sidebar' 
				), 
				'fullwidth' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg', 
					'label' => esc_html__('Full Width', 'my-religion'), 
					'value'	=> 'fullwidth' 
				) 
			) 
		), 
		array( 
			'label'	=> esc_html__('Choose Right\Left Sidebar', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Bottom Sidebar', 'my-religion'), 
			'desc'	=> esc_html__('Show', 'my-religion'), 
			'id'	=> 'cmsmasters_bottom_sidebar', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_bottom_sidebar 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar Layout', 'my-religion'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_layout', 
			'type'	=> 'select', 
			'hide'	=> 'true', 
			'std'	=> $cmsmasters_global_bottom_sidebar_layout, 
			'options' => array( 
				'11' => array( 
					'label' => '1/1',
					'value'	=> '11' 
				), 
				'1212' => array( 
					'label' => '1/2 + 1/2',
					'value'	=> '1212' 
				), 
				'1323' => array( 
					'label' => '1/3 + 2/3',
					'value'	=> '1323' 
				), 
				'2313' => array( 
					'label' => '2/3 + 1/3',
					'value'	=> '2313' 
				), 
				'1434' => array( 
					'label' => '1/4 + 3/4',
					'value'	=> '1434' 
				), 
				'3414' => array( 
					'label' => '3/4 + 1/4',
					'value'	=> '3414' 
				), 
				'131313' => array( 
					'label' => '1/3 + 1/3 + 1/3',
					'value'	=> '131313' 
				), 
				'121414' => array( 
					'label' => '1/2 + 1/4 + 1/4',
					'value'	=> '121414' 
				), 
				'141214' => array( 
					'label' => '1/4 + 1/2 + 1/4',
					'value'	=> '141214' 
				), 
				'141412' => array( 
					'label' => '1/4 + 1/4 + 1/2',
					'value'	=> '141412' 
				), 
				'14141414' => array( 
					'label' => '1/4 + 1/4 + 1/4 + 1/4',
					'value'	=> '14141414' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_finish' 
		) 
	);


	return $custom_sermon_meta_fields;
}
}