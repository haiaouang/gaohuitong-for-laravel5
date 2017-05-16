<?php namespace Hht\Gaohuitong\Core;

class GaohuitongCore
{
	/**
	 * 参数数组转换为 get 字符串
	 *
	 * @param  array  $param 参数数组
	 * @return string
	 */
	public static function createLinkstring($param) {
		$str = '';

		foreach ($param as $key => $val)
		{
			$str .= $key . '=' . $val . '&';
		}
	
		//去掉最后一个&字符
		$str = substr($str, 0, count($str) - 2);
		
		//如果存在转义字符，那么去掉转义
		if (get_magic_quotes_gpc())
			$str = stripslashes($str);

		return $str;
	}

	/**
	 * 参数数组转换为 get 字符串--值经过 urlencode 转码
	 *
	 * @param  array  $param 参数数组
	 * @return string 
	 */
	public static function createLinkstringUrlencode($param) {
		$str = '';

		foreach ($param as $key => $val)
		{
			$str .= $key . '=' . urlencode($val) . '&';
		}
	
		//去掉最后一个&字符
		$str = substr($str, 0, count($str) - 2);
		
		//如果存在转义字符，那么去掉转义
		if (get_magic_quotes_gpc())
			$str = stripslashes($str);

		return $str;
	}

	/**
	 * 参数数组过滤
	 *
	 * @param  array $param 参数数组
	 * @return array
	 */
	public static function paraFilter($param) {
		$para_filter = [];

		foreach ($param as $key => $val)
		{
			if ($key == 'sign' || $key == 'key' || $val == '')
				continue;
			else
				$para_filter[$key] = $val;
		}

		return $para_filter;
	}

	/**
	 * 参数数组排序
	 *
	 * @param  array $param 参数数组
	 * @return array
	 */
	public static function argSort($param) {
		ksort($param);
		reset($param);

		return $param;
	}

	/**
	 * 字符串十六进制字符串转换为十进制数
	 *
	 * @param  string $str 字符串
	 * @return string 
	 */
	public static function hexToString($str) {
		$_str = '';

		for ($i = 0; $i < strlen($str); $i += 2)
		{
			$_str .= chr(hexdec('0x' . $str{$i} . $str{$i+1}));
		}

		return $_str;
	}
}