<?php

class Router {
	
	public function route($url) {

	    // split the URL
	    $url_array = array();
	    $url_array = explode("/",$url);
	    
        // first part of the URL is controller name
	    $controller = isset($url_array[0]) ? $url_array[0] : '';
	    array_shift($url_array);

        // second part is the action name
	    $action = isset($url_array[0]) ? $url_array[0] : '';
	    array_shift($url_array);

        // third part are the parameters
	    $query_string = $url_array;
	 
	    // if controller is empty, redirect to default controller
	    if(empty($controller)) {
	        $controller = DEFAULT_CONTROLLER;
        }
		
	    // if action is empty, redirect to index page
	    if(empty($action)) {
	        $action = 'index';
	    }
	 
	    $controller_name = $controller;
	    $controller = ucwords($controller);

		// controller not found
		if (!(class_exists($controller)))  {

			// 404 Error
			$controller = 'Errors';
		}
		
		// action not found
		if (!(int)method_exists($controller, $action)) {
			
			// 404 Error
			$controller = 'Errors';
			$action = 'index';
		}

		$dispatch = new $controller($controller_name, $action);

		// dispatch controller
	    call_user_func_array(array($dispatch, $action), $query_string); 
	}
}
