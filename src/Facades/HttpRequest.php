<?php
	namespace Overburn\HttpRequest\Facades;

	use Illuminate\Support\Facades\Facade;

	class HttpRequest extends Facade
	{
		/**
	     * Get the registered name of the component.
	     *
	     * @return string
	     */
	    protected static function getFacadeAccessor()
	    {
	        return 'httpRequest';
	    }
	}