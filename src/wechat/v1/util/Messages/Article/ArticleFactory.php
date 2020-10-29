<?php
namespace common\lib\wechat\v1\util\Messages\Article;
use EasyWeChat\Kernel\Messages\Article;

class ArticleFactory
{
	
	/**
	 * @param string $title
	 * @param string $author
	 * @param string $content
	 * @param string $thumb_media_id
	 * @param string $digest
	 * @param string $source_url
	 * @param string $show_cover
	 * title 标题
	author 作者
	content 具体内容
	thumb_media_id 图文消息的封面图片素材id（必须是永久mediaID）
	digest 图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空
	source_url 来源 URL
	show_cover 是否显示封面，0 为 false，即不显示，1 为 true，即显示
	 *   protected $required = [
	'thumb_media_id',
	'title',
	'content',
	'show_cover',
	];
	 */
	static function NewArticle($title="",$author="",$content="",$thumb_media_id="",$digest="",$source_url="",$show_cover=""){
	  $aritcile = new Article();
	  $aritcile->title = $title;
	  $aritcile->author = $author;
	  $aritcile->content = $content;
	  $aritcile->thumb_media_id = $thumb_media_id;
	  $aritcile->digest = $digest;
	  $aritcile->source_url = $source_url;
	  $aritcile->show_cover = (int)$show_cover;
	  return $aritcile;
	}
}