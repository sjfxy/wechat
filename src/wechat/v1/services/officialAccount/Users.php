<?php
namespace common\lib\wechat\v1\services\officialAccount;
/**
 * Interface Users
 * @package common\lib\wechat\v1\services\officialAccount
 * 用户接口
 * 用户信息的获取是微信开发中比较常用的一个功能了，以下所有的用户信息的获取与更新，都是基于微信的 openid 的，
 * 并且是已关注当前账号的，其它情况可能无法正常使用。
 */
interface Users
{
	/**
	 * @param $openId
	 * @param  $app app实例
	 * @return mixed
	 * 获取单个用户信息
	 */
	public static function getOne($openId,$app);
	
	
	/**
	 * @param array $openIds
	 * @param $app
	 * @return mixed
	 * 获取多个
	 */
	public static function select($openIds=array(),$app);
	
	/**
	 * @param null $nextOpenId
	 * @param $app
	 * @return mixed
	 * 获取用户列表
	 */
	public static function list($nextOpenId=null,$app);
	
	//修改用户备注
	
	/**修改用户备注
	$app->user->remark($openId, $remark); // 成功返回boolean
	 * @param $openId
	 * @param $remark
	 * @param $app
	 * @return boolean
	 * @example
	 * $app->user->remark($openId, "僵尸粉");
	 */
	public static function remark($openId,$remark,$app);
	
	
	/**
	 * @param $openid array | string
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 * @example
	 * 拉黑用户
	$app->user->block('openidxxxxx');
	// 或者多个用户
	$app->user->block(['openid1', 'openid2', 'openid3', ...]);
	 */
	public static function block($openid,$app);
	
	/**
	 * @param $openid
	 * @param $app
	 * @return mixed
	 * @example
	 * 取消拉黑用户
	$app->user->unblock('openidxxxxx');
	// 或者多个用户
	$app->user->unblock(['openid1', 'openid2', 'openid3', ...]);
	 */
	public static function unblock($openid,$app);
	
	/**
	 * @param null $beginOpenid
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 * 获取黑名单
	$app->user->blacklist($beginOpenid = null); // $beginOpenid 可选
	 */
	public static function blacklist($beginOpenid=null,$app);
	
	//账号迁移openid 转换
	
	/**
	 * @param $oldAppId
	 * @param $openidList
	 * @return mixed
	 * @example
	 * 账号迁移 openid 转换
	账号迁移请从这里了解：https://kf.qq.com/product/weixinmp.html#hid=2488
	
	微信用户关注不同的公众号，对应的 OpenID 是不一样的，迁移成功后，粉丝的 OpenID 以目标帐号（即新公众号）对应的 OpenID 为准。但开发者可以通过开发接口转换 OpenID，开发文档可以参考： 提供一个 openid 转换的 API 接口，当帐号迁移后，可以通过该接口：
	
	将原帐号粉丝的 openid 转换为新帐号的 openid。
	将有授权关系用户的 openid 转换为新帐号的 openid。
	将卡券关联用户的 openid 转换为新帐号的 openid。
	◆ 原帐号：准备要迁移的帐号，当审核完成且管理员确认后即被回收。
	◆ 新帐号：用来接纳粉丝的帐号。新帐号在整个流程中均能正常使用。
	一定要按照下面的步骤来操作。
	
	一定要在原帐号被冻结之前，最好是准备提交审核前，获取原帐号的用户列表。如果没有原帐号的用户列表，用不了转换工具。如果原账号被回收，这时候也没办法调用接口获取用户列表。
	
	{info} 如何获取用户列表见这里：https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140840
	
	转换 openid 的 API 接口如下，可在帐号迁移审核完成后开始调用，并最多保留15天。若帐号迁移没完成，调用时无返回结果或报错。帐号迁移15天后，该转换接口将会失效、无法拉取到数据。
	 */
	public static function changeOpenId($oldAppId,$openidList);
	
	
}