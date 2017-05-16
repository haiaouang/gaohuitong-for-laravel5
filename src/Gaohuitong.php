<?php namespace Hht\Gaohuitong;

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Config;

use Hht\Gaohuitong\Core\GaohuitongCore;
use Hht\Gaohuitong\Core\GaohuitongHttp;
use Hht\Gaohuitong\Core\GaohuitongHash;
use Hht\Gaohuitong\Core\GaohuitongSha;

use Hht\Gaohuitong\Response\ResponseBase;
use Hht\Gaohuitong\Response\PrePay;
use Hht\Gaohuitong\Response\QueryPay;
use Hht\Gaohuitong\Response\RefundPay;

class Gaohuitong
{
	/**
	 * 实例化  
	 *
	 * @return this 
	 */
	public function __construct() {

	}

	/**
	 * 支付订单预下单
	 *
	 * @param  array $data 订单参数
	 * @return Response\PrePay
	 */
	public function prePay($data) {
		$data['busi_code'] = 'PRE_PAY';
		$data['merchant_no'] = Config::get('ght.merchant_no');
		$data['terminal_no'] = Config::get('ght.terminal_no');
		$data['currency_type'] = Config::get('ght.currency_type');
		$data['sett_currency_type'] = Config::get('ght.sett_currency_type');
		$data['sign_type'] = Config::get('ght.sign_type');
		$data['access_type'] = Config::get('ght.access_type');
		$data['sign'] = GaohuitongHash::hashSign($data, Config::get('ght.key'));
	
		$data = GaohuitongCore::argSort($data);
		$str = GaohuitongCore::createLinkstringUrlencode($data);

		return new PrePay(GaohuitongHttp::curlGet(Config::get('ght.pay_url') . '?' . $str));
	}	

	/**
	 * 支付订单查询
	 *
	 * @param  array $data 订单参数
	 * @return Response\QueryPay
	 */
	public function queryPay($data) {
		$data['busi_code'] = 'SEARCH';
		$data['merchant_no'] = Config::get('ght.merchant_no');
		$data['terminal_no'] = Config::get('ght.terminal_no');
		$data['sign_type'] = Config::get('ght.sign_type');
		$data['sign'] = GaohuitongHash::hashSign($data, Config::get('ght.key'));
	
		$data = GaohuitongCore::argSort($data);
		$str = GaohuitongCore::createLinkstringUrlencode($data);

		return new QueryPay(GaohuitongHttp::curlGet(Config::get('ght.query_url') . '?' . $str));
	}

	/**
	 * 支付订单退单
	 *
	 * @param  array $data 订单参数
	 * @return Response\QueryPay
	 */
	public function refundPay($data) {
		$data['busi_code'] = 'REFUND';
		$data['merchant_no'] = Config::get('ght.merchant_no');
		$data['terminal_no'] = Config::get('ght.terminal_no');
		$data['currency_type'] = Config::get('ght.currency_type');
		$data['sett_currency_type'] = Config::get('ght.sett_currency_type');
		$data['sign_type'] = Config::get('ght.sign_type');
		$data['sign'] = GaohuitongHash::hashSign($data, Config::get('ght.key'));
	
		$data = GaohuitongCore::argSort($data);
		$str = GaohuitongCore::createLinkstringUrlencode($data);

		return new RefundPay(GaohuitongHttp::curlGet(Config::get('ght.query_url') . '?' . $str));
	}

}