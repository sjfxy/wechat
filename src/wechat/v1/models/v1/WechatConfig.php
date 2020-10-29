<?php
namespace common\lib\wechat\v1\models\v1;

/**
 * Class WechatConfig
 * @package common\models\v1
 * @property integer $id
 * @property string $appid
 * @property  string $appsecret
 * @property string $token
 * @property  string $ase_key
 * @property  integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property  integer $is_del
 * @property  string $response_type
 * @property integer $type 类型
 */
class WechatConfig extends BaseActiveRecord
{
public static function tableName()
{
	return "wechat_config";
}
public function attributeLabels()
{
	return [
		'id'=>'ID',
		'appid'=>'APPID',
		'appsecret'=>'APPSECRET',
		"token"=>"token",
		"ase_key"=>"ase_key",
		"created_at"=>"创建时间",
		"response_type"=>'响应类型',
	];
}
	public function beforeSave($insert)
	{
		if ($insert) {
			if ($this->hasAttribute('created_at')) {
				$this->created_at = CUR_TIMESTAMP;
				$this->status = 1;
				$this->is_del = 1;
			}
		} elseif ($this->hasAttribute('updated_at')) {
			$this->updated_at = CUR_TIMESTAMP;
		}
		
		return parent::beforeSave($insert);
	}
}
