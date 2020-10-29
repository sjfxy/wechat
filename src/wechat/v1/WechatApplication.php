<?php
namespace common\lib\wechat\v1;
/**
 * Class Application
 * @package common\lib\wechat\v1
 * 获取对应的信息
 */
class WechatApplication{
	/*
	 *结合Yii框架进行处理
	 */
	public static  function App(string $appid)
	{
	    try{
	       $weChatConfig = new EasyWechatConfig($appid=$appid);
	       $app = EasyWechatService::QueryEasApplication($weChatConfig,\Yii::$app->redis);
	       return $app;
	    }catch (\Throwable $exception){
	       return new EmptyContainer($exception->getMessage());
	    }
	}
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig
	 * @return EmptyContainer|\EasyWeChat\Kernel\ServiceContainer
	 * 返回本地的处理
	 */
	public static  function AppLocal(EasyWechatConfig $easyWechatConfig)
	{
		try{
			$app = EasyWechatService::QueryEasyWechatApplicationLocal($easyWechatConfig);
			return $app;
		}catch (\Throwable $exception){
			return new EmptyContainer($exception->getMessage());
		}
	}
}