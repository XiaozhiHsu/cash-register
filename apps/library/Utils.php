<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */

namespace App\Library;

class Utils{

    static public function wxParseXml( $xml ){
        $xml_object = simplexml_load_string( $xml ,'SimpleXMLElement', LIBXML_NOCDATA);
        return json_decode(json_encode( $xml_object ),true);
    }


    static public function makeSign( $data ,$app_key){
        ksort($data);
        foreach($data as $key => $value){
            if(is_null($value)){
                unset($data[$key]);
                continue;
            }
            $fields_string.= $key."=".$value."&";
        }
        $stringSignTemp   = $fields_string."key=".$app_key;
        $sign = strtoupper(md5($stringSignTemp));
        return $sign;
    }
}

?>