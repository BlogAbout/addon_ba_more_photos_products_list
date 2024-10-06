<?php
/**
 * @version 0.1.4
 * @author А.П.В.
 * @package ba_more_photos_products_list for Jshopping
 * @copyright Copyright (C) 2010 blog-about.ru. All rights reserved.
 * @license GNU/GPL
 **/
defined('_JEXEC') or die('Restricted access');

define('_JSHOP_BAMPPL_NAME', "Дополнительные изображения товара в списке товаров.");
define('_JSHOP_BAMPPL_NAME_ENABLE', "Включить");
define('_JSHOP_BAMPPL_NAME_ENABLE_DESC', "Включить или нет вывод дополнительных изображений товаров в списке товаров.");
define('_JSHOP_BAMPPL_COUNT_ACTIVATION_KEY', "Ключ активации");
define('_JSHOP_BAMPPL_COUNT_ACTIVATION_KEY_DESC', "Введите ключ активации, полученный при покупке аддона. В противном случа аддон работать не будет.");
define('_JSHOP_BAMPPL_COUNT_ACTIVATION_KEY_ERROR', "More Photos: Ключ активации не указан или не действителен. Убедитесь, что Вы указали верный ключ активации.");
define('_JSHOP_BAMPPL_COUNT_IMAGES', "Количество изображений");
define('_JSHOP_BAMPPL_COUNT_IMAGES_DESC', "Укажите максимальное количество изображений товара для вывода.");
define('_JSHOP_BAMPPL_HEIGHT_IMAGES', "Высота изображений");
define('_JSHOP_BAMPPL_HEIGHT_IMAGES_DESC', "Укажите высоту изображений товаров в пикселях.");
define('_JSHOP_BAMPPL_CHANGE_TYPE', "Метод смены");
define('_JSHOP_BAMPPL_CHANGE_TYPE_DESC', "Выберите способ смены изображения товара.\nПри наведении - будет сменяться только если навели курсор на товар\nАвтоматически - Будет сменяться автоматически у всех товаров\nВручную - Будет сменяться только свайпом, стрелками или пагинацией (включите соответствующие)");
define('_JSHOP_BAMPPL_CHANGE_TYPE_HOVER', "При наведении");
define('_JSHOP_BAMPPL_CHANGE_TYPE_AUTO', "Автоматически");
define('_JSHOP_BAMPPL_CHANGE_TYPE_MANUAL', "Вручную");
define('_JSHOP_BAMPPL_CHANGE_STYLE', "Стиль");
define('_JSHOP_BAMPPL_CHANGE_STYLE_DESC', "Выберите стиль смены изображения товара.");
define('_JSHOP_BAMPPL_CHANGE_STYLE_FADE', "Затухание");
define('_JSHOP_BAMPPL_CHANGE_STYLE_SLIDE', "Сдвиг");
define('_JSHOP_BAMPPL_CHANGE_DELAY', "Задержка (сек)");
define('_JSHOP_BAMPPL_CHANGE_DELAY_DESC', "Укажите время задержки перед сменой изображений в секундах.");
define('_JSHOP_BAMPPL_CHANGE_SPEED', "Скорость (мс)");
define('_JSHOP_BAMPPL_CHANGE_SPEED_DESC', "Укажите скорость смены изображений в миллисекундах.");
define('_JSHOP_BAMPPL_RETURN_DEFAULT', "Вернуть к исходному");
define('_JSHOP_BAMPPL_RETURN_DEFAULT_DESC', "Выберите, возвращать к первому изображению после того, как убрали наведение курсора на товар или оставить то, на котором остановились.\nДоступно для методов: При наведении и Вручную.");
define('_JSHOP_BAMPPL_COUNT_VIDEOS', "Количество видео");
define('_JSHOP_BAMPPL_COUNT_VIDEOS_DESC', "Укажите максимальное количество видео товара для вывода.");
define('_JSHOP_BAMPPL_VIDEOS_FIRST', "Видео в начале");
define('_JSHOP_BAMPPL_VIDEOS_FIRST_DESC', "Выберите, что будет идти первым - видео или изображение.");
define('_JSHOP_BAMPPL_TYPE_DISPLAY', "Тип отображения");
define('_JSHOP_BAMPPL_TYPE_DISPLAY_DESC', "Выберите тип отображения в блоке.");
define('_JSHOP_BAMPPL_TYPE_DISPLAY_DEFAULT', "Растянуть по ширине/высоте");
define('_JSHOP_BAMPPL_TYPE_DISPLAY_FILL', "Заполнить и обрезать");
define('_JSHOP_BAMPPL_SHOW_ARROWS', "Показывать стрелки");
define('_JSHOP_BAMPPL_SHOW_ARROWS_DESC', "Выберите, показывать стрелки переключения изображения или нет");
define('_JSHOP_BAMPPL_SHOW_DOTS', "Показывать пагинацию");
define('_JSHOP_BAMPPL_SHOW_DOTS_DESC', "Выберите, показывать пагинацию изображений или нет");
define('_JSHOP_BAMPPL_SHOW_ELEMENT_TYPE_HOVER', "Только при наведении");
define('_JSHOP_BAMPPL_SHOW_ELEMENT_TYPE_ALWAYS', "Всегда");
define('_JSHOP_BAMPPL_IMAGE_SIZE', "Размер изображения");
define('_JSHOP_BAMPPL_IMAGE_SIZE_DESC', "Выберите размер изображения для отображения.");
define('_JSHOP_BAMPPL_IMAGE_SIZE_THUMB', "Миниатюра");
define('_JSHOP_BAMPPL_IMAGE_SIZE_MIDDLE', "Среднее");
define('_JSHOP_BAMPPL_IMAGE_SIZE_ORIGINAL', "Оргиниал");