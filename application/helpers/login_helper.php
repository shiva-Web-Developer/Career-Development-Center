<?php
 defined('BASEPATH') OR exit('no direct access');

 function isLogin($c_route, array $except_route = [], $role = 'admin'){
   if(in_array($c_route, $except_route)){
      // do nothing
   }else{
      if(!isset($_SESSION["ROLE"])){
         redirect(base_url('login'));
      }elseif(strtolower($_SESSION["ROLE"]) != $role && $role != "admin"){
         echo "<script>alert('Invalid Access! You are not allowed to view this page.');</script>";
         echo "You are not allowed to access this page! <a href='".base_url()."'>Take me to home</a>";
         exit();
         // redirect(base_url('login'));
      }
   }
}
function isAdmin(){
   if(strtolower($_SESSION["ROLE"]) != "admin"){
      return false;
   }else{
      return true;
   }
}
// For Age 
function get_age_options() {
   return array(
       'G1' => '0 to 14',
       'G2' => '15 to 24',
       'G3' => '25 to 35',
       'G4' => '36 to 48',
       'G5' => '48+'
   );
}
// For Cuisine 
function get_cuisine_options() {
   return array(
       'North Indian Cuisine' => 'North Indian Cuisine',
       'Punjabi Cuisine' => 'Punjabi Cuisine',
       'Rajasthani cuisine' => 'Rajasthani Cuisine',
       'Bengali Cuisine' => 'Bengali Cuisine',
       'Tamilian Cuisine' => 'Tamilian Cuisine',
       'Kerala Cuisine' => 'Kerala Cuisine',
       'Andhra Pradesh Cuisine' => 'Andhra Pradesh Cuisine',
       'Telangana Cuisine' => 'Telangana Cuisine',
       'South Indian Cuisine' => 'South Indian Cuisine'
   );
}
// For Dietary 
function get_dietary_options() {
   return array(
       'Veg' => 'Veg',
       'Veg + Egg' => 'Veg + Egg',
       'Non-Veg' => 'Non-Veg',
       'Vegan' => 'Vegan'
   );
}
// Month Name 
function get_month_options() {
   return array(
       '1' => 'January',
       '2' => 'February',
       '3' => 'March',
       '4' => 'April',
       '5' => 'May',
       '6' => 'June',
       '7' => 'July',
       '8' => 'August',
       '9' => 'September',
       '10' => 'October',
       '11' => 'November',
       '12' => 'December'
   );
}

?>