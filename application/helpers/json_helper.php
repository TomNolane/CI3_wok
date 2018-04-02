<?php
function json_dialog($title, $body, $other=false)
{
	$res = array(
			'result' => 'dialog',
			'dialog' => array(
                                                'title' => $title,
                                                'body' => $body
			)
	);
	
	if (is_array($other))
	{
		$res = array_merge($res, $other);
	}
	
	echo json_encode($res);
}
//------------
function json_result($res, $other=false)
{
	$res = array('result' => $res);
	
	if (is_array($other))
	{
		$res = array_merge($res, $other);
	}
	
	echo json_encode($res);
}
//------------
function json_error($err='Ошибка.', $other=false)
{
	$res = array('error' => $err);
	
	if (is_array($other))
	{
		$res = array_merge($res, $other);
	}
	
	exit(json_encode($res));
}
?>