<?php 

class TestUnit extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('unit_test');
    }

    private function calculatedDiscount($discountRate, $originalPrice){
        $discount = $originalPrice * $discountRate / 100;
        return $originalPrice - $discount;
    }

    public function testDiscount(){
        $test = $this->calculatedDiscount(50,1000);
        $expected_result = 500;
        $test_name = "Menghitung harga setelah discount";
        echo $this->unit->run($test, $expected_result, $test_name);

    }




}

















?>
