<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 * Weixin Class
 * 微信公众平台（因为要交钱给TX，所以不做了）
 *
 * @package LookingGlassSAE
 * @subpackage Controllers
 * @category Controller
 * @author WDLTH
 * @link http://www.wdlth.com/
 */
class Weixin extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		$this->load->library("Weixinlib");
		$get = $this->input->get(NULL, TRUE);
		
		if (!isset($get) && $get != "") {
			$this->weixinlib->responseMsg();
		}else{
			$this->weixinlib->valid($get);
		}
	}
}