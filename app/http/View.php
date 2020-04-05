<?php


namespace Exeo\http;


use Exception;

class View
{
   protected $file;
   protected $data = array();

   public function __construct($file)
   {
      $this->file = $file;
   }

   public function set($key, $value)
   {
      $this->data[$key] = $value;
   }

   public function get($key)
   {
      return $this->data[$key];
   }

   public function output()
   {
      if (!file_exists($this->file)) {
         throw new Exception("Template " . $this->file . " doesn't exist.");
      }

      extract($this->data);
      ob_start();
      include($this->file);
      $output = ob_get_contents();
      ob_end_clean();
      echo $output;
   }
}