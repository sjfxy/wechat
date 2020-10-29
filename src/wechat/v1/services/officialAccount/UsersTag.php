<?php
namespace common\lib\wechat\v1\services\officialAccount;
/**
 * Interface UsersTag
 * @package common\lib\wechat\v1\services\officialAccount
 *
 */
interface UsersTag
{
	//获取所有标签
	/**
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function list($app);
	
	//创建标签
	
	/**
	 * @param $name 名称
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function create($name,$app);
	
	/**
	 * @param $tagId 目标ID
	 * @param $name 标签的名称
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function update($tagId,$name,$app);
	
	/**删除标签
	 * @param $tagId
	 * @param $app \EasyWeChat\OfficialAccount\Application
	 * @return mixed
	 */
	public static function delete($tagId,$app);
	
	/**获取指定 openid 用户所属的标签
	 * @param $openId 用户openId
	 * @param $app
	 * @return mixed
	 * $userTags = $app->user_tag->userTags($openId);
	//
	// {
	//     "tagid_list":["标签1","标签2"]
	// }
	 */
	public static function userTags($openId,$app);
	
	//获取标签下用户列表
	
	/**
	 * @param $tagId
	 * @param string $nextOpenId
	 * @param $app
	 * @return mixed
	 * // $nextOpenId：第一个拉取的OPENID，不填默认从头开始拉取
	
	// {
	//   "count":2, // 这次获取的粉丝数量
	//   "data":{ // 粉丝列表
	//      "openid":[
	//          "ocYxcuAEy30bX0NXmGn4ypqx3tI0",
	//          "ocYxcuBt0mRugKZ7tGAHPnUaOW7Y"
	//      ]
	//   },
	//   "next_openid":"ocYxcuBt0mRugKZ7tGAHPnUaOW7Y"//拉取列表最后一个用户的openid
	// }
	 */
	public static function usersofTag($tagId,$nextOpenId='',$app);
	
	/**
	 * @param $openIds
	 * @param $tagId
	 * @param $app
	 * @return mixed
	批量为用户添加标签
	$openIds = [$openId1, $openId2, ...];
	$app->user_tag->tagUsers($openIds, $tagId)
	 */
	public static function tagUsers($openIds,$tagId,$app);
	
	/**
	 * @param $openIds
	 * @param $tagId
	 * @return mixed
	 * 批量为用户移除标签
	 */
	public static function untagUsers($openIds, $tagId);
	
	
}