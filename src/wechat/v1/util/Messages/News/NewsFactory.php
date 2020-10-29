<?php
namespace common\lib\wechat\v1\util\Messages\News;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

/**
 * Class NewsFactory
 * @package common\lib\wechat\v1\util\Messages\News
 * 图信息工厂类
 */
class NewsFactory
{
	/**
	 * @param $title
	 * @param string $descrption
	 * @param $image
	 * @param $url
	 * @return NewsItem
	 * 返回对应的图文信息里面的item信息
	 */
	static function NewItem($title,$descrption="",$image,$url)
	{
		return new NewsItem([
			'title'       => $title,
			'description' => $descrption,
			'url'         => $url,
			'image'       => $image]);
	}
	
	/**
	 * @param array $item
	 * @return News|void
	 * 返回里面的信息即可
	 */
	static function NewNews($item=array())
	{
		if(empty($item)) return;
		return new News($item);
	}
}