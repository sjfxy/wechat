<?php
namespace common\lib\wechat\v1\cores\officialAccount;
use common\lib\wechat\v1\Exception\officialAccount\TemplateException;
use common\lib\wechat\v1\services\officialAccount\TemplateMessage;

class TemplateMessageImp implements TemplateMessage
{
	
	/**修改账号所属行业
	 * @param $industryId1
	 * @param $industryId2
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function setIndustry($industryId1, $industryId2, $app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->setIndustry($industryId1,$industryId2);
		}catch (\Throwable $exception){
		  return new TemplateException($exception->getMessage());
		}
	}
	
	/**
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function getIndustry($app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->getIndustry();
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	}
	
	/**
	 * @param $shortId
	 * @param $app
	 * @return mixed
	 */
	public static function addTemplate($shortId, $app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->addTemplate($shortId);
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	
	}
	
	/**
	 * @param $app
	 * @return mixed
	 * 获取所有模板列表
	 */
	public static function getPrivateTemplates($app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->getPrivateTemplates();
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	}
	
	/**
	 * @param $templateId
	 * @return mixed
	 */
	public static function deletePrivateTemplate($templateId, $app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->deletePrivateTemplate($templateId);
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	}
	
	/**
	 * @param array $template_config
	 * @param $app
	 * @return mixed
	 * @example
	 * $app->template_message->send([
	 * 'touser' => 'user-openid',
	 * 'template_id' => 'template-id',
	 * 'url' => 'https://easywechat.org',
	 * 'miniprogram' => [
	 * 'appid' => 'xxxxxxx',
	 * 'pagepath' => 'pages/xxx',
	 * ],
	 * 'data' => [
	 * 'key1' => 'VALUE',
	 * 'key2' => 'VALUE2',
	 * ...
	 * ],
	 * ]);
	 */
	public static function send($template_config = [], $app)
	{
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->send($template_config);
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	}
	
	/**
	 * @param array $send_template_config
	 * @param $app
	 * @return mixed
	 * @example
	 * $app->template_message->sendSubscription([
	 * 'touser' => 'user-openid',
	 * 'template_id' => 'template-id',
	 * 'url' => 'https://easywechat.org',
	 * 'scene' => 1000,
	 * 'data' => [
	 * 'key1' => 'VALUE',
	 * 'key2' => 'VALUE2',
	 * ...
	 * ],
	 * ]);
	 * 如果你想为发送的内容字段指定颜色，你可以将 "data" 部分写成下面 4 种不同的样式，不写 color 将会是默认黑色：
	 *
	 * 'data' => [
	 * 'foo' => '你好',  // 不需要指定颜色
	 * 'bar' => ['你好', '#F00'], // 指定为红色
	 * 'baz' => ['value' => '你好', 'color' => '#550038'], // 与第二种一样
	 * 'zoo' => ['value' => '你好'], // 与第一种一样
	 * ]
	 */
	public static function sendSubscription($send_template_config = [], $app) {
		try{
			/**@var $app \EasyWeChat\OfficialAccount\Application **/
			return $app->template_message->sendSubscription($send_template_config);
		}catch (\Throwable $exception){
			return new TemplateException($exception->getMessage());
		}
	}}