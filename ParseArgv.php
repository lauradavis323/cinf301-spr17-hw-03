<?php

class ParseArgv
{
   private $argsParsed;
   private $argsUnparsed;

   public function _construct()
   {
      $this->$argsUnparsed = $_SERVER['argv'];
      $this->$argsParsed = array();
   }

   public function getParsed()
   {
      return $this->argsParsed;
   }

   private function parse()
   {
      foreach($argsUnparsed as $a)
      {
         $key = '0';
         $content = 'true';
         if($a[0] == '-')
         {
            $key = '0';
            $content = 'true';
            if($a[1] == '-')
            {
               $pos = strpos($a, '=');
               $key = substr($a, 2, $pos - 1);
               $content = substr($a, $pos + 1);
               $argsParsed[$key] = $content;
            }
            else
            {
               $key = substr($a, 1);
               $argsParsed[$key] = $content;
            }
         }
         else
         {
            if($key === '0')
            {
               $content = $a;
               $argsParsed[$key] = $content;
            }
         }
      }
   }
}
