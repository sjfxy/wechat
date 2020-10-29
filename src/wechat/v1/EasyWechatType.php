<?php
namespace common\lib\wechat\v1;
/**
 * Class EasyWechatType
 * @package common\lib\wechat\v1
 * 企业微信类型
 */
class EasyWechatType{
   const openPlatform = "微信开发平台第三方平台";
   const work = "企业微信";
	const workNo = 4;
   const openWork = "企业微信开发平台";
	const openWorkNo = 5;
   const microMerchant = "小微商户";
	const microMerchantNo = 6;
	const miniProgram = "小程序";
	const miniProgramNo = 3;
   const payment = "微信支付";
	const paymentNo = 2;
   const officialAccount = "公众号";//个人普通的公众号 1
	const officialAccountNo = 1;//个人普通的公众号 1
   const MappingArry =[
   	   self::officialAccount=>1,
	   self::payment=>2,
	   self::miniProgram=>3,
	   self::work=>4,
	   self::openWork=>5,
	   self::microMerchant=>6,
   ];
}