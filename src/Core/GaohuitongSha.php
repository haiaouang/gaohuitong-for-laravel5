<?php namespace Hht\Gaohuitong\Core;

class GaohuitongSha
{
	/**
	 * 生成签名 sha256 
	 *
	 * @param  array  $data        参数数组
	 * @param  string $private_key 私钥
	 * @return string 
	 */
	public static function sha256Sign($data, $private_key) {
		//以下为了初始化私钥，保证在您填写私钥时不管是带格式还是不带格式都可以通过验证。
		$private_key = str_replace('-----BEGIN PRIVATE KEY-----', '', $private_key);
		$private_key = str_replace('-----END PRIVATE KEY-----', '', $private_key);
		$private_key = str_replace('\n', '', $private_key);

		//wordwrap($private_key, 64, PHP_EOL, true)
		$private_key = '-----BEGIN PRIVATE KEY-----' . PHP_EOL . $private_key . PHP_EOL . '-----END PRIVATE KEY-----'; 

		$res = openssl_pkey_get_private($private_key);

		$sign = '';

		if ($res)
		{
			$data = iconv('GBK', 'UTF-8', $data);

			openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA1);
			$sign = bin2hex($sign);
		}

		return $sign;
	}

	/**
	 * 验证签名 sha256 
	 *
	 * @param  array  $data        参数数组
	 * @param  string $public_key  公钥
	 * @param  string $sign        签名
	 * @return bool 
	 */
	public static function sha256Verify($data, $public_key, $sign) {
		$sign = GaohuitongCore::hexToString($sign);

		$res =openssl_pkey_get_public($public_key);

		$r = 0;

		if ($res)
		{
			$data = iconv('GBK', 'UTF-8', $data);

			$r = openssl_verify($data, $sign, $res);  
		}

		return $r;
	}
}