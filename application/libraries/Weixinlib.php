<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

define("TOKEN", "LookingGlassWeChatToken20140418");

/**
 * Weixinlib Class
 *
 * @package		LookingGlassSAE
 * @subpackage	Libraries
 * @category	Library
 * @author		WDLTH
 * @link		http://www.wdlth.com/
 */

class Weixinlib {
	
	private function checkSignature($signature, $timestamp, $nonce)
	{
	
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
	
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	
	public function valid($get)
	{
		$echoStr = $get;
		if($this->checkSignature($get['signature'], $get['timestamp'], $get['nonce'])){
			echo $get['echostr'];
			exit;
		}
	}
	
	public function responseMsg()
	{
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		if (!empty($postStr)){
			$this->logger("R ".$postStr);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$RX_TYPE = trim($postObj->MsgType);
	
			switch ($RX_TYPE)
			{
				case "event":
					$result = $this->receiveEvent($postObj);
					break;
				case "text":
					$result = $this->receiveText($postObj);
					break;
				case "image":
					$result = $this->receiveImage($postObj);
					break;
				case "location":
					$result = $this->receiveLocation($postObj);
					break;
				case "voice":
					$result = $this->receiveVoice($postObj);
					break;
				case "video":
					$result = $this->receiveVideo($postObj);
					break;
				case "link":
					$result = $this->receiveLink($postObj);
					break;
				default:
					$result = "unknow msg type: ".$RX_TYPE;
					break;
			}
			$this->logger("T ".$result);
			echo $result;
		}else {
			echo "";
			exit;
		}
	}
	
	private function receiveEvent($object)
	{
		$content = "";
		switch ($object->Event)
		{
			case "subscribe":
				$content = "欢迎关注网络观察镜 ";
				break;
			case "unsubscribe":
				$content = "取消关注";
				break;
			case "SCAN":
				$content = "扫描".$object->EventKey;
				break;
			case "CLICK":
				switch ($object->EventKey)
				{
					case "COMPANY":
						$content = "由WDLTH提供的网络观察镜。";
						break;
					default:
						$content = "点击菜单：".$object->EventKey;
						break;
				}
				break;
			case "LOCATION":
				$content = "方位：纬度 ".$object->Latitude.";经度 ".$object->Longitude;
				break;
			case "VIEW":
				$content = "跳转链接 ".$object->EventKey;
				break;
			default:
				$content = "获取新事件: ".$object->Event;
				break;
		}
		$result = $this->transmitText($object, $content);
		return $result;
	}
	
	private function logger($log_content)
	{
		log_message('notice', $log_content);
	}
	
	private function getAccessToken()
	{
		$ch = curl_init();
	}

}

?>