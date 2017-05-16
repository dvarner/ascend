<?php namespace Ascend;

use Ascend\BootStrap as BS;
use Ascend\Request;

/**
 * Routes class allows route creation for mapping uri to views, controllers, etc
 */
class Route {
	
    public static function get($path, $call) {
        
		list($uri, $param, $method) = Request::getRequestUriParsed();
		list($path, $dynVar, $dynVal) = self::dynamicVariables($path, $uri);
		
        if($path == $uri && $method == 'GET'){
            self::getControllerByUri($path, $call, $uri, $dynVar, $dynVal); exit;
        }
    }
	
	public static function post($path, $call) {
        
		list($uri, $param, $method) = Request::getRequestUriParsed();
		list($path, $dynVar, $dynVal) = self::dynamicVariables($path, $uri);
		
        if($path == $uri && $method == 'POST') {
            self::getControllerByUri($path, $call, $uri, $dynVar, $dynVal); exit;
        }
    }
	
	public static function put($path, $call) {
        
		list($uri, $param, $method) = Request::getRequestUriParsed();
		list($path, $dynVar, $dynVal) = self::dynamicVariables($path, $uri);
		
        if($path == $uri && $method == 'PUT') {
            self::getControllerByUri($path, $call, $uri, $dynVar, $dynVal); exit;
        }
    }
	
	public static function delete($path, $call) {
        
		list($uri, $param, $method) = Request::getRequestUriParsed();
		list($path, $dynVar, $dynVal) = self::dynamicVariables($path, $uri);
		
        if($path == $uri && $method == 'DELETE') {
            self::getControllerByUri($path, $call, $uri, $dynVar, $dynVal); exit;
        }
    }
	
	public static function rest($path, $call) {
		self::get('/' . $path, 					$call . '@viewList'); 	// Show html page for listing results
		self::get('/api/' . $path, 				$call . '@get'); 		// Get a json result of all
		self::get('/' . $path . '/create', 		$call . '@viewCreate'); // Get html form for create
		self::post('/api/' . $path, 			$call . '@post');		// Insert a record(s)
		self::get('/api/' . $path . '/{id}', 	$call . '@getOne');		// Get single result back in json
		self::get('/' . $path . '/{id}/edit', 	$call . '@viewEdit');	// Show html form for editing
		self::put('/api/' . $path . '/{id}', 	$call . '@put');		// Update call results json
		self::delete('/api/' . $path . '/{id}', $call . '@delete');		// Delete call results json
    }
	
	public static function view($uri, $path) {
		
		list($requestUri, $requestParams, $requestMethod) = Request::getRequestUriParsed();
		
		if($uri == $requestUri){
			self::getView($path);
		}
	}
	
	public static function getView($path, $arr = null) {
		
		if (substr($path, -4) != '.php') {
			$path.= '.php';
		}
		
		$pathView = PATH_VIEWS . $path;
		
		if (file_exists($pathView)) {
			
			if (is_array($arr)) { extract($arr); }
			
			http_response_code(200);
			header('Content-Type: text/html');
			require_once $pathView;
			if (BS::getConfig('showScriptRunTime')) { echo Debug::displayLogTime(); }
			exit;
		}
	}
	
    public static function error404() {
		// http_response_code(404);
        header("HTTP/1.0 404 Not Found");
        echo '<center>';
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        echo '</center>';
        exit;
    }
	public static function maint() {
        if (BS::getConfig('maint') === true) {
            require_once PATH_VIEWS . 'maint.php';
            exit;
        }
    }
    public static function lock(){
        if (BS::getConfig('lock') === true) {
            require_once PATH_VIEWS . 'maint.php';
        }
    }
	
	// Takes path, checks for {?}, and changes {?} to values from uri.
	private static function dynamicVariables($path, $uri) {
		$pattern = '@\{([a-z]{1,50})\}@';
		preg_match_all($pattern, $path, $dynVar);
		
		if (count($dynVar[1])) {
			
			$u = $uri;
			$e = preg_split('@[\{|\}]@', $path);
			foreach($e AS $ek => $ev) {
				if ($ek % 2 == 0) {
					$u = str_replace($ev, ',', $u);
				}
				unset($ek, $ev);
			}
			$u = substr($u, 1);
			$dynVal = explode(',', $u);
			unset($e, $u);
			
			$path = str_replace($dynVar[0][0], $dynVal[0], $path);
		} else {
			$dynVal = [];
		}
		
		return [$path, $dynVar, $dynVal];
	}
	
	private static function getControllerByUri($path, $call, $uri, $dynVar, $dynVal) {
		if (is_callable($call)) {
			echo $call();
			if (BS::getConfig('showScriptRunTime')) { echo Debug::displayLogTime(); }
		} else {
			if (false !== strpos($call, '@')) {
				
				list($class, $func) = explode('@', $call);
				require_once PATH_CONTROLLERS . $class . '.php';
				$call = str_replace('@', '::', $call);
				$class = 'App' . SLASH . 'Controller' . SLASH . $class;
				$n = new $class;
				
				$result = null;
				if (isset($dynVar[1]) && count($dynVar[1]) == 1) {
					$result = $n->$func($dynVal[0]);
				} elseif (isset($dynVar[1]) && count($dynVar[1]) == 2) {
					$result = $n->$func($dynVal[0], $dynVal[1]);
				} elseif (isset($dynVar[1]) && count($dynVar[1]) == 3) {
					$result = $n->$func($dynVal[0], $dynVal[1], $dynVal[2]);
				} elseif (isset($dynVar[1]) && count($dynVar[1]) == 4) {
					$result = $n->$func($dynVal[0], $dynVal[1], $dynVal[2], $dynVal[3]);
				} elseif (isset($dynVar[1]) && count($dynVar[1]) > 4) {
					trigger_error('Route does not suppore more than 4 dynamic variable. Fix in Route::getControllerByUri!', E_USER_ERROR);
				} else {
					
					$rClass = new \ReflectionClass($class);
					$method = $rClass->getMethod($func);
					
					$c = $method->getNumberOfParameters();
					if ($c == 0) {
						$result = $n->$func();
					} else if($c == 1) {
						foreach ($method->getParameters() as $num => $parameter) {
							$defClassName = $parameter->getType();
							$defVariable = $parameter->getName();
							if (is_object($defClassName)) {
								$nam = SLASH . $defClassName;
								$inst = new $nam;
								$result = $n->$func($inst);
							}
						}
					} else {
						die('Fix Route > getControllerByUri > ReflectionClass');
					}
				}
				if (is_array($result)) {
					
					$request = new Request;
					if(!is_null($request->input('json-pretty'))) {
						echo '<pre>';
						var_dump($result);
					} else {
						header('Content-Type: application/json');
						echo json_encode($result);
					}
					
					exit;
				} else {
					echo $result;
					if (BS::getConfig('showScriptRunTime')) { echo Debug::displayLogTime(); }
				}
			} else {
				trigger_error('Route "' . $uri . '" incorrectly setup. Contact Support!', E_USER_ERROR);
			}
		}
	}
}
