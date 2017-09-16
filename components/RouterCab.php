<?php

class RouterCab{
    private $routes;

    public function __construct(){
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

	private function getURI(){
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function runCab(){
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

            if(preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $pathCab = array_shift($segments);
                if(!isset($_SESSION['cabinet'])) return 'site';
                $N = count($_SESSION['cabinet']);
                for ($i=0; $i<$N;  $i++){
                    if($_SESSION['cabinet'][$i] == $pathCab) return $pathCab;
//                    echo $_SESSION['cabinet'][$i];
                }
			}

		}
		return 'site';
	}
}


