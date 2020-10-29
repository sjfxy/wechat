<?php
namespace common\lib\wechat\paywx;
/**
 * Class WxPayConfig
 * @package common\lib\wechat\paywx
 * 微信支付配置中心
 */
class WxPayConfig{
	//默认的记录的日志配置
	const  logfile = '/home/y/var/log/runtime/wechat/v2_wechat_notify_wap.log';
	/**
	 * @var array
	 * 微信支付的配置中心
	 */
	public  static $config = [
	// 必要配置
'app_id'             => 'xxxx', //微信公众号id
'mch_id'             => 'your-mch-id',//对应的商户的id
'key'                => 'key-for-signature',   // API 密钥 api秘钥
	// 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！绝对路径即可
'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
'notify_url'         => 'https://pay.weixin.qq.com/wxpay/pay.action',     // 你也可以在下单时单独设置来想覆盖它
];
	public static function Config():array
	{
	   return self::$config;
	}
}