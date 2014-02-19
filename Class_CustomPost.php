<?php
/**
 *************************************************************************************
 ****  Class Custom Post Type - By Anderson Soares ( www.andersonsoares.net.br ) *****
 *************************************************************************************
<Class Custom Post - This class is responsible for creating custom post type in Wordpress
and do all the configuration aimed at creating custom post!>
Copyright (C) <2014>  <Anderson soares Falcão>
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  Version : 2.5
 */
class customPost{
	private $postType;
	private $args;
	private $labels;
	private $name;
	private $nameMenuSingular;
	private $nameMenu;
	private $nameAll;
	private $nameAddNew;
	private $nameEdit;
	private $nameNewItem;
	private $nameView;
	private $nameSearch;
	private $msgNotFound;
	private $msgNotFoundTash;
	private $msgParentItemColon;
	private $label;
	private $description;
	private $public;
	private $excludeSearch;
	private $publiclyQueryable;
	private $show_ui;
	private $showInNavMenus;
	private $showInMenu;
	private $showInAdminBar;
	private $menuPosition;
	private $menuIcon;
	private $capabilityType;
	private $capabilities;
	private $mapMetaCap;
	private $hierarchical;
	private $supports;
	private $registerMetaBoxCb;
	private $taxonomies;
	private $hasArchive;
	private $permalinkEpmask;
	private $rewrite;
	private $queryVar;
	private $canExport;
	private $builtin;
	/* Method construct
	   Method _construct is the initialization method of the class
	*/
	public function __construct($postType,$name){
		try{
			$this->postType = $postType;
			$this->setName( $name );
			$this->setNameMenuSingular();
			$this->setNameMenu();
			$this->setNameAll();
			$this->setNameAdd();
			$this->setNameEdit();
			$this->setNameNewItem();
			$this->setNameView();
			$this->setNameSearch();
			$this->setMsgNotFound();
			$this->setPublic();
			$this->setPubliclyQueryable();
			$this->setShowUi();
			$this->setShowInMenu();
			$this->setShowInAdminBar();
			$this->setMenuPosition();
			$this->setMenuIcon();
			$this->setCapabilityType();
			$this->setCapabilities();
			$this->setMapMetaCap();
			$this->setHierarchical();
			$this->setSupports();
			$this->setRegisterMetaBoxCb();
			$this->setTaxonomies();
			$this->setHasArchive();
			$this->setPermalinkEpmask();
			$this->setRewrite();
			$this->setQueryVar();
			$this->setCanExport();
			$this->setBuiltin();
			add_action('init', array(&$this,'registerPostType'));
		}catch(Excerption $e){
			echo 'Favor verificar o slug do post ( Precisa conter no maximo 20 caracter )';
		}
	}
	public function registerPostType(){
		$this->setLabels();
		$this->setArgs();
		register_post_type($this->postType,$this->args);
	}
	/**
	 * [setLabels - Logs all existing settings labels]
	 */
	private function setLabels(){
		$this->labels = array(
			'name' => $this->name,
			'singular_name' => $this->nameMenuSingular,
			'menu_name' => $this->nameMenu,
			'all_items' => $this->nameAll,
			'add_new' => $this->nameAddNew,
			'add_new_item' => $this->nameNewItem,
			'edit_item' => $this->nameEdit,
			'new_item' => $this->nameNewItem,
			'view_item' => $this->nameView,
			'search_items' => $this->nameSearch,
			'not_found' => $this->msgNotFound,
			'not_found_in_trash' => $this->msgNotFoundTash,
			'parent_item_colon' => $this->msgParentItemColon
		);
	}
	/**
	 * [setArgs - Registers all custom post type settings]
	 */
	private function setArgs(){
		$this->args = array(
			'label' => $this->label,
			'labels' => $this->labels,
			'description' => $this->description,
			'public' => $this->public,
			'exclude_from_search' => $this->excludeSearch,
			'publicly_queryable' => $this->publiclyQueryable,
			'show_ui' => $this->show_ui ,
			'show_in_nav_menus' => $this->showInNavMenus,
			'show_in_menu' => $this->showInMenu,
			'show_in_admin_bar' => $this->showInAdminBar,
			'menu_position' => $this->menuPosition,
			'menu_icon' => $this->menuIcon,
			'capability_type'  => $this->capabilityType,
			'map_meta_cap' => $this->mapMetaCap,
			'hierarchical' => $this->hierarchical,
			'supports' => $this->supports,
			'register_meta_box_cb' => $this->registerMetaBoxCb,
			'taxonomies' => $this->taxonomies,
			'has_archive' => $this->hasArchive,
			'permalink_epmask' => $this->permalinkEpmask,
			'rewrite' => $this->rewrite,
			'query_var' => $this->queryVar,
			'can_export' => $this->canExport,
			'_builtin' => $this->builtin
		);
	}
	/**
	 * [setLabel - A plural descriptive name for the post type marked for translation ]
	 * @param [String] $label [A pluran descritive name for the post type - default: $post_type ]
	 */
	public function setLabel($label){
		$this->label = $label;
	}
	/**
	 * [setDescription A short descriptive summary of what the post type is.]
	 * @param string $description [A short descriptive summary of what the post]
	 */
	public function setDescription($description){
		$this->description = $description;
	}
	/**
	 * [setPublic - Whether a post type is intended to be used publicly either via the admin interface or by front-end users.]
	 * @param boolean $public [This post is public?]
	 */
	public function setPublic( $public = true ){
		$this->public = $public;
	}
	/**
	 * [setExcludSearch - hether to exclude posts with this post type from front end search results.]
	 * @param boolean $exclude [ exclude posts with this post type? ]
	 */
	public function setExcludSearch($exclude = false ){
		$this->excludeSearch = $exclude;
	}
	/**
	 * [setPubliclyQueryable - Whether queries can be performed on the front end as part of parse_request() ]
	 * @param boolean $public
	 */
	public function setPubliclyQueryable($public = NULL ){
		$this->publiclyQueryable = isset($public) ? $public : $this->public;
	}
	/**
	 * [setShowUi - Whether to generate a default UI for managing this post type in the admin]
	 * @param boolean $show [ Generat a UI for this post type in admin ? ]
	 */
	public function setShowUi($show = NULL  ){
		$this->show_ui = $show ? $show : $this->public;
	}
	/**
	 * [setShowInNavMenus - Whether post_type is available for selection in navigation menus ]
	 * @param boolean $show
	 */
	public function setShowInNavMenus($show = NULL){
		$this->showInNavMenus = $show ? $show : $this->public;
	}
	/**
	 * [setShowInMenu - Where to show the post type in the admin menu. show_ui must be true ]
	 * @param boolean or string $show
	 */
	public function setShowInMenu($show = NULL ){
		$this->showInMenu = isset($show) ? $show : $this->show_ui;
	}
	/**
	 * [setShowInAdminBar - Whether to make this post type available in the WordPress admin bar. ]
	 * @param boolean $show
	 */
	public function setShowInAdminBar($show = NULL ){
		$this->showInAdminBar = isset($show) ? $show : $this->showInMenu;
	}
	/**
	 * [setMenuPosition - The position in the menu order the post type should appear. show_in_menu must be true.]
	 * @param integer $position
	 */
	public function setMenuPosition($position = 5 ){
		$this->menuPosition = $position;
	}
	/**
	 * [setMenuIcon - The url to the icon to be used for this menu or the name of the icon from the iconfont ]
	 * @param string $urlIcon [url to the icon]
	 */
	public function setMenuIcon($urlIcon = NULL){
		$this->menuIcon = $urlIcon;
	}
	/**
	 * [setCapabilityType - The string to use to build the read, edit, and delete capabilities. May be passed as an array to allow for alternative plurals when using this argument as a base to construct the capabilities, e.g. array('story', 'stories') the first array element will be used for the singular capabilities and the second array element for the plural capabilities, this is instead of the auto generated version if no array is given which would be "storys". By default the capability_type is used as a base to construct capabilities. It seems that `map_meta_cap` needs to be set to true, to make this work.]
	 * @param string or array $type
	 */
	public function setCapabilityType($type = 'post'){
		$this->capabilityType = $type;
	}
	/**
	 * [setCapabilities - An array of the capabilities for this post type. ]
	 * @param array $capabilities 
	 */
	public function setCapabilities( $capabilities = NULL ){
		if($capabilities) $this->args['capabilities'] = $capabilities;
	}
	/**
	 * [setMapMetaCap - Whether to use the internal default meta capability handling ]
	 * @param boolean $metaCap
	 */
	public function setMapMetaCap($metaCap = true){
		$this->mapMetaCap = $metaCap;
	}
	/**
	 * [setHierarchical - Whether the post type is hierarchical (e.g. page). Allows Parent to be specified. The 'supports' parameter should contain 'page-attributes' to show the parent select box on the editor page. ]
	 * @param boolean $hierarchical [description]
	 */
	public function setHierarchical( $hierarchical = false ){
		$this->hierarchical = $hierarchical;
	}
	/**
	 * [setSupports - An alias for calling add_post_type_support() directly. As of 3.5, boolean false can be passed as value instead of an array to prevent default (title,editor,thumbnail) behavior ]
	 * @param array $supports
	 */
	public function setSupports($supports = array('title','editor','thumbnail')){
		$this->supports = $supports;
	}
	/**
	 * [setRegisterMetaBoxCb - Provide a callback function that will be called when setting up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback. ]
	 * @param string $metaBox [callback]
	 */
	public function setRegisterMetaBoxCb( $metaBox = '' ){
		$this->registerMetaBoxCb = $metaBox;
	}
	/**
	 * [setTaxonomies - An array of registered taxonomies like category or post_tag that will be used with this post type. This can be used in lieu of calling register_taxonomy_for_object_type() directly. Custom taxonomies still need to be registered with register_taxonomy(). ]
	 * @param array $taxonomies
	 */
	public function setTaxonomies($taxonomies = array() ){
		$this->taxonomies = $taxonomies;
	}
	/**
	 * [setHasArchive - Enables post type archives. Will use $post_type as archive slug by default ]
	 * @param boolean $has
	 */
	public function setHasArchive($has = false){
		$this->hasArchive = $has;
	}
	/**
	 * [setPermalinkEpmask - The default rewrite endpoint bitmasks. For more info see Trac Ticket 12605 and this Make WordPress Plugins summary of endpoints]
	 * @param string $permalink
	 */
	public function setPermalinkEpmask( $permalink = 'EP_PERMALINK' ){
		$this->permalinkEpmask = $permalink;
	}
	/**
	 * [setRewrite - Triggers the handling of rewrites for this post type. To prevent rewrites, set to false. ]
	 * @param boolean or array $rewrite
	 */
	public function setRewrite($rewrite = true){
		$this->rewrite = $rewrite;
	}
	/**
	 * [setQueryVar - Sets the query_var key for this post type.]
	 * @param boolean or string $query 
	 */
	public function setQueryVar($query = true){
		$this->queryVar = $query;
	}
	/**
	 * [setCanExport - Can this post_type be exported.]
	 * @param boolean $export
	 */
	public function setCanExport($export = true){
		$this->canExport = $export;
	}
	/**
	 * [setBuiltin - Whether this post type is a native or "built-in" post_type. Note: this Codex entry is for documentation - core developers recommend you don't use this when registering your own post type ]
	 * @param boolean $builtin
	 */
	public function setBuiltin($builtin = false){
		$this->builtin = $builtin;
	}
	/**
	 * [setEditLink -  Link to edit an entry with this post type. Note: this Codex entry is for documentation '-' core developers recommend you don't use this when registering your own post type]
	 * @param [boolean] $link
	 */
	public function setEditLink($link = NULL){
		if($link) $this->args['edit_link'] = $link;
	}
	/**
	 * [setName - Set this variabel name of plural name the custom post ]
	 * @param string $name
	 */
	public function setName($name){
		$this->name = $name;
	}
	/**
	 * [setNameMenuSingular - Set the singular name in admin menu]
	 * @param string $name
	 */
	public function setNameMenuSingular( $name = NULL ){
		$this->nameMenuSingular = $name ? $name : $this->name;
	}
	/**
	 * [setNameMenu - Set the name of post in menu admin]
	 * @param string $name 
	 */
	public function setNameMenu( $name = NULL ){
		$this->nameMenu = $name ? $name : $this->name;
	}
	/**
	 * [setNameAll - Set the name of all custom post in menu admin]
	 * @param string $name
	 */
	public function setNameAll($name = NULL ){
		$this->nameAll = $name ? $name : "Todo(a)s ".$this->name;
	}
	/**
	 * [setNameAdd - Set the name of add new custom post in menu admin ]
	 * @param string $name
	 */
	public function setNameAdd($name = NULL ){
		$this->nameAddNew = $name ? $name : "Adicionar ".$this->name;
	}
	/**
	 * [setNameEdit - Set the name of edit link for custom post in menu admin ]
	 * @param string $name
	 */
	public function setNameEdit($name = NULL ){
		$this->nameEdit = $name ? $name : "Editar ".$this->name;
	}
	/**
	 * [setNameNewItem - Set this name of add new item of custom post on edit a post in admin]
	 * @param string $name
	 */
	public function setNameNewItem($name = NULL){
		$this->nameNewItem = $name ? $name : $this->nameAddNew;
	}
	/**
	 * [setNameView - Set the name for view a custom post ]
	 * @param String $name
	 */
	public function setNameView($name = NULL ){
		$this->nameView = $name ? $name : "Ver ".$this->name;
	}
	/**
	 * [setNameSearch - Set the name of button for search posts in admin ]
	 * @param String $name
	 */
	public function setNameSearch($name = NULL){
		$this->nameSearch = $name ? $name : "Procurar ".$this->name;
	}
	/**
	 * [setMsgNotFound - Set the message for not found posts the custom post type in admin ]
	 * @param string $msg
	 */
	public function setMsgNotFound($msg = "Não existe nenhum post cadastrado!"){
		$this->msgNotFound = $msg;
	}
	/**
	 * [setMsgNotFoundTrash - Set the message for not found posts in Trash in admin ]
	 * @param string $msg [description]
	 */
	public function setMsgNotFoundTrash($msg = "Não há nada na lixeira!"){
		$this->msgNotFoundTash = $msg;
	}
	/**
	 * [setMsgParentItemColon - Set the message for item colon of custom post type in admim ]
	 * @param [type] $msg [description]
	 */
	public function setMsgParentItemColon($msg = NULL){
		$this->msgParentItemColon = $msg;
	}
}
