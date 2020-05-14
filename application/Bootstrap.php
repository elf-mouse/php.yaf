<?php
/**
 * @name Bootstrap
 * @author Elf-mousE
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract {
	/**
	 * 加载核心目录
	 */
	public function _initCore()
	{
		//如自定义一些公共核心类，如基类控制器、基类模型等
	}

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $arrConfig);
	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initLib() {
		//加载公共通过类
	}

	public function _initRoute(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
		$router = $dispatcher->getRouter();
		$router->addConfig(Yaf_Registry::get('config')->routes);
	}

	public function _initView(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
	}

	public function _initComposerAutoload(Yaf_Dispatcher $dispatcher)
    {
        $autoload = APP_PATH . '/vendor/autoload.php';
        if (file_exists($autoload)) {
            Yaf_Loader::import($autoload);
        }
	}
}
