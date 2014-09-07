<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Pinglib Class
 * Ping请求发送类，通过Curl获取结果。（以后可能通过curl_multi_）
 *
 * @package		LookingGlassSAE
 * @subpackage	Libraries
 * @category	Library
 * @author		WDLTH
 * @link		http://www.wdlth.com/
 */

class Pinglib {
	
	public function pre($url, $referer, $postfields)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				preg_match('/<pre>(.*?)<\/pre>/is', $result, $matches);
				return $matches[1];
			}else{
				return FALSE;
			}
		}
	
		curl_close($ch);
	
	}
	
	public function pre_get($url, $referer, $ip)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url . $ip);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				preg_match('/<pre>(.*?)<\/pre>/is', $result, $matches);
				return $matches[1];
			}else{
				return FALSE;
			}
		}
	
		curl_close($ch);
	
	}
	
	public function pre_css($url, $referer, $postfields)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				return $result;
				/*$startpos = strpos($result, "<pre ");
				$endpos = strpos($result, "</pre>");
				if($startpos != 0 && $endpos != 0 && $endpos > $startpos)
				{
					$str = substr($result, $startpos, $endpos + 6 - $startpos);
					return $startpos . "," . $endpos;
				}else{
					return FALSE;
				}*/
				//preg_match('/<pre\ (.+)>(.*?)<\/pre>/is', $result, $matches);
				//return $matches[1];
			}else{
				return FALSE;
			}
		}
	
		curl_close($ch);
	
	}
	
	public function pre_code($url, $referer, $postfields)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				preg_match('/<PRE><CODE>(.*?)<\/CODE><\/PRE>/is', $result, $matches);
				return $matches[1];
			}else{
				return FALSE;
			}
		}
		
		curl_close($ch);
		
	}
	
	/**
	 * 返回结果为数据本身，无需正则提取。
	 * @param string $url
	 * @param string $referer
	 * @param string $postfields
	 * @return mixed
	 */
	public function source($url, $referer, $postfields)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				return $result;
			}else{
				return FALSE;
			}
		}
	
		curl_close($ch);
	
	}
	
	/**
	 * 返回结果为数据本身，无需正则提取。
	 * @param string $url
	 * @param string $referer
	 * @param string $ip
	 * @return mixed
	 */
	public function source_get($url, $referer, $ip)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url . $ip);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		$result = curl_exec($ch);
		if(curl_errno($ch))
		{
			log_message('error', curl_error($ch));
			return FALSE;
		}else{
			if($result != "")
			{
				return $result;
			}else{
				return FALSE;
			}
		}
	
		curl_close($ch);
	
	}
	
}
