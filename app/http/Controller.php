<?php


namespace Exeo\http;



class Controller
{
   protected $_controller;
   protected $_action;
   protected $_view;
   protected $_baseName;

   public function __construct($_baseName, $action)
   {
      $this->_controller = ucwords(__CLASS__);
      $this->_action = $action;
      $this->_view = new View(HOME . DS . 'views' . DS . strtolower($_baseName) . DS . $action . '.tpl');
   }
}