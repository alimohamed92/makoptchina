
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Chris Harvey
 * @license			MIT License
 * @link			https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */

//require_once(dirname(__FILE__) . '/dompdf/dompdf_config.inc.php');

class Utils
{
    public function __construct()
    {
            // Do something with $params
    }
   
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-*$#@';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*function sendSms($to, $message) {
    return false;
}*/

?>