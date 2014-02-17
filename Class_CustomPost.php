<?php

/**
 *  CUSTOM POSTT TYPE
 *  UPDATE: 13/10/2013
 *  VERSÃO: 2.5
 */


class customPost{

	private $postType;
	private $args;
	/* Variavels de nomeação */

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
	/* Variaveis de configurações */
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
			$this->setMsgNotFoundTrash();
			$this->setMsgParentItemColon();

			$this->setLabel();
			$this->setDescription();
			$this->setPublic();
			$this->setExcludSearch();
			$this->setPubliclyQueryable();
			$this->setShowUi();
			$this->setShowInNavMenus();
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
	/* Métodos de configurações dos elementos */
	/**
	 * [setLabel]
	 * @param string $label [ Nome da Label]
	 */
	public function setLabel($label = NULL){
		$this->label = $label;
	}
	/**
	 * [setDescription atualiza a descrição do post]
	 * @param string $description [Descrição do tipo de post]
	 */
	public function setDescription($description = '' ){
		$this->description = $description;
	}
	/**
	 * [setPublic , Função responsavel por colocar o tipo do post public ou não, se true o post fica acessivel no administrador
	 *e no front-End caso false ele não fica acessivel em nenhum dos dois ]
	 * @param boolean $public [Colocar o post como publico ou não]
	 */
	public function setPublic( $public = true ){
		$this->public = $public;
	}
	/**
	 * [setExcludSearch, Função responsavel por colocar o post para aparecer no search ou não]
	 * @param boolean $exclude [Colocar o post na busca do site]
	 */
	public function setExcludSearch($exclude = false ){
		$this->excludeSearch = $exclude;
	}
	/**
	 * [setPubliclyQueryable ]
	 * @param [type] $public [description]
	 */
	public function setPubliclyQueryable($public = NULL ){
		$this->publiclyQueryable = isset($public) ? $public : $this->public;
	}
	/**
	 * [setShowUi, Mostrar o menu no administrador ? ]
	 * @param  boolean $show [description]
	 */
	public function setShowUi($show = NULL  ){
		$this->show_ui = $show ? $show : $this->public;
	}
	/**
	 * [setShowInNavMenus description]
	 * @param [type] $show [description]
	 */
	public function setShowInNavMenus($show = NULL){
		$this->showInNavMenus = $show ? $show : $this->public;
	}
	/**
	 * [setShowInMenu description]
	 * @param [type] $show [description]
	 */
	public function setShowInMenu($show = NULL ){
		$this->showInMenu = isset($show) ? $show : $this->show_ui;
	}
	public function setShowInAdminBar($show = NULL ){
		$this->showInAdminBar = isset($show) ? $show : $this->showInMenu;
	}
	public function setMenuPosition($position = 5 ){
		$this->menuPosition = $position;
	}
	public function setMenuIcon($urlIcon = NULL){
		$this->menuIcon = $urlIcon;
	}
	public function setCapabilityType($type = 'post'){
		$this->capabilityType = $type;
	}
	public function setCapabilities( $capabilities = NULL ){
		if($capabilities) $this->args['capabilities'] = $capabilities;
	}
	public function setMapMetaCap($metaCap = true){
		$this->mapMetaCap = $metaCap;
	}
	public function setHierarchical( $hierarchical = false ){
		$this->hierarchical = $hierarchical;
	}
	public function setSupports($supports = array('title','editor')){
		$this->supports = $supports;
	}
	public function setRegisterMetaBoxCb( $metaBox = '' ){
		$this->registerMetaBoxCb = $metaBox;
	}
	public function setTaxonomies($taxonomies = array() ){
		$this->taxonomies = $taxonomies;
	}
	public function setHasArchive($has = false){
		$this->hasArchive = $has;
	}
	public function setPermalinkEpmask( $permalink = 'EP_PERMALINK' ){
		$this->permalinkEpmask = $permalink;
	}
	public function setRewrite($rewrite = true){
		$this->rewrite = $rewrite;
	}
	public function setQueryVar($query = true){
		$this->queryVar = $query;
	}
	public function setCanExport($export = true){
		$this->canExport = $export;
	}
	public function setBuiltin($builtin = false){
		$this->builtin = $builtin;
	}
	public function setEditLink($link = NULL){
		if($link) $this->args['edit_link'] = $link;
	}

	/* Métodos de nomeação dos elementos */
	/**
	 * [setName Name Menu]
	 * @param [string] $name [Name]
	 */
	public function setName($name){
		$this->name = $name;
	}
	/**
	 * [setNameMenuSingular Name of Singular Menu]
	 * @param [string] $name [Name of Singular]
	 */
	public function setNameMenuSingular( $name = NULL ){
		$this->nameMenuSingular = $name ? $name : $this->name;
	}
	public function setNameMenu( $name = NULL ){
		$this->nameMenu = $name ? $name : $this->name;
	}
	public function setNameAll($name = NULL ){
		$this->nameAll = $name ? $name : "Todo(a)s ".$this->name;
	}
	public function setNameAdd($name = NULL ){
		$this->nameAddNew = $name ? $name : "Adicionar ".$this->name;
	}
	public function setNameEdit($name = NULL ){
		$this->nameEdit = $name ? $name : "Editar ".$this->name;
	}
	public function setNameNewItem($name = NULL){
		$this->nameNewItem = $name ? $name : $this->nameAddNew;
	}
	public function setNameView($name = NULL ){
		$this->nameView = $name ? $name : "Ver ".$this->name;
	}
	public function setNameSearch($name = NULL){
		$this->nameSearch = $name ? $name : "Procurar ".$this->name;
	}
	public function setMsgNotFound($msg = NULL){
		$this->msgNotFound = $msg;
	}
	public function setMsgNotFoundTrash($msg = NULL){
		$this->msgNotFoundTash = $msg;
	}
	public function setMsgParentItemColon($msg = NULL){
		$this->msgParentItemColon = $msg;
	}
}

?>