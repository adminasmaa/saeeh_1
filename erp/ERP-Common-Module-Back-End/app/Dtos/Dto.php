<?php


namespace App\Dtos;


class Dto implements \JsonSerializable
{
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        $json_array = array();
        if (is_array($vars)){
            foreach ( $vars as $key => $var){
                        $method_name = "get".ucfirst($key);
                     if (method_exists($this,$method_name)){
                         $json_array[$key]  = $this->{$method_name}();
                     }
            }
        }
        return $json_array;
    }
}