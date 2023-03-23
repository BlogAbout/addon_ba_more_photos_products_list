<?php
/**
 * @version 0.1.1
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
    2 => _JSHOP_BAMPPL_CHANGE_TYPE_ARROWS,
    3 => _JSHOP_BAMPPL_CHANGE_TYPE_DOTS,
    4 => _JSHOP_BAMPPL_CHANGE_TYPE_AUTO
);

$change_style = array(
    1 => _JSHOP_BAMPPL_CHANGE_STYLE_FADE,
    2 => _JSHOP_BAMPPL_CHANGE_STYLE_SLIDE
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
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[enable]', 'class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->enable) ? $params->enable : 1)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_COUNT_IMAGES_DESC; ?>"><?php echo _JSHOP_BAMPPL_COUNT_IMAGES; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="1"
                   step="1"
                   name="params[count_images]"
                   value="<?php echo(isset($params->count_images) ? $params->count_images : 1); ?>"
                   class="inputbox form-control form-input">
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
                   class="inputbox form-control form-input">
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
                   title="<?php echo _JSHOP_BAMPPL_CHANGE_DELAY_DESC; ?>"><?php echo _JSHOP_BAMPPL_CHANGE_DELAY; ?></label>
        </div>
        <div class="controls">
            <input type="number"
                   min="1"
                   step="1"
                   name="params[change_delay]"
                   value="<?php echo(isset($params->change_delay) ? $params->change_delay : 3); ?>"
                   class="inputbox form-control form-input">
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_RETURN_DEFAULT_DESC; ?>"><?php echo _JSHOP_BAMPPL_RETURN_DEFAULT; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[return_default]', 'class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->return_default) ? $params->return_default : 0)); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip"
                   title="<?php echo _JSHOP_BAMPPL_SHOW_ARROW_DESC; ?>"><?php echo _JSHOP_BAMPPL_SHOW_ARROW; ?></label>
        </div>
        <div class="controls">
            <?php echo \JHtml::_('select.genericlist', $yes_no_options, 'params[show_arrow]', 'class="inputbox form-control form-select form-select-color-state"', 'value', 'text', (isset($params->show_arrow) ? $params->show_arrow : 1)); ?>
        </div>
    </div>
</fieldset>