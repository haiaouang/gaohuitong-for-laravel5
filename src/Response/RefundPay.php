<?php namespace Hht\Gaohuitong\Response;

class RefundPay extends ResponseBase
{

	//响应码
	protected $_resp_code = '99';
	
	//响应描述
	protected $_resp_desc = '解析 xml 数据出错';

	//业务代码
	protected $_busi_code = 'REFUND';

	//商户号
	protected $_merchant_no = '';

	//终端号
	protected $_terminal_no = '';

	//商户系统订单号
	protected $_order_no = '';

	//商户系统退款单号
	protected $_refund_no = '';

	//系统退款单号
	protected $_refund_id = '';
	
	//退款金额
	protected $_refund_amount = '';

	//退款结果
	protected $_refund_result = '';

	//退款处理时间
	protected $_refund_time = '';

	//签名类型
	protected $_sign_type = 'SHA256';

	//签名
	protected $_sign = '';
}