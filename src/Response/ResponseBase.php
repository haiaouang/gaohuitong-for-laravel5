<?php namespace Hht\Gaohuitong\Response;

class ResponseBase
{
	/**
	 * 实例化  
	 *
	 * @param  string  $xml xml字符串
	 * @return this 
	 */
	function __construct($xml = '') {
		if ($xml != '')
			$this->setDataByXML($xml);
	}

	/**
	 * 设置xml字符串
	 *
	 * @param  string  $xml xml字符串
	 * @return void 
	 */
	public function setDataByXML($xml) {
		$sm = simplexml_load_string($xml);

		foreach ($sm->children() as $key => $row)
		{
			$this->__set($key, $row . '');
		}
	}

	/**
	 * 获取属性  
	 *
	 * @param  string  $name 属性名
	 * @return object 
	 */
	public function __get($name) {
		$name = '_' . $name;

		if (isset($this->$name))
			return $this->$name;
		else
			return '';
	}
	
	/**
	 * 设置属性  
	 *
	 * @param  string  $name 属性名
	 * @param  object  $value 属性值
	 * @return void 
	 */
	public function __set($name, $value) {
		$name = '_' . $name;

		if (isset($this->$name))
			$this->$name = $value;
	}
}