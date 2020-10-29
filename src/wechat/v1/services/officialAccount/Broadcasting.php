<?php
namespace common\lib\wechat\v1\services\officialAccount;
use EasyWeChat\Kernel\Messages\Message;

/**
 * Interface Broadcasting
 * @package common\lib\wechat\v1\services\officialAccount
 * 群发接口
 */
interface Broadcasting
{
	/**
	 * @param Message $message
	 * @param null $to
	 * @return mixed
	 * 当 $to 为整型时为标签 id
	当 $to 为数组时为用户的 openid 列表（至少两个用户的 openid）
	当 $to 为 null 时表示全部用户
	 */
	public static function sendMessage(Message $message,$to=null,$app);
	
	/**
	 * @param $content
	 * @param null $to
	 * @return mixed
	 * 文本消息
	 * $app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。");
	
	// 指定目标用户
	// 至少两个用户的 openid，必须是数组。
	$app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。", [$openid1, $openid2]);
	
	// 指定标签组用户
	$app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。", $tagId); // $tagId 必须是整型数字
	 */
	public static function sendText($content,$to=null,$app);
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * $app->broadcasting->sendNews($mediaId);
	$app->broadcasting->sendNews($mediaId, [$openid1, $openid2]);
	$app->broadcasting->sendNews($mediaId, $tagId);
	 * 图文消息
	 */
	public static function sendNews($mediaId,$to=null,$app);
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @param $app
	 * @return mixed
	 * 图片消息
	$app->broadcasting->sendImage($mediaId);
	$app->broadcasting->sendImage($mediaId, [$openid1, $openid2]);
	$app->broadcasting->sendImage($mediaId, $tagId);
	 */
	public static function sendImage($mediaId,$to=null,$app);
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * 语音消息
	$app->broadcasting->sendVoice($mediaId);
	$app->broadcasting->sendVoice($mediaId, [$openid1, $openid2]);
	$app->broadcasting->sendVoice($mediaId, $tagId);
	 */
	public static function sendVoice($mediaId,$to=null,$app);
	
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * 视频消息
	用于群发的视频消息，需要先创建消息对象，
	
	// 1. 先上传视频素材用于群发：
	$video = '/path/to/video.mp4';
	$videoMedia = $app->media->uploadVideoForBroadcasting($video, '视频标题', '视频描述');
	
	// 结果如下：
	//{
	//  "type":"video",
	//  "media_id":"IhdaAQXuvJtGzwwc0abfXnzeezfO0NgPK6AQYShD8RQYMTtfzbLdBIQkQziv2XJc",
	//  "created_at":1398848981
	//}
	
	// 2. 使用上面得到的 media_id 群发视频消息
	$app->broadcasting->sendVideo($videoMedia['media_id']);
	 */
	public static function sendVideo($mediaId,$to=null,$app);
	
	/**
	 * // 1. 先上传视频素材用于群发：
	$video = '/path/to/video.mp4';
	$videoMedia = $app->media->uploadVideoForBroadcasting($video, '视频标题', '视频描述');
	 * @param string $path
	 * @param string $title
	 * @param string $description
	 * @return mixed
	 */
	public static function uploadVideoForBroadcasting(string  $path,$title="",$description="",$app);
	
	
	/**
	 * @param $cardId
	 * @param null $to
	 * @return mixed
	 * 卡券消息
	$app->broadcasting->sendCard($cardId);
	$app->broadcasting->sendCard($cardId, [$openid1, $openid2]);
	$app->broadcasting->sendCard($cardId, $tagId);
	 */
	public static function sendCard($cardId,$to=null,$app);
	
	
	// 发送预览群发消息给指定的 openId 用户
	
	//文本
	public static function previewText($text, $openId,$app);
	
	//图文消息
	public static function previewNews($mediaId, $openId,$app);
	
	//声音
	public static function previewVoice($mediaId, $openId,$app);
	
	public static function previewImage($mediaId, $openId,$app);
	
	public static function previewVideo($message, $openId,$app);
	
	public static function previewCard($cardId, $openId,$app);
	
	
	//发送预览群发消息给指定的微信号用户
	
	// $wxanme 是用户的微信号，比如：notovertrue
	public static function previewTextByName($text, $wxname,$app);

	public static function previewNewsByName($mediaId, $wxname,$app);
	
	public static function previewVoiceByName($mediaId, $wxname,$app);
	
	public static function previewImageByName($mediaId, $wxname,$app);
	
	public static function previewVideoByName($message, $wxname,$app);
	
	public static function previewCardByName($cardId, $wxname,$app);
	
	/**
	 * @param $msgId
	 * @return mixed删除群发消息
	$app->broadcasting->delete($msgId);
	 */
	public static function delete($msgId,$app);
	
	//查询群发消息发送状态
	public static function status($msgid,$app);
	
	
	
	
	
	
	
}