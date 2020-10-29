<?php
namespace common\lib\wechat\v1\util\Messages\Text;
use EasyWeChat\Kernel\Messages\Text;

/**
 * Class TextFactory
 * @package common\lib\wechat\v1\util\Messages\Text
 * 文本信息工厂
 */
class TextFactory
{
   static function NewText(string  $content)
   {
   	return new Text($content);
   }
}