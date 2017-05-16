<?php namespace Hht\Gaohuitong\Core;

class GaohuitongHash
{
	/**
	 * 生成签名 hash  
	 *
	 * @param  array  $data  参数数组
	 * @param  string $key   私钥
	 * @param  string $algo  加密方式
	 * @return string 
	 */
	public static function hashSign($data, $key, $algo = 'sha256') {
		$data = GaohuitongCore::paraFilter($data);
		$data = GaohuitongCore::argSort($data);
		$str  = GaohuitongCore::createLinkstring($data);
		$str .= '&key=' . $key;

		return strtolower(hash($algo, $str));
	}
}