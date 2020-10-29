<?php
namespace common\lib\wechat\v1\services\officialAccount;
/**
 * Interface TemplateMessage
 * @package common\lib\wechat\v1\services\officialAccount
 * 模板消息服务接口
 */
/**
 * Interface TemplateMessage
 * @package common\lib\wechat\v1\services\officialAccount
 * 模板消息仅用于公众号向用户发送重要的服务通知，
 * 只能用于符合其要求的服务场景中，如信用卡刷卡通知，商品购买成功通知等。
 * 不支持广告等营销类消息以及其它所有可能对用户造成骚扰的消息。
 */
interface TemplateMessage
{
	/**修改账号所属行业
	 * @param $industryId1
	 * @param $industryId2
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function setIndustry($industryId1, $industryId2,$app);
	
	/**
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function getIndustry($app);
	
	//添加模板
	
	/**
	 * @param $shortId
	 * @param $app
	 * @return mixed
	 */
	public static function addTemplate($shortId,$app);
	
	/**
	 * @param $app
	 * @return mixed
	 * 获取所有模板列表
	 */
	public static function getPrivateTemplates($app);
	
	//删除模板
	
	/**
	 * @param $templateId
	 * @return mixed
	 */
	public static function deletePrivateTemplate($templateId,$app);
	
	/**
	 * @param array $template_config
	 * @param $app
	 * @return mixed
	 * @example
	 * $app->template_message->send([
	'touser' => 'user-openid',
	'template_id' => 'template-id',
	'url' => 'https://easywechat.org',
	'miniprogram' => [
	'appid' => 'xxxxxxx',
	'pagepath' => 'pages/xxx',
	],
	'data' => [
	'key1' => 'VALUE',
	'key2' => 'VALUE2',
	...
	],
	]);
	 */
	public static function send($template_config=[],$app);
	
	// 发送一次性订阅消息
	
	/**
	 * @param array $send_template_config
	 * @param $app
	 * @return mixed
	 * @example
	 * $app->template_message->sendSubscription([
	'touser' => 'user-openid',
	'template_id' => 'template-id',
	'url' => 'https://easywechat.org',
	'scene' => 1000,
	'data' => [
	'key1' => 'VALUE',
	'key2' => 'VALUE2',
	...
	],
	]);
	 * 如果你想为发送的内容字段指定颜色，你可以将 "data" 部分写成下面 4 种不同的样式，不写 color 将会是默认黑色：
	
	'data' => [
	'foo' => '你好',  // 不需要指定颜色
	'bar' => ['你好', '#F00'], // 指定为红色
	'baz' => ['value' => '你好', 'color' => '#550038'], // 与第二种一样
	'zoo' => ['value' => '你好'], // 与第一种一样
	]
	 */
	public static function sendSubscription($send_template_config=[],$app);
	
	
	
}