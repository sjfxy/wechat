<?php
	namespace common\lib\wechat\v1\Exception;
	use Throwable;
	
	class CommonException extends \Exception {
		public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
		{
			parent::__construct($message, $code, $previous);
		}
	}