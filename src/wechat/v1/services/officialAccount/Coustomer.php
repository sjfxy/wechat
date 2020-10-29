<?php
namespace common\lib\wechat\v1\services\officialAccount;
use EasyWeChat\Kernel\Messages\Message;

interface Coustomer
{
	/**
	 * @param Message $message
	 * @param null $to
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function message(Message $message,$to=null,$app);
}