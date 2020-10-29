<?php
namespace common\lib\wechat\v1\util\Messages\Raw;
use EasyWeChat\Kernel\Messages\Raw;

/**
 * Class RawFactory
 * @package common\lib\wechat\v1\util\Messages\Raw
 * 原始消息
原始消息是一种特殊的消息，它的场景是：你不想使用其它消息类型，你想自己手动拼消息。比如，
 * 回复消息时，你想自己拼 XML，那么你就直接用它就可以了：
 * @example
 * $message = new Raw('<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[media_id]]></MediaId>
</Image>
</xml>');
 * 比如，你要用于客服消息(客服消息是JSON结构)：

use EasyWeChat\Kernel\Messages\Raw;

$message = new Raw('{
"touser":"OPENID",
"msgtype":"text",
"text":
{
"content":"Hello World"
}
}');
 */
class RawFactory
{
	static function NewRaw($content="")
	{
		return new Raw($content);
	}
}