<?
namespace App\Routes;

class Router
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
		$arr = require __DIR__.'/../../config/routes.php';

		foreach ($arr as $key => $val) {
			$this->addRoutes($key,$val);
		}
	}
	private function parsePer($route)
	{
		if(preg_match_all('/\{.*?}/', $route, $match))
		{
			$route = explode('/', $route);
			foreach ($route as $key => $r) {
				if($match[0][0] == $r)
				{
					$route[$key] = $match[0][0];
					$arr['route'] = $route;
					$arr['per'] = $key;
					return $arr;
				}
			}
		}
		else
		{
			return false;
		}
	}
	public function addRoutes($route, $params)
	{
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}
	public function matchRoutes()
	{
		$url = $_SERVER['REQUEST_URI'];
		foreach ($this->routes as $route => $params) {
			$per = $this->parsePer($route);
			if($per != false)
			{
				if($route == implode($per['route'], '/'))
				{
					$key = explode('/', $url)[$per['per']];
					$this->params = $params;
					return $key;
				}
			}
			else
			{
				if(preg_match($route, $url, $matches))
				{
					$this->params = $params;
					return true;
				}
			}
			
			
		}
		return false;
	}
	public function run()
	{
		if($this->matchRoutes() != false)
		{
			
			$key = $this->matchRoutes();

			$params = explode('@', $this->params);
			if(count($params) == 2)
			{
				$path = 'App\Controllers\\'.ucfirst(array_shift($params));
				$method = array_shift($params);
				if(class_exists($path))
				{
					if(method_exists($path, $method))
					{
						$controller = new $path;
						$controller->$method($key);
					}
					else
					{
						echo "no method - ".$method;
					}
				}
				else
				{
					echo "no controller - ".$path;
				}
			}
			else
			{
				echo "false";
			}
		}
		else
		{
			echo "false";
		}
		
	}

}