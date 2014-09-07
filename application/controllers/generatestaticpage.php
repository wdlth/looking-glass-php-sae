<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Generatestaticpage Class
 * 生成静态页面（刚开始，未完成）
 * 
 * @package LookingGlassSAE
 * @subpackage Controllers
 * @category Controller
 * @author WDLTH
 * @link http://www.wdlth.com/
*/
class Generatestaticpage extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	
	public function index() {
		exit ( '403 Forbidden.' );
	}
	
	public function genpagebydatetime() {
		$this->load->helper('url');
		$this->load->library('Dblib');
		
		$sourceArray = $this->dblib->getChartSource();
		
		foreach ($sourceArray as $source)
		{
			$ctArray[$source["source"]] = $this->dblib->getStaticPagePingByDate($source["source"], 'ChinaTelecom', 1398700800, 1398787200);
		}
		//$cuArray = $this->dblib->getStaticPagePingByDate('ChinaUnicom');
		//$cmArray = $this->dblib->getStaticPagePingByDate('ChinaMobile');
		
		$elapsed_time = $this->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end');
		$this -> smarty -> assign("elapsed_time", $elapsed_time);
		$this -> smarty -> assign("memory_get_usage",memory_get_usage() / 1024);
		$this -> smarty -> assign("sourceArray", $sourceArray);
		$this -> smarty -> assign("ctArray", $ctArray);
		//$this -> smarty -> assign("cuArray", $cuArray);
		//$this -> smarty -> assign("cmArray", $cmArray);
		$this -> smarty -> setCaching(Smarty::CACHING_OFF);
		$this -> smarty -> view('staticpage_tpl.php');
		
	}
}