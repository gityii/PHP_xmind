<?php





/**----jsfl-----**/

class system{

	/**
	 * route
	 * 初始化路由
	 * @access public
	 */
	public static function route(){
		$route = isset($_GET['act'])?$_GET['act']:'other/default';
		$file = __ROOT__.'/act/'.$route.'.php';
		if (file_exists($file)) {
			return array(
			'act'=>$route,
			'route'=>$file
			);
		}else {
			return false;
		}
	}

}

//初始化路由
$_route = system::route();
//判断路由是否正确
if ($_route===false){
	exit('404');
}

