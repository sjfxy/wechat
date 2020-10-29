<?php
namespace common\lib\wechat\v1\cores\officialAccount;
use common\lib\wechat\v1\Exception\officialAccount\CoustomerExcepetion;
use common\lib\wechat\v1\services\officialAccount\Coustomer;
use EasyWeChat\Kernel\Messages\Message;

/**
 * Class CoustomerImp
 * @package common\lib\wechat\v1\cores\officialAccount
 */
class CoustomerImp implements Coustomer
{
	
	/**
	 * @param Message $message
	 * @param null $to
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function message(Message $message, $to = null, $app)
	{
		try{
		 /**@var $app \EasyWeChat\OfficialAccount\Application **/
		 return $app->customer_service->message($message)->to($to)->send();
		}catch (\Throwable $exception){
			throw new CoustomerExcepetion($exception->getMessage());
		}
	}
}