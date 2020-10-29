<?php
namespace common\lib\wechat\v1\services\officialAccount;
interface Basic{
	//清理接口调用次数
	/**
	 * @param string $appid 公众号appid
	 * @return mixed
	 */
	public static function clearQuota(string $appid);
	
	/**
	 * @param string $appid 公众号appid
	 * @return mixed
	 * 获取微信服务器 IP (或IP段)
	 */
	public static  function getValidIps(string  $appid);
}
