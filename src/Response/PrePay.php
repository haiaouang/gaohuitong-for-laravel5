<?php namespace Hht\Gaohuitong\Response;

class PrePay extends ResponseBase
{

	//响应码
	protected $_resp_code = '99';
	
	//响应描述
	protected $_resp_desc = '解析 xml 数据出错';

	//业务代码
	protected $_busi_code = 'PRE_PAY';

	//商户号
	protected $_merchant_no = '';

	//终端号
	protected $_terminal_no = '';

	//商户系统订单号
	protected $_order_no = '';
	
	//支付单号
	protected $_pay_no = '';

	//与支付下单 token
	protected $_token_id = '';

	//签名类型
	protected $_sign_type = 'SHA256';

	//签名
	protected $_sign = '';
}