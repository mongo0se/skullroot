<?php

class View {
     
    protected $variables = array();
     
    function __construct() {

    }
 
    function set($name,$value) {
        $this->variables[$name] = $value;
    }
     
    function render($view_name) {
        extract($this->variables);

		if( file_exists(ROOT . DS . 'application' . DS . 'view' . DS . $view_name . '.php') ) {
			include (ROOT . DS . 'application' . DS . 'view' . DS . $view_name . '.php');
		} else {
			/* throw exception */						
		}
    }
}
