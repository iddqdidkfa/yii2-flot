<?php


namespace yii\flot;


use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class Chart extends Widget {
	public $width = null;
	public $height = null;
	public $options = [];
	public $chartOptions = [];
	public $data = [];
	public $plugins = [];

	public static $defaultChartOptions = [
		'legend' => ['position' => 'se'],
		'colors' => [
			'#88bbc8',
			'#ed7a53',
			'#9fc569',
			'#bbdce3',
			'#9a3b1b',
			'#5a8022',
			'#2c7282',
		],
		'shadowSize' => 1,
		'tooltip' => true,
	];

	public static $defaultLine = [
		'grid' => [
			'show' => true,
			'aboveData' => true,
			'color' => '#3f3f3f',
			'labelMargin' => 5,
			'axisMargin' => 0,
			'borderWidth' => 0,
			'borderColor' => null,
			'minBorderMargin' => 5,
			'clickable' => true,
			'hoverable' => true,
			'autoHighlight' => true,
			'mouseActiveRadius' => 20,
		],
		'series' => [
			'grow' => ['active' => false],
			'lines' => [
				'show' => true,
				'fill' => false,
				'lineWidth' => 4,
				'steps' => false,
			],
			'points' => [
				'show' => true,
				'radius' => 5,
				'symbol' => 'circle',
				'fill' => true,
				'borderColor' => '#fff',
			],
		],
	];

	public static $defaultPie = [
		'series' => [
			'pie' => [
				'show' => true,
				'highlight' => ['opacity' => 0.1],
				'radius' => 1,
				'stroke' => [
					'color' => '#fff',
					'width' => 2,
				],
				'startAngle' => 2,
				'combine' => [
					'color' => '#353535',
					'threshold' => 0.05,
				],
				'label' => [
					'show' => true,
					'radius' => 1,
				],
			],
		],
		'grid' => [
			'hoverable' => true,
			'clickable' => true,
		],
		'tooltipOpts' => [
			'content' => '%s : %y.1%',
			'shifts' => [
				'x' => -30,
				'y' => -50,
			],
		],
	];

	public static function getDefaults($type = 'line')
	{
		switch ($type) {
			case 'line':
				return self::$defaultLine;
			case 'pie':
				return ArrayHelper::merge(self::$defaultPie, [
					'series' => [
						'pie' => [
							'label' => [
								'formatter' => new JsExpression('function(label, series) { return \'<div class="pie-chart-label">\'+label+\'&nbsp;\'+Math.round(series.percent)+\'%</div>\'; }'),
							],
						],
					],
				]);
			default:
				return [];
		}
	}

	public function init()
	{
		parent::init();
		Html::addCssClass($this->options, 'jqFlot');
	}

	public function run()
	{
		if (!array_key_exists('id', $this->options)) {
			$this->options['id'] = $this->getId();
		}
		if (!is_null($this->width)) {
			Html::addCssStyle($this->options, 'width:'.$this->width);
		}
		if (!is_null($this->height)) {
			Html::addCssStyle($this->options, 'height:'.$this->height);
		}
		echo Html::tag('div', '', $this->options);
		$this->registerChart();
	}

	public function registerChart()
	{
		$view = $this->getView();
		FlotAsset::register($view);
		foreach ($this->plugins as $plugin) {
			$className = 'softcommerce\flot\Flot'.ucfirst($plugin).'Asset';
			if (class_exists($className)) {
				call_user_func($className.'::register', $view);
			}
		}
		$chartOptions = ArrayHelper::merge(self::$defaultChartOptions, $this->chartOptions);
		if (array_key_exists('colors', $this->chartOptions)) {
			$chartOptions['colors'] = $this->chartOptions['colors'];
		}
		$options = empty($chartOptions) ? '' : Json::encode($chartOptions);
		$data = empty($this->data) ? '[]' : Json::encode($this->data);
        $plotParam = preg_replace('/[^a-z]/i', '', $this->options['id']);
		$js = "var {$plotParam} = jQuery.plot(jQuery('#{$this->options['id']}'), {$data}, {$options});\n";
        $view->registerJs($js);
	}
} 