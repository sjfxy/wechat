<?php
namespace common\lib\wechat\v1\cores\officialAccount;
use common\lib\wechat\v1\EmptyContainer;
use common\lib\wechat\v1\Exception\officialAccount\officalException;
use common\lib\wechat\v1\services\officialAccount\Basic;
use common\lib\wechat\v1\WechatApplication;

class BasicImp implements Basic
{
	
	//清理接口调用次数
	/**
	 * @param string $appid 公众号appid
	 * @return mixed
	 */
	public static function clearQuota(string $appid)
	{
		try {
			/**@var  $app \EasyWeChat\OfficialAccount\Application* */
			$app = WechatApplication::App($appid);
			if ($app instanceof EmptyContainer) {
				return $app;
			}
			return $app->base->clearQuota();
		} catch (\Throwable $exception){
		  throw new officalException($exception->getMessage());
		}
	}
	/**
	 * @param string $appid 公众号appid
	 * @return mixed
	 * 获取微信服务器 IP (或IP段)
	 */
	public static  function getValidIps(string $appid)
	{
		try{
			/**@var  $app \EasyWeChat\OfficialAccount\Application**/
			$app = WechatApplication::App($appid);
			if($app instanceof EmptyContainer){
				return $app;
			}
			return $app->base->getValidIps();
		}
		catch (\Throwable $exception){
			throw new officalException($exception->getMessage());
		}
	}
	
}