<?php
/**
* @version 0.0.6
* @author А.П.В.
* @package ba_more_photos_products_list for Jshopping
* @copyright Copyright (C) 2010 blog-about.ru. All rights reserved.
* @license GNU/GPL
**/
defined('_JEXEC') or die('Restricted access');

class plgJshoppingProductsBa_more_photos_products_list extends JPlugin {
	private $_params;
	
	public function __construct($subject, $config) {
		JSFactory::loadExtLanguageFile('ba_more_photos_products_list');
		parent::__construct($subject, $config);
		$addon = JTable::getInstance('addon', 'jshop');
		$addon->loadAlias('ba_more_photos_products_list');
		$jshopConfig = JSFactory::getConfig();
		$this->_params = (object)$addon->getParams();
		$this->_image_product_live_path = $jshopConfig->image_product_live_path;
		
		if (isset($this->_params->enable) && $this->_params->enable == 1 && isset($this->_params->count_images) && $this->_params->count_images > 1) {
			$doc = JFactory::getDocument();
			$doc->addStyleSheet($baseUrl . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list.css?ver=0.0.5');
			$change_delay = $this->_params->change_delay * 1000;
			$script_before .= "
				var more_photos_change_type = {$this->_params->change_type};
				var more_photos_change_delay = {$change_delay};
				var more_photos_return_default = {$this->_params->return_default};
			";
			$doc->addScriptDeclaration($script_before);
			$doc->addScript($baseUrl . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list.js?ver=0.0.5');
		}
	}
	
	public function onBeforeDisplayProductList($products) {
		if (isset($this->_params->enable) && $this->_params->enable == 1 && isset($this->_params->count_images) && $this->_params->count_images > 1) {
			$db = JFactory::getDbo();
			foreach($products as $product) {
				$query = $db->getQuery(true)
					->select('image_name')
					->from('#__jshopping_products_images')
					->where('product_id = ' . intval($product->product_id))
					->order('ordering ASC')
					->setLimit($this->_params->count_images);
				$db->setQuery($query);
				$prod_images = $db->loadObjectList();
				
				$prod_images_content = '';
				if (isset($prod_images)) {
					$classes = '';
					$count_images = 1;
					$product_name = htmlspecialchars($product->name);
					switch($this->_params->change_style) {
						case 1: {
							$classes .= ' style_fade';
							break;
						}
						case 2: {
							$classes .= ' style_slide';
							break;
						}
					}
					
					if ($this->_params->show_arrow) {
						$classes .= ' show_arrow';
					}
					
					$prod_images_content .= '<div class="ba_more_photos' . $classes . '" style="height: ' . $this->_params->height_images . 'px;">';
					
					if ($this->_params->change_type == 2) {
						$prod_images_content .= '<div class="more_photos_arrow more_photos_arrow_prev"><a href="#" class="arrow-link">&#9668;</a></div>';
					}
					
					$prod_images_content .= '<div class="more_photos_wrapper">';
					$prod_images_content .= '<div class="more_photos_image show" data-page="' . $count_images . '">';
					$prod_images_content .= '<a href="' . $product->product_link . '">';
					$prod_images_content .= '<img class="jshop_img" src="' . $product->image . '" alt="' . $product_name . '" title="' . $product_name . '" style="height: ' . $this->_params->height_images . 'px;" />';
					$prod_images_content .= '</a>';
					$prod_images_content .= '</div>';
					foreach($prod_images as $key => $val) {
						if ($val->image_name != $product->product_name_image) {
							$count_images++;
							$prod_images_content .= '<div class="more_photos_image" data-page="' . $count_images . '">';
							$image_url = $this->_image_product_live_path . '/' . getPatchProductImage($val->image_name, 'thumb');
							$prod_images_content .= '<a href="' . $product->product_link . '">';
								$prod_images_content .= '<img class="jshop_img" src="' . $image_url . '" alt="' . $product_name . '" title="' . $product_name . '" style="height: ' . $this->_params->height_images . 'px;" />';
							$prod_images_content .= '</a>';
							$prod_images_content .= '</div>';
						}
					}
					$prod_images_content .= '</div>';
					
					if ($this->_params->change_type == 2) {
						$prod_images_content .= '<div class="more_photos_arrow more_photos_arrow_next"><a href="#" class="arrow-link">&#9658;</a></div>';
					}
					
					$prod_images_content .= '</div>';
					
					if ($this->_params->change_type == 3) {
						$prod_images_content .= '<div class="ba_more_photos_dots' . $classes . '">';
						for ($iter = 1; $iter <= $count_images; $iter++) {
							$prod_images_content .= '<a href="#" class="dot_link" data-page="' . $iter . '"></a>';
						}
						$prod_images_content .= '</div>';
					}
					$product->_tmp_var_image_block .= $prod_images_content;
				}
			}
		}
	}
}
?>