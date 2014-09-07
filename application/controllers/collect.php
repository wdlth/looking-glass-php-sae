<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Collect Class
 * 采集器
 *
 * @package		LookingGlassSAE
 * @subpackage	Controllers
 * @category	Controller
 * @author		WDLTH
 * @link		http://www.wdlth.com/
 */

require (APPPATH . 'libraries/Wordlist.php');

class Collect extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		exit('403 Forbidden.');
	}
	
	/*
	public function abovenet()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->alidns();
		
		$this->load->library('Wordlist');
		$url = $this->wordlist->abovenet("url", NULL);
		$ref = $this->wordlist->abovenet("ref", NULL);
		$post = $this->wordlist->abovenet("post", $ip);
		
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre_code($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parseping($result);
			if($parseresult != "")
				print_r($parseresult);
		}else{
			log_message('warning', "Cannot receive data of ping from abovenet.");
			die("Error.");
		}
		
	}
	*/
	
	/*
	public function gblx()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->alidns();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->globalcrossing("url", NULL);
		$ref = $this->wordlist->globalcrossing("ref", NULL);
		$post = $this->wordlist->globalcrossing("post", $ip);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre_css($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parseping($result);
			if($parseresult != "")
				print_r($parseresult);
			var_dump($result);
		}else{
			log_message('warning', "Cannot receive data of ping from abovenet.");
			die("Error.");
		}
	
	}
	*/
	
	/*
	public function level3()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->alidns();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->level3("url", NULL);
		$ref = $this->wordlist->level3("ref", NULL);
		$post = $this->wordlist->level3("post", $ip);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parselevel3($result);
			if($parseresult != "")
				print_r($parseresult);
		}else{
			log_message('warning', "Cannot receive data of ping from level3.");
			die("Error.");
		}
	
	}
	*/
	
	/*
	 * 采集器用法示例
	 */
	public function collector_ct()
	{
		$this->load->library('Iplist');      //载入IP列表类库
		$ip = $this->iplist->ctbackbone();   //取得某个IP（这里是电信，可以换成别的，但是要能跨网ping通。）
	
		$this->load->library('Wordlist');    //载入单词表类库
		$url = $this->wordlist->egihosting("url", NULL);  //取得某个Looking Glass的URL
		$ref = $this->wordlist->egihosting("ref", NULL);  //取得某个Looking Glass的Referer（其实有的Looking Glass并不限制Referer，但是还是加上吧）
		//$post = $this->wordlist->xxx("post", $ip);      //如果是POST提交的，还须取得Looking Glass的POST参数，并放入IP，参考下面OAH的。
	
		$this->load->library('Pinglib');     //载入请求类库
		$result = $this->pinglib->source_get($url, $ref, $ip);  //进行请求并提取数据，不同的Looking Glass有不同的返回格式。 
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');  //载入解析类库
			$parseresult = $this->parselib->parsetelephone($result);  //进行解析
			if($parseresult != "")
			{
				$this->load->library('Dblib');  //载入数据库操作类库
				$this->dblib->saveping('EGI', 'ChinaTelecom', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);  //保存结果到数据库
				print_r($parseresult);  //显示结果，可以在SAE Cron结果看到。
			}
		}else{
			log_message('warning', "Cannot receive data of ping from EGIHosting.");  //记录SAE日志，不过好像有问题。
			die("Error.");
		}
	
	}
	
	public function egihosting_ct()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->ctbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->egihosting("url", NULL);
		$ref = $this->wordlist->egihosting("ref", NULL);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->source_get($url, $ref, $ip);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parsetelephone($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('EGI', 'ChinaTelecom', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from EGIHosting.");
			die("Error.");
		}
	
	}
	
	public function egihosting_cu()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->cubackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->egihosting("url", NULL);
		$ref = $this->wordlist->egihosting("ref", NULL);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->source_get($url, $ref, $ip);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parsetelephone($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('EGI', 'ChinaUnicom', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from EGIHosting.");
			die("Error.");
		}
	
	}
	
	public function egihosting_cmcc()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->cmccbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->egihosting("url", NULL);
		$ref = $this->wordlist->egihosting("ref", NULL);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->source_get($url, $ref, $ip);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parsetelephone($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('EGI', 'ChinaMobile', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from EGIHosting.");
			die("Error.");
		}
	
	}
	
	public function oneasiahost_ct()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->ctbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->oneasiahost("url", NULL);
		$ref = $this->wordlist->oneasiahost("ref", NULL);
		$post = $this->wordlist->oneasiahost("post", $ip);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre_code($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parseoah($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('OneAsiaHost', 'ChinaTelecom', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from oneasiahost.");
			die("Error.");
		}
	
	}
	
	public function oneasiahost_cu()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->cubackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->oneasiahost("url", NULL);
		$ref = $this->wordlist->oneasiahost("ref", NULL);
		$post = $this->wordlist->oneasiahost("post", $ip);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre_code($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parseoah($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('OneAsiaHost', 'ChinaUnicom', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from oneasiahost.");
			die("Error.");
		}
	
	}
	
	public function oneasiahost_cmcc()
	{
		$this->load->library('Iplist');
		$ip = $this->iplist->cmccbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->oneasiahost("url", NULL);
		$ref = $this->wordlist->oneasiahost("ref", NULL);
		$post = $this->wordlist->oneasiahost("post", $ip);
	
		$this->load->library('Pinglib');
		$result = $this->pinglib->pre_code($url, $ref, $post);
		if($result != FALSE && $result != "")
		{
			$this->load->library('Parselib');
			$parseresult = $this->parselib->parseoah($result);
			if($parseresult != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('OneAsiaHost', 'ChinaMobile', $parseresult["min"], $parseresult["avg"], $parseresult["max"], $parseresult["loss"]);
				print_r($parseresult);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from oneasiahost.");
			die("Error.");
		}
	
	}
	
	/**
	 * PCCW三合一（香港耗时比较短，可以这样进行合并。）
	 */
	public function pccw()
	{
		$this->load->library('Iplist');
		$ip_ct = $this->iplist->ctbackbone();
		$ip_cu = $this->iplist->cubackbone();
		$ip_cmcc = $this->iplist->cmccbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->pccw("url", NULL);
		$ref = $this->wordlist->pccw("ref", NULL);
		$post_ct = $this->wordlist->pccw("post", $ip_ct);
		$post_cu = $this->wordlist->pccw("post", $ip_cu);
		$post_cmcc = $this->wordlist->pccw("post", $ip_cmcc);
	
		$this->load->library('Pinglib');
		
		$result_ct = $this->pinglib->source($url, $ref, $post_ct);
		if($result_ct != FALSE && $result_ct != "")
		{
			$this->load->library('Parselib');
			$parseresult_ct = $this->parselib->parsepccw($result_ct);
			if($parseresult_ct != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('PCCW HK', 'ChinaTelecom', $parseresult_ct["min"], $parseresult_ct["avg"], $parseresult_ct["max"], $parseresult_ct["loss"]);
				print_r($parseresult_ct);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from pccw.");
			die("Error.");
		}
		
		$result_cu = $this->pinglib->source($url, $ref, $post_cu);
		if($result_cu != FALSE && $result_cu != "")
		{
			$this->load->library('Parselib');
			$parseresult_cu = $this->parselib->parsepccw($result_cu);
			if($parseresult_cu != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('PCCW HK', 'ChinaUnicom', $parseresult_cu["min"], $parseresult_cu["avg"], $parseresult_cu["max"], $parseresult_cu["loss"]);
				print_r($parseresult_cu);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from pccw.");
			die("Error.");
		}
		
		$result_cmcc = $this->pinglib->source($url, $ref, $post_cmcc);
		if($result_cmcc != FALSE && $result_cmcc != "")
		{
			$this->load->library('Parselib');
			$parseresult_cmcc = $this->parselib->parsepccw($result_cmcc);
			if($parseresult_cmcc != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('PCCW HK', 'ChinaMobile', $parseresult_cmcc["min"], $parseresult_cmcc["avg"], $parseresult_cmcc["max"], $parseresult_cmcc["loss"]);
				print_r($parseresult_cmcc);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from pccw.");
			die("Error.");
		}
	
	}
	
	/**
	 * VR三合一（香港耗时比较短，可以这样进行合并。）
	 */
	public function vr()
	{
		$this->load->library('Iplist');
		$ip_ct = $this->iplist->ctbackbone();
		$ip_cu = $this->iplist->cubackbone();
		$ip_cmcc = $this->iplist->cmccbackbone();
	
		$this->load->library('Wordlist');
		$url = $this->wordlist->vr("url", NULL);
		$ref = $this->wordlist->vr("ref", NULL);
	
		$this->load->library('Pinglib');
		
		$result_ct = $this->pinglib->pre_get($url, $ref, $ip_ct);
		if($result_ct != FALSE && $result_ct != "")
		{
			$this->load->library('Parselib');
			$parseresult_ct = $this->parselib->parseping($result_ct);
			if($parseresult_ct != FALSE && $parseresult_ct != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('VR HK', 'ChinaTelecom', $parseresult_ct["min"], $parseresult_ct["avg"], $parseresult_ct["max"], $parseresult_ct["loss"]);
				print_r($parseresult_ct);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from vr.");
			die("Error.");
		}
		
		$result_cu = $this->pinglib->pre_get($url, $ref, $ip_cu);
		if($result_cu != FALSE && $result_cu != "")
		{
			$this->load->library('Parselib');
			$parseresult_cu = $this->parselib->parseping($result_cu);
			if($parseresult_cu != FALSE && $parseresult_cu != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('VR HK', 'ChinaUnicom', $parseresult_cu["min"], $parseresult_cu["avg"], $parseresult_cu["max"], $parseresult_cu["loss"]);
				print_r($parseresult_cu);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from vr.");
			die("Error.");
		}
		
		$result_cmcc = $this->pinglib->pre_get($url, $ref, $ip_cmcc);
		if($result_cmcc != FALSE && $result_cmcc != "")
		{
			$this->load->library('Parselib');
			$parseresult_cmcc = $this->parselib->parseping($result_cmcc);
			if($parseresult_cmcc != FALSE && $parseresult_cmcc != "")
			{
				$this->load->library('Dblib');
				$this->dblib->saveping('VR HK', 'ChinaMobile', $parseresult_cmcc["min"], $parseresult_cmcc["avg"], $parseresult_cmcc["max"], $parseresult_cmcc["loss"]);
				print_r($parseresult_cmcc);
			}
		}else{
			log_message('warning', "Cannot receive data of ping from vr.");
			die("Error.");
		}
	
	}
	
}