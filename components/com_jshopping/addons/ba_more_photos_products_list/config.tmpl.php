<?php
/**
 * @version 0.1.4
 * @author А.П.В.
 * @package ba_more_photos_products_list for Jshopping
 * @copyright Copyright (C) 2010 blog-about.ru. All rights reserved.
 * @license GNU/GPL
 **/
defined('_JEXEC') or die('Restricted access');

\JSFactory::loadExtLanguageFile('ba_more_photos_products_list');
\JFactory::getDocument()->addStyleDeclaration('.jshop_edit .controls { display: block; }');

$params = (object)$this->params;

$yes_no_options = array();
$yes_no_options[] = \JHtml::_('select.option', '1', \JText::_('JYES'));
$yes_no_options[] = \JHtml::_('select.option', '0', \JText::_('JNO'));

$change_type = array(
    1 => _JSHOP_BAMPPL_CHANGE_TYPE_HOVER,
    2 => _JSHOP_BAMPPL_CHANGE_TYPE_AUTO,
    3 => _JSHOP_BAMPPL_CHANGE_TYPE_MANUAL
);

$change_style = array(
    1 => _JSHOP_BAMPPL_CHANGE_STYLE_FADE,
    2 => _JSHOP_BAMPPL_CHANGE_STYLE_SLIDE
);

$show_element_types = array(
    0 => \JHtml::_('select.option', '0', \JText::_('JNO')),
    1 => _JSHOP_BAMPPL_SHOW_ELEMENT_TYPE_HOVER,
    2 => _JSHOP_BAMPPL_SHOW_ELEMENT_TYPE_ALWAYS
);

$type_display = array(
    1 => _JSHOP_BAMPPL_TYPE_DISPLAY_DEFAULT,
    2 => _JSHOP_BAMPPL_TYPE_DISPLAY_FILL
);

$size_image = array(
    1 => _JSHOP_BAMPPL_IMAGE_SIZE_THUMB,
    2 => _JSHOP_BAMPPL_IMAGE_SIZE_MIDDLE,
    3 => _JSHOP_BAMPPL_IMAGE_SIZE_ORIGINAL
);
?>
<fieldset class="form-horizontal">
    <legend><?php echo _JSHOP_BAMPPL_NAME; ?></legend>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_NAME_ENABLE_DESC; ?>"><?php echo _JSHOP_BAMPPL_NAME_ENABLE; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[enable]', 'style="color: #fff;" class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->enable) ? $params->enable : 1)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_COUNT_IMAGES_DESC; ?>"><?php echo _JSHOP_BAMPPL_COUNT_IMAGES; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="0"
                   step="1"
                   name="params[count_images]"
                   value="<?php echo(isset($params->count_images) ? $params->count_images : 0); ?>"
                   class="inputbox form-control form-input"
            />
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_COUNT_VIDEOS_DESC; ?>"><?php echo _JSHOP_BAMPPL_COUNT_VIDEOS; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="0"
                   step="1"
                   name="params[count_videos]"
                   value="<?php echo(isset($params->count_videos) ? $params->count_videos : 0); ?>"
                   class="inputbox form-control form-input"
            />
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_VIDEOS_FIRST_DESC; ?>"><?php echo _JSHOP_BAMPPL_VIDEOS_FIRST; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[videos_first]', 'style="color: #fff;" class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->videos_first) ? $params->videos_first : 0)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_HEIGHT_IMAGES_DESC; ?>"><?php echo _JSHOP_BAMPPL_HEIGHT_IMAGES; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="1"
                   step="1"
                   name="params[height_images]"
                   value="<?php echo(isset($params->height_images) ? $params->height_images : 300); ?>"
                   class="inputbox form-control form-input"
            />
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_TYPE_DISPLAY_DESC; ?>"><?php echo _JSHOP_BAMPPL_TYPE_DISPLAY; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $type_display, 'params[type_display]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->type_display) ? $params->type_display : 1)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_CHANGE_TYPE_DESC; ?>"><?php echo _JSHOP_BAMPPL_CHANGE_TYPE; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $change_type, 'params[change_type]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->change_type) ? $params->change_type : 1)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_CHANGE_STYLE_DESC; ?>"><?php echo _JSHOP_BAMPPL_CHANGE_STYLE; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $change_style, 'params[change_style]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->change_style) ? $params->change_style : 1)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_SHOW_ARROWS_DESC; ?>"><?php echo _JSHOP_BAMPPL_SHOW_ARROWS; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $show_element_types, 'params[show_arrows]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->show_arrows) ? $params->show_arrows : 0)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_SHOW_DOTS_DESC; ?>"><?php echo _JSHOP_BAMPPL_SHOW_DOTS; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $show_element_types, 'params[show_dots]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->show_dots) ? $params->show_dots : 0)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_CHANGE_DELAY_DESC; ?>"><?php echo _JSHOP_BAMPPL_CHANGE_DELAY; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="1"
                   step="1"
                   name="params[change_delay]"
                   value="<?php echo(isset($params->change_delay) ? $params->change_delay : 5); ?>"
                   class="inputbox form-control form-input"
            />
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_CHANGE_SPEED_DESC; ?>"><?php echo _JSHOP_BAMPPL_CHANGE_SPEED; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="1"
                   step="1"
                   name="params[change_speed]"
                   value="<?php echo(isset($params->change_speed) ? $params->change_speed : 500); ?>"
                   class="inputbox form-control form-input"
            />
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_RETURN_DEFAULT_DESC; ?>"><?php echo _JSHOP_BAMPPL_RETURN_DEFAULT; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[return_default]', 'style="color: #fff;" class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->return_default) ? $params->return_default : 0)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_IMAGE_SIZE_DESC; ?>"><?php echo _JSHOP_BAMPPL_IMAGE_SIZE; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $size_image, 'params[size_image]', 'class = "inputbox form-control form-select"', 'value', 'text', (isset($params->size_image) ? $params->size_image : 1)); ?>
        </div>
    </div>
</fieldset>