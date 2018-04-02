<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* Установка обработчика исключений
	*
	*/
	function addExceptionHandler()
	{
		set_exception_handler('_exception_handler2');
	}
	
	
	/**
	* Обработчик исключений
	*
	*/
	function _exception_handler2($errstr)
	{
		$error =& load_class('Exceptions');
		
		$error->adminmail('1');
		
		// Выводим текст об исключении на экран
	    echo $error->show_error('error', nl2br($errstr));
		
		// Should we log the error?  No?  We're done...
		$config =& get_config();
		if ($config['log_threshold'] == 0)
		{
			return;
		}
		
		// Пишем сообщение в лог
		$error->log_exception('Exception', $errstr, '', '');
		
		exit;
	}