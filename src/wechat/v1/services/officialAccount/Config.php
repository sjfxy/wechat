<?php
namespace common\lib\wechat\v1\services\officialAccount;
use common\lib\wechat\v1\EasyWechatConfig;

/**
 * Interface Config
 * @package common\lib\wechat\v1\services
 */
interface Config
{
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig
	 * @return EasyWechatConfig
	 * 配置参数
	 */
	public function setConfig(EasyWechatConfig $easyWechatConfig):EasyWechatConfig;
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig
	 * @return EasyWechatConfig
	 * 获取配置
	 */
	public function getConfig(EasyWechatConfig $easyWechatConfig):EasyWechatConfig;
	
	
	/**
	 * @return array
	 * 获取全部配置的模板
	 * 可以进行返回即可
	 * 然后可以进行使用设置配置 获取配置 这个在初始化的时候可以进行处理
	 */
	public function getFullConfigTempalte():array ;
	
	
}