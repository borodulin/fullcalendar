<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;

use yii\helpers\Html;
use conquer\helpers\Json;
use conquer\momentjs\MomentjsAsset;

/**
 * 
 * @author Andrey Borodulin
 *
 */
class FullCalendarWidget extends \yii\base\Widget
{
	
	/**
	 * Customize the language and localization options for the calendar.
	 * @link http://fullcalendar.io/docs/text/lang/
	 * @var string
	 */
	public $language;
	
	/**
	 * You must first have a Google Calendar API Key
	 * @link http://fullcalendar.io/docs/google_calendar/
	 * @var boolean
	 */
	public $googleCalendar = false;
	
	/**
	 * General FullCalendar options
	 * @link http://fullcalendar.io/docs/
	 * @var array
	 */
	public $options;

	/**
	 * Container tag
	 * @var string
	 */
	public $tag = 'div';
	
	/**
	 * Container html options
	 * @var array
	 */
	public $htmlOptions = [];
	
	/**
	 * 
	 * @var array
	 */
	public $events;
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
		if (!isset($this->htmlOptions['id'])) {
		    $this->htmlOptions['id'] = $this->getId();
		}
		if (is_null($this->language)) {
	        $this->language = \Yii::$app->language;
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$view = $this->view;
		
		$this->registerAssets($view);
		
		$options=$this->options;
		if ($this->language && !isset($options['lang'])) {
			$options['lang'] = $this->language;
		}
		if ($this->events) {
			$options['events'] = $this->events;
		}
		
		$id = $this->htmlOptions['id'];
		
		$options = Json::encode($options);
		
		echo Html::tag($this->tag, '', $this->htmlOptions);
		
		$view->registerJs("jQuery('#$id').fullCalendar($options);");
	}

	
	public function registerAssets($view)
	{
		FullCalendarAsset::register($view);
		if ($this->language) {
			FullCalendarAsset::$language = $this->language;
			MomentjsAsset::$language = $this->language;
		}
		if ($this->googleCalendar) {
			FullCalendarAsset::$googleCalendar = true;
		}
	}
}