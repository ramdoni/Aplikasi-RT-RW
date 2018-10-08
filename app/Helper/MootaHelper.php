<?php
/**
 * MOOTA API
 * @param  $token, $url, $params,
 * @return object
 */

function moota_api($param)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, \Config::get('kodami.moota_url') . $param);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
	    'Accept: application/json',
	    'Authorization: Bearer '. \Config::get('kodami.moota_token')
	]);
	$response = curl_exec($curl);

	return json_decode($response);
}

/**
 * [moota_mutasi description]
 * @return [type] [description]
 */
function moota_bank()
{
	return moota_api('bank');
}

/**
 * [moota_mutasi description]
 * @param  [type] $bank_id [description]
 * @return [type]          [description]
 */
function moota_mutasi($bank_id)
{
	return moota_api('bank/'. $bank_id .'/mutation/');
}

?>
