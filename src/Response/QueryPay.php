<?php namespace Hht\Gaohuitong\Response;

class QueryPay extends ResponseBase
{

	//响应码
	protected $_resp_code = '99';
	
	//响应描述
	protected $_resp_desc = '解析 xml 数据出错';

	//业务代码
	protected $_busi_code = 'SEARCH';

	//商户号
	protected $_merchant_no = '';

	//终端号
	protected $_terminal_no = '';

	//商户系统订单号
	protected $_order_no = '';

	//交易币种  人民币： CNY 港币:： HKD 美元： USD
	protected $_currency_type = 'CNY';

	//清算币种
	protected $_sett_currency_type = 'CNY';

	//汇率  仅当交易币种与清算币种不一致时返回
	protected $_exchg_rate = '';
	
	//支付单号
	protected $_pay_no = '';

	//订单金额
	protected $_amount = '';

	//支付结果
	protected $_pay_result = '0';

	//支付时间 YYYYMMDDHHMISS
	protected $_pay_time = '';

	//清算日期 YYYYMMDD
	protected $_sett_date = '';

	//清算时间 HHMISS
	protected $_sett_time = '';

	//银行编码
	protected $_bank_code = '';

	//用户名称
	protected $_user_name = '';

	//用户证件号码
	protected $_user_cert_no = '';

	//用户手机号
	protected $_user_mobile = '';
	
	//用户银行卡号
	protected $_user_bank_card_no = '';

	//卡类型  0： 储蓄卡 1： 信用卡 2：未定义
	protected $_card_type = '2';

	//商户池商户 ID
	protected $_mer_id = '';

	//商户池商户简称
	protected $_mer_abbr = '';

	//签名类型
	protected $_sign_type = 'SHA256';

	//签名
	protected $_sign = '';
}