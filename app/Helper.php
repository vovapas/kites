<?php

function direct($url, $message, $type)
{
	$type = empty($type) ?  config('app.message_success') : $type;

	if ($url == null)
		return redirect()->back()->with(['message' => $message, 'type' => $type]);

	return redirect($url)->with(['message' => $message, 'type' => $type]);
}

function datetime($format, $dataTime = NULL)
{
	if ($dataTime == NULL)
	{
		return date($format);
	}

	return date($format, strtotime($dataTime));
}

function photo($picture)
{
	if(empty($picture))
		return asset('img-product/nophoto.jpg');
		
	return 	asset('img-product/' . $picture);
}

function ending($number)
{
	if (($number % 10) == 1)
		return 'ие';

	elseif ((($number % 10) == 2) or (($number % 10) == 3) or (($number % 10) == 4))
		return 'ия';

	elseif ($number >= 11 and $number <= 14)
		return 'ий';

	else return 'ий';
}