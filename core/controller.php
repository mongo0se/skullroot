<?php

class Controller extends Application {
	
    protected $controller;
   	protected $action;
	protected $models;
	protected $view;
	
	public function __construct($controller, $action) {
		parent::__construct();
		
		$this->controller = $controller;
       	$this->action = $action;
		$this->view = new View();
	}
	
	// load model class
	protected function load_model($model) {

		if(class_exists($model)) {
			$this->models[$model] = new $model();
		}		
	}
	
	// get instance of the loaded model class
	protected function get_model($model) {
		if(is_object($this->models[$model])) {
			return $this->models[$model];
		} else {
			return false;
		}
	}
	
	// return view object
	protected function get_view() {
		return $this->view;
	}

	// return post variables
	protected function get_post() {

		$sanitised = array();

		// sanitise post variables

		if (!$_POST) {
			return $sanitised;
		}

		foreach ($_POST as $key => $value) {

			$sanitised[$key] = stripslashes($value);
		}

		return $sanitised;
	}
}
