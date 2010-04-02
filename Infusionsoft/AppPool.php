<?php
class Infusionsoft_AppPool{
	static protected $apps = array();
	
	public function __construct(){
			
	}
	
	public static function getApp($appHostname = ''){
		$appKey = strtolower($appHostname);
		if($appKey == '') $appKey = 'default';		
		if(array_key_exists($appKey, self::$apps)){
			return self::$apps[$appKey];	
		}		
		else{
			return null;
		}
	}
	
	public static function addApp($app, $appHostname = null){
		if(count(self::$apps) == 0) self::$apps['default'] = $app;
		$appKey = $appHostname;
		if($appHostname == null){
			$appKey = $app->getHostname();
		}
		self::$apps[$appKey] = $app;
	}
}