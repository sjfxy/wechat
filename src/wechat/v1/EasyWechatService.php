<?php
namespace common\lib\wechat\v1;
use common\lib\wechat\v1\Exception\Wechatuthorzition;
use common\lib\wechat\v1\models\WechatRegister;
use common\lib\wechat\v1\models\v1\WechatConfig;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\ServiceContainer;
use yii\redis\RedisM;

/**
 * Class EasyWechatService
 * @package common\lib\wechat\v1
 * EasyWechat服务
 */
class EasyWechatService
{
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig
	 * @param \yii\redis\RedisM $redisM
	 * @return bool|string
	 */
	private static function Config(EasyWechatConfig $easyWechatConfig, \yii\redis\RedisM $redisM)
	{
		$cachKey = sprintf($easyWechatConfig->cahce_key, $easyWechatConfig->appid);
		$redis = $redisM->getRedis();
		$config = $redis->get($cachKey);
		if (!empty($config)) {
			return json_decode($config, true);
		}
		$wechatConfigModel = WechatConfig::findOne(['appid' => $easyWechatConfig->appid]);
		if (empty($wechatConfigModel)) {
			throw  new Wechatuthorzition(Wechatuthorzition::NeedAuthationMessage);
		}
		$config = self::WechatModelMappingConfig($wechatConfigModel);//查询config
		if (!empty($config['app_id'])) {
			$redis->setex($cachKey, $easyWechatConfig->ttl, json_encode($config, 320));
		}
		
		return $config;
	}
	
	
	public static function WechatModelMappingConfigLocal(EasyWechatConfig $Config):array
	{
		$config = [];
		$config['app_id'] = $Config->appid;
		$config['secret'] = $Config->secret;
		$config['token'] = $Config->token;
		$config['aes_key'] = $Config->aes_key;
		$config['type'] = $Config->type;
		$config['response_type'] = empty($Config->response_type)?EasyWechatResponseType::ARRAY:$Config->response_type;
		return $config;
	}
	/**
	 * @param EasyWechatConfig $easyWechatConfig 配置参数中心
	 * @return ServiceContainer
	 */
	public static function QueryEasyWechatApplicationLocal(EasyWechatConfig $easyWechatConfig):ServiceContainer
	{
		try{
			
			$orgininal_config_v1 = self::WechatModelMappingConfigLocal($easyWechatConfig);
			$type = $orgininal_config_v1['type'];
			unset($orgininal_config_v1['type']);
			$config = $orgininal_config_v1;
			$app = Factory::officialAccount($config);//默认返回
			switch ($type){
				case EasyWechatType::officialAccountNo:
					$app = Factory::officialAccount($config);
					break;
				case EasyWechatType::paymentNo:
					$app = Factory::payment($config);
					break;
				case EasyWechatType::miniProgramNo:
					$app = Factory::miniProgram($config);
					break;
				case EasyWechatType::workNo:
					$app = Factory::work($config);
					break;
				case EasyWechatType::openWorkNo:
					$app = Factory::openWork($config);
					break;
				case EasyWechatType::microMerchantNo:
					$app = Factory::microMerchant($config);
					break;
				default:
					$app= new EmptyContainer();
					break;
			}
			return $app;
		}catch (Wechatuthorzition $exception){
			return new EmptyContainer($exception->getMessage());
		}catch (\Throwable $exception){
			return new EmptyContainer($exception->getMessage());
		}
	}
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig 配置参数类型
	 * @return WechatConfig 返回模型
	 */
	public static  function QueryEasApplication(EasyWechatConfig $easyWechatConfig,\yii\redis\RedisM $redisM):ServiceContainer
	{
	    try{
	    	
	        $orgininal_config_v1 = self::Config($easyWechatConfig,$redisM);
		    $type = $orgininal_config_v1['type'];
		    unset($orgininal_config_v1['type']);
	        $config = $orgininal_config_v1;
		    $app = Factory::officialAccount($config);//默认返回
	        switch ($type){
		        case EasyWechatType::officialAccountNo:
			        $app = Factory::officialAccount($config);
		        	break;
		        case EasyWechatType::paymentNo:
			        $app = Factory::payment($config);
		        	break;
		        case EasyWechatType::miniProgramNo:
		        	$app = Factory::miniProgram($config);
		        	break;
		        case EasyWechatType::workNo:
		        	$app = Factory::work($config);
		        	break;
		        case EasyWechatType::openWorkNo:
		        	$app = Factory::openWork($config);
		        	break;
		        case EasyWechatType::microMerchantNo:
		        	$app = Factory::microMerchant($config);
		        	break;
		        default:
		        	$app= new EmptyContainer();
		        	break;
	        }
	        return $app;
	    }catch (Wechatuthorzition $exception){
	    	return new EmptyContainer($exception->getMessage());
	    }catch (\Throwable $exception){
		    return new EmptyContainer($exception->getMessage());
	    }
	
	}
	
	/**
	 * @param EasyWechatConfig $easyWechatConfig
	 * @return array
	 *  $config = [
	'app_id' => 'wxb5413ab9a7396446',
	'secret' => '137349a973f41edb20c6d05c8fef0ea6',
	'token' => 'sinlovefxy1314',
	'aes_key'=>"owoDT6Pddi8qWUYqjlLsNlijZXjI",
	'response_type' => 'array',
	//...
	];
	 */
	public static function WechatModelMappingConfig(WechatConfig $Config):array
	{
		$config = [];
		$config['app_id'] = $Config->appid;
		$config['secret'] = $Config->appsecret;
		$config['token'] = $Config->token;
		$config['aes_key'] = $Config->ase_key;
		$config['type'] = $Config->type;
		$config['response_type'] = empty($Config->response_type)?EasyWechatResponseType::ARRAY:$Config->response_type;
		return $config;
	}
	
	/**
	 * 平台入驻
	 * 为了不是有对应的我们的模型
	 * 这个是业务相关的模型
	 *
	 */
	public static function Register(WechatRegister $wechatRegister,RedisM $redisM)
	{
	    try{
	    	$cache = [];
	    	$wechatConfigModel = new WechatConfig();
	    	$wechatConfigModel->appid = $wechatRegister->appid;
	    	$wechatConfigModel->token = $wechatRegister->token;
	    	$wechatConfigModel->type = $wechatRegister->type;
	    	$wechatConfigModel->appsecret = $wechatRegister->secret;
	    	$wechatConfigModel->ase_key = $wechatRegister->aes_key;
	    	$wechatConfigModel->response_type = $wechatRegister->response_type;
	    	$wechatConfigModel->created_at = time();
	    	$wechatConfigModel->save(false);
	    	
	    	$cache['appid'] = $wechatConfigModel->appid;
	    	$cache['token'] = $wechatConfigModel->token;
	    	$cache['type'] = $wechatConfigModel->type;
	    	$cache['appsecret'] = $wechatConfigModel->appsecret;
	    	$cache['ase_key'] = $wechatConfigModel->ase_key;
	    	$cache['response_type'] = $wechatConfigModel->response_type;
	    	
		
		    $cachKey = sprintf($wechatRegister->cahce_key,$wechatRegister->appid);
		    $redis = $redisM->getRedis();
		    $redis->setex($cachKey,$wechatRegister->ttl,json_encode($cache,320));
		    
		    return true;
		    
	    }catch (\Throwable $exception){
	       throw new \Exception($exception->getMessage());
	    }
	}
}