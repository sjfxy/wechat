<?php
namespace common\lib\wechat\v1\util\Messages\Media;
use EasyWeChat\Kernel\Messages\Media;

/**
 * Class MediaFactory
 * @package common\lib\wechat\v1\util\Messages\Media
 * $type 素材类型，目前只支持：mpnews、 mpvideo、voice、image 等。
$mediaId 素材 ID，从接口查询或者上传后得到。
 */
class MediaFactory
{
	const MPNNEWS = "mpnews";
	const MPVIDEO = "mpvideo";
	const VOICE  = "voice";
	const IMAGE = "image";
	static function NewMedia($mediaId,$type=self::MPNNEWS)
	{
		return new Media($mediaId,$type);
	}
}