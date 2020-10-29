<?php
	namespace common\lib\wechat\v1\util\Messages\Video;
	use EasyWeChat\Kernel\Messages\Video;
	use EasyWeChat\Kernel\Messages\Voice;
	
	class VoiceFactory
	{
		/**
		 * @param string $mediaId media_id 媒体资源 ID
		 * @return Voice
		 */
		static function NewVoice($mediaId="")
		{
			return new Voice($mediaId);
		}
	}