<?php
/**
 * Home Page Controller
 */
class Home extends Controller {
	
	public function __construct($controller, $action) {

		// load core controller functions
		parent::__construct($controller, $action);
	}
	
	// homepage
	public function index() {

		// Render view
		$this->get_view()->render('home');
	}
}
