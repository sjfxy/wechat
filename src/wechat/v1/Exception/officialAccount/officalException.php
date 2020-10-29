<?php
namespace common\lib\wechat\v1\Exception\officialAccount;
use Throwable;

class officalException extends \Exception{
	public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}