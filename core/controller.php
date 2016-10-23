<?php
/**
 * Core Controller Class
 */
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
	
	/**
	 * Load model
	 * @param String @model
	 */
	protected function load_model($model) {

		if(class_exists($model)) {
			$this->models[$model] = new $model();
		}		
	}
	
	/**
	 * Get Model
	 * Return an instance of the loaded model class.
	 * @param String $model
	 * @return Model|Bool
	 */
	protected function get_model($model) {
		
		if(is_object($this->models[$model])) {
			return $this->models[$model];
		}
		
		return false;
	}
	
	/**
	 * Get View
	 * Return view object
	 * @return View
	 */
	protected function get_view() {
		return $this->view;
	}

	/**
	 * Get Post
	 * Return variables from POST superglobal, after sanitising them.
	 * @return Array
	 */
	protected function get_post() {

		// create an empty array
		$sanitised = array();
	
		// if POST is empty
		if (!$_POST) {
			
			// return empty array
			return $sanitised;
		}

		// for each value in POST
		foreach ($_POST as $key => $value) {

			// strip slashes and add to sanitised results
			$sanitised[$key] = stripslashes($value);
		}

		// return array
		return $sanitised;
	}
}
