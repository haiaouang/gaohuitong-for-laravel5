<?php namespace Hht\Gaohuitong\Facades;

use Illuminate\Support\Facades\Facade;

class Gaohuitong extends Facade
{
	/**
	 * 获取对象  
	 *
	 * @return string 
	 */
    protected static function getFacadeAccessor()
    {
        return 'gaohuitong';
    }
}