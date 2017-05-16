<?php namespace Hht\Gaohuitong\Core;

class GaohuitongHttp
{
	/**
	 * 请求post  
	 *
	 * @param  string  $url       请求地址
	 * @param  array   $data      参数
	 * @param  int     $time_out  超时时间
	 * @return string 
	 */
	public static function curlPost($url, $data, $time_out = 30) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_TIMEOUT, $time_out);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if (strpos($url, 'https') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		}

		$res = trim(curl_exec($ch));

		//echo curl_error($ch);

		curl_close($ch);
		
		return $res;
	}

	/**
	 * 请求get  
	 *
	 * @param  string  $url       请求地址
	 * @param  int     $time_out  超时时间
	 * @return string 
	 */
	public static function curlGet($url, $time_out = 30) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_TIMEOUT, $time_out);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		if (strpos($url, 'https') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		}

		$res = trim(curl_exec($ch));

		//echo curl_error($ch);

		curl_close($ch);
		
		return $res;
	}
}