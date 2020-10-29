<?php
namespace common\lib\wechat\v1\util\Messages\Video;
use EasyWeChat\Kernel\Messages\Video;

class VideoFactory
{
	/**
	 * @param string $title
	 * @param string $descrption
	 * @param string $media_id
	 * @param string $thumb_media_id
	 * title 标题
	description 描述
	media_id 媒体资源 ID
	thumb_media_id 封面资源 ID
	 */
	static function NewVideo($title="",$descrption="",$media_id="",$thumb_media_id="")
	{
		$attributes = [];
		$attributes['title'] = $title;
		$attributes['description'] = $descrption;
		$attributes['thumb_media_id'] = $thumb_media_id;
	    return new Video($media_id,$attributes);
	}
}