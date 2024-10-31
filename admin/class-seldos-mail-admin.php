<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.hayatikodla.com
 * @since      1.0.0
 *
 * @package    Seldos_Mail
 * @subpackage Seldos_Mail/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Seldos_Mail
 * @subpackage Seldos_Mail/admin
 * @author     Hasan Yüksektepe <hasanhasokeyk@hotmail.com>
 */
class Seldos_Mail_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        
        //ADD MENU
        add_action( 'admin_menu', array(&$this, 'register_seldos_mail_menu'));
        //ADD MENU
        
        //ADD POST TYPE
        add_action('init', array(&$this, 'seldos_mail_post_type'), 0);
        //ADD POST TYPE
        
        //ADD MAIL LIST
        add_action('init', array(&$this, 'seldos_mail_list_cat'), 0);
        //ADD MAIL LIST
        
        //SMTP SETTINGS
        add_action( 'phpmailer_init', 'seldos_mail_smpt_settings',9999);
        //SMTP SETTINGS
        
        //SAVE AJAX
        add_action( 'wp_ajax_seldos_mail_ajax_post', array($this, 'seldos_mail_ajax_post'));
        //SAVE AJAX
	}
    
    //SAVE AJAX
    function seldos_mail_ajax_post() {
        
        $post = $this->seldos_postSecurty($_POST);
        extract($post);
        
        return $result = wp_mail($mail, 'Seldos Mail - Wordpress - Test Mail', 'Wordpress - Test Mail <hr /> Seldos Mail');
 
        // wp mail debugging
        if (!$result) {
            global $ts_mail_errors;
            global $phpmailer;
         
            if (!isset($ts_mail_errors)) $ts_mail_errors = array();
         
            if (isset($phpmailer)) {
                $ts_mail_errors[] = $phpmailer->ErrorInfo;
            }
         
            return $ts_mail_errors;
        }
        
        return $result;
        
        exit;
    }
    //SAVE AJAX
    
    //SMTP SETTINGS
    function seldos_mail_smpt_settings($phpmailer){
        
        $phpmailer->isSMTP();
        $phpmailer->Host = !get_option( 'seldosmail_smtp_host',true)?null:get_option( 'seldosmail_smtp_host' );
        $phpmailer->SMTPAuth = !get_option( 'seldosmail_smtp_host',true)?null:true;
        $phpmailer->Port = !get_option( 'seldosmail_smtp_host',true)?null:get_option( 'seldosmail_smtp_host' );
        $phpmailer->Username = !get_option( 'seldosmail_smtp_user',true)?'':get_option( 'seldosmail_smtp_user' );
        $phpmailer->Password = !get_option( 'seldosmail_smtp_pass',true)?'':get_option( 'seldosmail_smtp_pass' );
        $phpmailer->SMTPSecure = !get_option( 'seldosmail_smtp_host_connect_type',true)?'':get_option( 'seldosmail_smtp_host_connect_type' );
        $phpmailer->From = !get_option( 'seldosmail_smtp_sender_mail',true)?'':get_option('seldosmail_smtp_sender_mail');
        $phpmailer->FromName = !get_option( 'seldosmail_smtp_sender_name',true)?'':get_option('seldosmail_smtp_sender_name');
    }
    //SMTP SETTINGS
    
    //ADD MAIL LIST
	function seldos_mail_list_cat(){
		register_taxonomy(
			'seldos-mail-list_cat',
			['seldos-mail-template','page','seldos-mail-settings'],
			array(
				'label' => __( 'Mail List' ,'seldos-mail'),
				'menu_name' => __( 'Mail List' ,'seldos-mail'),
				'rewrite' => true,
				'hierarchical' => true,
			)
		);
	}
    //ADD MAIL LIST
    
    //ADD POST TYPE
    function seldos_mail_post_type(){
        
        $theme_name	= 'seldos-mail';
		$labels = [
			'name'                => __('Mail Template', $theme_name),
			'singular_name'       => __('Mail Template', $theme_name),
			'menu_name'           => __('Mail Template', $theme_name),
			'parent_item_colon'   => __('Üst Ürün', $theme_name),
			'all_items'           => __('All Template', $theme_name),
			'view_item'           => __('View Template', $theme_name),
			'add_new_item'        => __('New Template', $theme_name),
			'add_new'             => __('Add New a Template', $theme_name),
			'edit_item'           => __('Edit Template', $theme_name),
			'update_item'         => __('Update Template', $theme_name),
			'search_items'        => __('Search Template', $theme_name),
			'not_found'           => __('Empty', $theme_name),
			'not_found_in_trash'  => __('Trash', $theme_name ),
			'search_items'		  => __('Search', $theme_name),
		];
		register_post_type('seldos-mail-template', [
			'label'                 => __('Mail Template', $theme_name),
			'description'           => __('Seldos Mail Template', $theme_name),
			'labels'                => $labels,
			'supports'              => array('title','editor'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => 'seldos-mail-settings',
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => 5,
			'menu_icon'		        => 'dashicons-groups',
			'can_export'            => true,
			'has_archive'           => false,
			'rewrite'			    => false,
            'taxonomies'              => ['seldos-mail-list_cat']
			//'capability_type'		=> 'manage_options',
		]);
        
    }
    //ADD POST TYPE
    
    //ADD MENU
    function register_seldos_mail_menu(){
        add_menu_page(__('Seldos Mail','seldos-mail'), __('Seldos Mail','seldos-mail'), 'manage_options', 'seldos-mail-settings',array($this, 'seldos_mail_settings'),plugins_url( '/img/icon.png' , __FILE__),2);
        add_submenu_page( 'seldos-mail-settings', __('Settings','seldos-seo'), __('Settings','seldos-seo'), 'manage_options', 'seldos-mail-settings');
        //add_submenu_page( 'seldos-mail-settings', __('SEO Appearance','seldos'), __('SEO Appearance','seldos'), 'manage_options', 'seldos-mail-settings',array(&$this, 'seldos_mail_mail_list'));
        //add_submenu_page( 'seldos-seo-settings', __('SEO Error Page','seldos'), __('SEO Error Page','seldos-seo'), 'manage_options', 'seldos-seo-error-page',array(&$this, 'seldos_seo_error_page'));
        //add_submenu_page( 'seldos-seo-settings', __('SEO Redirects','seldos'), __('SEO Redirects','seldos'), 'manage_options', 'seldos-seo-redirects',array(&$this, 'seldos_seo_redirects'));
    }
    //ADD MENU
    
    //MENU SETTINGS CONTENT
    function seldos_mail_settings(){
        require plugin_dir_path(__FILE__).'partials/seldos-mail-settings.php';
    }
    //MENU SETTINGS CONTENT
    
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/seldos-mail-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/seldos-mail-admin.js', array( 'jquery' ), $this->version, false );
	}
    
    //POST CONTROL
    function seldos_postControl($post){
		
		$kontrol = 0;
		foreach($post as $parametre){
			if(isset($_POST[$parametre]) and !empty($_POST[$parametre])){
				$kontrol ++;
			}else{
				return false;
				break;
			}
		}
		
		if(count($post)==$kontrol){
			return true;
		}else{
			return false;
		}
		
	}
    //POST CONTROL
    
    //POST SECURITY
    function seldos_postSecurty($post){
		global $mysqli;
		$degerler = array();
		foreach($post as $p => $d){
			if(is_string($_POST[$p]) === true){
				$degerler[$p] = addslashes(trim(strip_tags(($d))));
			}
		}
		return $degerler;
	}
    //POST SECURITY
}
