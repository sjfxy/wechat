<?php
namespace common\lib\wechat\paywx;
use EasyWeChat\Factory;

/**
 * Class Wxpay
 * @package common\lib\wechat\paywx
 * 微信支付生成的app应用
 */
class Wxpay {
	/**
	 * 返回默认的H5支付的实例
	 */
   public static function App()
   {
   	 $config = WxPayConfig::Config();//配置参数
	 $app = Factory::payment($config);
	 return $app;
   }
}