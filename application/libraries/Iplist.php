<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('ALIDNS', '223.5.5.5');
define('CNNIC', '1.2.4.8');
define('CERDNS', '202.112.0.35');
define('CMCCBACKBONE', '211.139.204.59');
define('CTDNS', '202.96.128.68');
define('CTBACKBONE', '202.97.0.1');
define('CUBACKBONE', '221.4.8.1');

/**
 * Iplist Class
 * IP地址列表
 *
 * @package		LookingGlassSAE
 * @subpackage	Libraries
 * @category	Library
 * @author		WDLTH
 * @link		http://www.wdlth.com/
 */

class Iplist {
	
	public function alidns()
	{
		return ALIDNS;
	}
	
	public function cnnic()
	{
		return CNNIC;
	}
	
	public function cerdns()
	{
		return CERDNS;
	}
	
	public function cmccbackbone()
	{
		return CMCCBACKBONE;
	}
	
	public function ctdns()
	{
		return CTDNS;
	}
	
	public function ctbackbone()
	{
		return CTBACKBONE;
	}
	
	public function cubackbone()
	{
		return CUBACKBONE;
	}
}