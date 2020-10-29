<?php
namespace common\lib\wechat\v1;
/**
 * Class EasyWechatConfig
 * @package common\lib\wechat\v1
 * EasyWechatConfig 默认配置信息
 */
class EasyWechatConfig{
	
	public $cahce_key ="easywechat:tom:%s";
	public $ttl  = 3600;
	public $type;//类型
	/**
	 * @var array 注入的配置参数
	 */
	public $config=array();
	/**
	 * @return string
	 */
	public function getSecret(): string
	{
		return $this->secret;
	}
	
	/**
	 * @param string $secret
	 */
	public function setSecret(string $secret): void
	{
		$this->secret = $secret;
	}
	
	/**
	 * @return string
	 */
	public function getToken(): string
	{
		return $this->token;
	}
	
	/**
	 * @param string $token
	 */
	public function setToken(string $token): void
	{
		$this->token = $token;
	}
	
	/**
	 * @return string
	 */
	public function getAesKey(): string
	{
		return $this->aes_key;
	}
	
	/**
	 * @param string $aes_key
	 */
	public function setAesKey(string $aes_key): void
	{
		$this->aes_key = $aes_key;
	}
	
	/**
	 * @return string
	 */
	public function getResponseType(): string
	{
		return $this->response_type;
	}
	
	/**
	 * @param string $response_type
	 */
	public function setResponseType(string $response_type): void
	{
		$this->response_type = $response_type;
	}
	/**
	 * @return string
	 */
	public function getAppid(): string
	{
		return $this->appid;
	}
	
	/**
	 * @param string $appid
	 */
	public function setAppid(string $appid): void
	{
		$this->appid = $appid;
	}
	
	/**
	 * @var string appid 微信公众号id
	 */
    public $appid;
	/**
	 * @var string AppSecret
	 */
    public $secret;
	
	/**
	 * @var string Token 微信公众平台的获取的Token
	 */
    public $token;
	
	/**
	 * @var string EncodingAESKey，兼容与安全模式下请一定要填写！！！
	 */
    public $aes_key = "";
	
	/**
	 * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
	 * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
	 */
	/**
	 * @var string
	 */
	public $response_type = "array";
	
	/**
	 * EasyWechatConfig constructor.
	 * @param string $appid
	 * @param string $secret
	 * @param string $token
	 * @param string $aes_key
	 * @param string $response_type
	 */
	public function __construct(string $appid="", string $secret="", string $token="", string $aes_key="", string $response_type="")
	{
		$this->appid = $appid;
		$this->secret = $secret;
		$this->token = $token;
		$this->aes_key = $aes_key;
		$this->response_type = $response_type;
	} //默认为数组
	//返回配置
	public function Config():array
	{
		$config = [
			'app_id' => $this->appid,
			'secret' =>$this->secret,
			'token'   => $this->token,          // Token
			'aes_key' => $this->aes_key,
			// 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
			'response_type' => $this->response_type,
			//...
		];
		$this->config = $config;
		return $this->config;
	}
}