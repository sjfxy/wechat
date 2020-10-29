<?php
namespace common\lib\wechat\v1;
use EasyWeChat\Kernel\ServiceContainer;

class EmptyContainer extends ServiceContainer
{
  public $errMesage="";
  public function __construct(string $message="",array $config = [], array $prepends = [], string $id = null)
  {
  	  $this->errMesage = $message;
	  parent::__construct($config, $prepends, $id);
  }
}