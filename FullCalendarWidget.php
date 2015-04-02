<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;

use yii\helpers\Json;
use yii\helpers\Html;

class FullCalendarWidget extends \yii\base\Widget
{
	
	
	public $language=false;
	
	public $googleCalendar=false;
	
	
	public $options;
	
	public $htmlOptions;
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$view = $this->view;
		$htmlOptions=$this->htmlOptions;
		if(empty($htmlOptions['id']))
			$htmlOptions['id'] = $this->getId();
		$this->registerAssets($view);
		
		$options=Json::encode($this->options);
		
		$view->registerJs("jQuery('#{$htmlOptions['id']}').fullCalendar($options);");
		
		return Html::tag('div', '', $this->htmlOptions);
	}

	
	public function registerAssets($view)
	{
		FullCalendarAsset::register($view);
		if($this->language){
			FullCalendarAsset::$language=$this->language;
			conquer\momentjs\MomentjsAsset::$language=$this->language;
		}
		if($this->googleCalendar)
			FullCalendarAsset::$googleCalendar=true;
	}
}