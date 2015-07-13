<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_array_key'))
{
	function add_array_key($field, $array)
	{
		$data = array();
		foreach ($array as $key => $value) {
			$data[$value[$field]] = $value;
		}

		return $data;
	}
}

if ( ! function_exists('parse_signed_request'))
{
function parse_signed_request($signed_request) {
      list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

      $secret = "2afca22dc0b6e8f80991fd577afe1b0a"; // Use your app secret here

      // decode the data
      $sig = base64_url_decode($encoded_sig);
      $data = json_decode(base64_url_decode($payload), true);

      // confirm the signature
      $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
      if ($sig !== $expected_sig) {
        error_log('Bad Signed JSON signature!');
        return null;
      }

      return $data;
    }
}

if ( ! function_exists('base64_url_decode'))
{
    function base64_url_decode($input) {
      return base64_decode(strtr($input, '-_', '+/'));
    }
}
?>