<?php

namespace App\Utils;

use Mail;
use \Datetime;

class Utils {

	public static function sendBasicEmail(){
		$data = ['name' => 'Wilson Jr'];
		
		Mail::send(['text' => 'mail'], $data, function($message){
			$message->to('wjunior_msn@hotmail.com', 'Wilson Jr')
			->subject('Testing mail')
			->from('wilsoonjunior@gmail.com', 'RKOdontologia');
		});
	}

	public static function generateRandomString($length = 10) {
    	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	public static function getDifferenceBetweenDates($startDate, $endDate){
		$date1 = new Datetime($startDate);
		$date2 = new Datetime($endDate);
		$interval = $date2->diff($date1);
		return $interval->d;
	}

}