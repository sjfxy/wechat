<?php
namespace common\lib\wechat\v1\Exception;
use Throwable;

/**微信没有进行注册我们的数据库本身的异常
 * Class Wechatuthorzition
 * @package common\lib\wechat\v1\Exception
 *
 */
class Wechatuthorzition extends CommonException
{
	const NeedAuthationMessage = "请在我们的平台进行入驻!";
	public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}