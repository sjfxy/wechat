<?php
namespace common\lib\wechat\v1\cores\officialAccount;
use common\lib\wechat\v1\services\officialAccount\Broadcasting;
use EasyWeChat\Kernel\Messages\Message;

class BroadcastingImpl implements Broadcasting
{
	
	/**
	 * @param Message $message
	 * @param null $to
	 * @return mixed
	 * 当 $to 为整型时为标签 id
	 * 当 $to 为数组时为用户的 openid 列表（至少两个用户的 openid）
	 * 当 $to 为 null 时表示全部用户
	 */
	public static function sendMessage(Message $message, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->sendMessage($message,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
		
	}
	
	/**
	 * @param $content
	 * @param null $to
	 * @return mixed
	 * 文本消息
	 * $app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。");
	 *
	 * // 指定目标用户
	 * // 至少两个用户的 openid，必须是数组。
	 * $app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。", [$openid1, $openid2]);
	 *
	 * // 指定标签组用户
	 * $app->broadcasting->sendText("大家好！欢迎使用 EasyWeChat。", $tagId); // $tagId 必须是整型数字
	 */
	public static function sendText($content, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return	$app->broadcasting->sendText($content,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	 
		// TODO: Implement sendText() method.
	}
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * $app->broadcasting->sendNews($mediaId);
	 * $app->broadcasting->sendNews($mediaId, [$openid1, $openid2]);
	 * $app->broadcasting->sendNews($mediaId, $tagId);
	 * 图文消息
	 */
	public static function sendNews($mediaId, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return	$app->broadcasting->sendNews($mediaId,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	 
	}
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @param $app
	 * @return mixed|void
	 * 图片消息
	$app->broadcasting->sendImage($mediaId);
	$app->broadcasting->sendImage($mediaId, [$openid1, $openid2]);
	$app->broadcasting->sendImage($mediaId, $tagId);
	 */
	public static function sendImage($mediaId, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		
		try{
			return $app->broadcasting->sendImage($mediaId,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
		
	}
	
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * 语音消息
	 * $app->broadcasting->sendVoice($mediaId);
	 * $app->broadcasting->sendVoice($mediaId, [$openid1, $openid2]);
	 * $app->broadcasting->sendVoice($mediaId, $tagId);
	 */
	public static function sendVoice($mediaId, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->sendVoice($mediaId,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	/**
	 * @param $mediaId
	 * @param null $to
	 * @return mixed
	 * 视频消息
	 * 用于群发的视频消息，需要先创建消息对象，
	 *
	 * // 1. 先上传视频素材用于群发：
	 * $video = '/path/to/video.mp4';
	 * $videoMedia = $app->media->uploadVideoForBroadcasting($video, '视频标题', '视频描述');
	 *
	 * // 结果如下：
	 * //{
	 * //  "type":"video",
	 * //  "media_id":"IhdaAQXuvJtGzwwc0abfXnzeezfO0NgPK6AQYShD8RQYMTtfzbLdBIQkQziv2XJc",
	 * //  "created_at":1398848981
	 * //}
	 *
	 * // 2. 使用上面得到的 media_id 群发视频消息
	 * $app->broadcasting->sendVideo($videoMedia['media_id']);
	 */
	public static function sendVideo($mediaId, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->sendVideo($mediaId,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	/**
	 * // 1. 先上传视频素材用于群发：
	 * $video = '/path/to/video.mp4';
	 * $videoMedia = $app->media->uploadVideoForBroadcasting($video, '视频标题', '视频描述');
	 * @param string $path
	 * @param string $title
	 * @param string $description
	 * @return mixed
	 */
	public static function uploadVideoForBroadcasting(string $path, $title = "", $description = "", $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->media->uploadVideoForBroadcasting($path,$title,$description);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	/**
	 * @param $cardId
	 * @param null $to
	 * @return mixed
	 * 卡券消息
	 * $app->broadcasting->sendCard($cardId);
	 * $app->broadcasting->sendCard($cardId, [$openid1, $openid2]);
	 * $app->broadcasting->sendCard($cardId, $tagId);
	 */
	public static function sendCard($cardId, $to = null, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->sendCard($cardId,$to);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewText($text, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewText($text,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewNews($mediaId, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewNews($mediaId,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewVoice($mediaId, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewVoice($mediaId,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewImage($mediaId, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewImage($mediaId,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewVideo($message, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewVideo($message,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewCard($cardId, $openId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewCard($cardId,$openId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewTextByName($text, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewTextByName($text,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewNewsByName($mediaId, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewNewsByName($mediaId,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewVoiceByName($mediaId, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewVideoByName($mediaId,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewImageByName($mediaId, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewImageByName($mediaId,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewVideoByName($message, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewVideoByName($message,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function previewCardByName($cardId, $wxname, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->previewCardByName($cardId,$wxname);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	/**
	 * @param $msgId
	 * @return mixed删除群发消息
	$app->broadcasting->delete($msgId);
	 */
	public static function delete($msgId, $app)
	{
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->delete($msgId);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
	
	public static function status($msgid, $app) {
		/** @var $app \EasyWeChat\OfficialAccount\Application */
		try{
			return $app->broadcasting->status($msgid);
		}catch (\Throwable $exception){
			throw new \Exception($exception->getMessage());
		}
	}
}