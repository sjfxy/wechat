<?php
namespace common\lib\wechat\v1\util\Messages\Imgae;
use EasyWeChat\Kernel\Messages\Image;

/**
 * Class ImageFactory
 * @package common\lib\wechat\v1\util\Messages\Imgae
 * 图片信息工厂类
 */
class ImageFactory
{
	static function NewImage($media_id=""){
		return new Image($media_id);
	}
}