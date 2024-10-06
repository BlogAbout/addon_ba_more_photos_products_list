<?php
/**
 * @version 0.1.4
 * @author А.П.В.
 * @package ba_more_photos_products_list for Jshopping
 * @copyright Copyright (C) 2010 blog-about.ru. All rights reserved.
 * @license GNU/GPL
 **/
defined('_JEXEC') or die('Restricted access');

class plgJshoppingProductsBa_more_photos_products_list extends JPlugin
{
    private $_params;

    public function __construct($subject, $config)
    {
        \JSFactory::loadExtLanguageFile('ba_more_photos_products_list');
        parent::__construct($subject, $config);

        $addon = \JSFactory::getTable('addon', 'jshop');
        $addon->loadAlias('ba_more_photos_products_list');

        $jshopConfig = \JSFactory::getConfig();

        $this->_params = (object)$addon->getParams();
        $this->_image_product_live_path = $jshopConfig->image_product_live_path;
        $this->_video_product_live_path = $jshopConfig->video_product_live_path;

        if (
            isset($this->_params->enable) &&
            $this->_params->enable == 1 &&
            (
                (isset($this->_params->count_images) && $this->_params->count_images > 1) ||
                (isset($this->_params->count_videos) && $this->_params->count_videos > 0)
            )
        ) {
            $doc = \JFactory::getDocument();
            $doc->addStyleSheet(\JURI::root() . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list_owl.css?ver=0.1.4');
            $doc->addStyleSheet(\JURI::root() . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list.css?ver=0.1.4');

            $change_delay = $this->_params->change_delay * 1000;
            $script_before = "
				const more_photos_change_type = {$this->_params->change_type};
				const more_photos_change_style = {$this->_params->change_style};
				const more_photos_show_arrows = {$this->_params->show_arrows};
				const more_photos_show_dots = {$this->_params->show_dots};
				const more_photos_change_delay = {$change_delay};
				const more_photos_change_speed = {$this->_params->change_speed};
				const more_photos_return_default = {$this->_params->return_default};
			";

            $doc->addScriptDeclaration($script_before);
            $doc->addScript(\JURI::root() . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list_owl.js?ver=0.1.4');
            $doc->addScript(\JURI::root() . 'plugins/jshoppingproducts/ba_more_photos_products_list/ba_more_photos_products_list.js?ver=0.1.4');
        }
    }

    public function onBeforeDisplayProductList($products)
    {
        $enable = isset($this->_params->enable) ? (int)$this->_params->enable : 0;
        $countImages = isset($this->_params->count_images) ? (int)$this->_params->count_images : 0;
        $countVideos = isset($this->_params->count_videos) ? (int)$this->_params->count_videos : 0;
        $showArrows = isset($this->_params->show_arrows) ? (int)$this->_params->show_arrows : 0;
        $showDots = isset($this->_params->show_dots) ? (int)$this->_params->show_dots : 0;
        $heightBlock = isset($this->_params->height_images) ? (int)$this->_params->height_images : 300;
        $typeDisplay = isset($this->_params->type_display) ? (int)$this->_params->type_display : 1;
        $sizeImage = isset($this->_params->size_image) ? (int)$this->_params->size_image : 1;
        $videoIsFirst = isset($this->_params->videos_first) ? (int)$this->_params->videos_first : 0;

        switch ($sizeImage) {
            case 2:
                $sizeImageType = '';
                break;
            case 3:
                $sizeImageType = 'full';
                break;
            default:
                $sizeImageType = 'thumb';
                break;
        }

        if ($enable && ($countImages > 1 || $countVideos > 0)) {
            $db = \JFactory::getDbo();

            foreach ($products as $product) {
                $images = [];
                $videos = [];

                if ($countImages > 1) {
                    $query = $db->getQuery(true)
                        ->select('image_name')
                        ->from('#__jshopping_products_images')
                        ->where('product_id = ' . intval($product->product_id))
                        ->order('ordering ASC')
                        ->setLimit($countImages);
                    $db->setQuery($query);
                    $images = $db->loadObjectList();
                }

                if ($countVideos > 0) {
                    $query = $db->getQuery(true)
                        ->select('video_name')
                        ->from('#__jshopping_products_videos')
                        ->where('product_id = ' . intval($product->product_id))
                        ->order('video_id ASC')
                        ->setLimit($countVideos);
                    $db->setQuery($query);
                    $videos = $db->loadObjectList();
                }

                $productContent = '';
                if (isset($images) || isset($videos)) {
                    $classes = '';
                    $countPages = 1;
                    $productName = htmlspecialchars($product->name);
                    $contentImages = '';
                    $contentVideos = '';

                    if ($countImages > 0) {
                        foreach ($images as $image) {
                            $countPages++;
                            $imageUrl = $this->_image_product_live_path . '/' . \JSHelper::getPatchProductImage($image->image_name, $sizeImageType);

                            $contentImages .= '
                                <div class="more_photos_image slide" data-page="' . $countPages . '">
                                    <a href="' . $product->product_link . '" style="height: ' . $heightBlock . 'px;">
                                        <img class="jshop_img" src="' . $imageUrl . '" alt="' . $productName . '" title="' . $productName . '" />
                                    </a>
                                </div>
                            ';
                        }
                    }

                    if ($countVideos > 0) {
                        foreach ($videos as $video) {
                            if ($video->video_name) {
                                $countPages++;
                                $videoUrl = $this->_video_product_live_path . '/' . $video->video_name;

                                $contentVideos .= '
                                    <div class="more_photos_image ba-slide" data-page="' . $countPages . '">
                                        <a href="' . $product->product_link . '" style="height: ' . $heightBlock . 'px;">
                                            <video autoplay loop muted preload="auto" src="' . $videoUrl . '"></video>
                                        </a>
                                    </div>
                                ';
                            }
                        }
                    }

                    if ($showArrows) {
                        $classes .= $showArrows === 1 ? ' show_arrows_hover' : ' show_arrows_always';
                    }

                    if ($showDots) {
                        $classes .= $showDots === 1 ? ' show_dots_hover' : ' show_dots_always';
                    }

                    if ($typeDisplay === 2) {
                        $classes .= ' content_fill';
                    }

                    $productContent .= '
                        <div class="ba_more_photos' . $classes . '" style="height: ' . $this->_params->height_images . 'px;">
                            <div class="more_photos_wrapper ba-owl-carousel">
                                ' . ($videoIsFirst ? ($contentVideos . $contentImages) : ($contentImages . $contentVideos)) . '
                            </div>
                        </div>
                    ';

                    $product->_tmp_var_image_block .= $productContent;
                }
            }
        }
    }
}