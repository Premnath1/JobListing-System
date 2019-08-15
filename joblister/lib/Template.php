<?php class Template{
	//Path to template
	protected $template;				//to extend this class and use thes prop
	// vars passed in
	protected $vars = array();			//Array to store all details

	//constructor
	public function __construct($template){			
		$this->template = $template;			
	}

	public function __get($key){			//Getter
		return $this->vars[$key];
	}

	public function __set($key, $value){	//Setter 
		$this->vars[$key] = $value;
	}

	public function __toString(){
		//extect functions helps to access $var directly instead of $template->$var
		extract($this->vars);	
		//To find the path name			
		chdir(dirname($this->template));
		//To start the buffer
		ob_start();

		//To include template path
		include basename($this->template);

		//to clean buffer
		return ob_get_clean();
	}
}