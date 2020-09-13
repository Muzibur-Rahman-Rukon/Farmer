<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->product_name_rules = '\d\D';
    }
}
?>