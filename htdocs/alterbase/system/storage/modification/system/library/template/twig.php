<?php
namespace Template;
final class Twig {
	private $twig;
	private $data = array();
	
	public function __construct() {
		// include and register Twig auto-loader
		include_once(DIR_SYSTEM . 'library/template/Twig/Autoloader.php');
		
		\Twig_Autoloader::register();
	}
	
	public function set($key, $value) {
		$this->data[$key] = $value;
	}
	
	public function render($template, $cache = false) {
		// specify where to look for templates
				
		$loader = new \Twig_Loader_Filesystem();
		
		if (is_dir(DIR_MODIFICATION . 
				'view/template/'
			)) {
			$loader->addPath(DIR_MODIFICATION . 
				'view/template/'
			);
		}
		
		$loader->addPath(DIR_TEMPLATE);

		// initialize Twig environment
		$config = array('autoescape' => false);

		if ($cache) {
			$config['cache'] = DIR_CACHE;
		}

		//tri mod start
$config['debug'] = true;
//tri mod start
$this->twig = new \Twig_Environment($loader, $config);
$this->twig->addExtension(new \Twig_Extension_StringLoader());
//tri mod end
$this->twig->addExtension(new \Twig_Extension_Debug());
//tri mod end
$this->twig->addFilter(new \Twig_SimpleFilter('html_entity_decode', 'html_entity_decode'));
		
		try {
			// load template
			$template = $this->twig->loadTemplate($template . '.twig');
			
			return $template->render($this->data);
		} catch (Exception $e) {
			trigger_error('Error: Could not load template ' . $template . '!');
			exit();	
		}	
	}	
}
