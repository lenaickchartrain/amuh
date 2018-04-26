<?php

namespace AMUH\AmuhBundle\Entity\Enum;

class BasicEnum {
    //put your code here
    private static $constArray = NULL;
    
    private function __construct() {
        
    }
    
    public static function getConstants(){
        if(self::$constArray == NULL){
            self::$constArray = [];
        }
        
        $calledClass = get_called_class();
        
        if(!array_key_exists($calledClass, self::$constArray)){
            $reflect = new \ReflectionClass($calledClass);
            self::$constArray[$calledClass] = [$calledClass => $reflect->getConstants()];
        }
        
        return self::$constArray[$calledClass];
    }
    
    public static function getLibelleConstants(){
        $calledClass = get_called_class();
        $array = self::getConstants()[$calledClass];
        
        $arrayToReturn = [];
        
        foreach ($array as $key => $value) {
            $arrayToReturn[$value] = $key;
        }
        
        return $arrayToReturn;
        
    }
}
