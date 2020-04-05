<?php


namespace Exeo\http;


class UserController extends Controller
{
   public function __construct($baseName, $action)
   {
      parent::__construct($baseName, $action);
   }

   function create()
   {
      $this->_view->set('name', '');
      $this->_view->set('email', '');
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
         $this->_view->output();
      } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $errors = [];
         if (!$this->validateName()) $errors[] = 'name';
         if (!$this->validateEmail()) $errors[] = 'email';
         $this->_view->set('errors', $errors);
         $this->_view->set('name', $_POST['name']);
         $this->_view->set('email', $_POST['email']);
         $this->_view->output();

      }
   }

   private function validateName(): bool
   {
      if (!preg_match("/^[ァ-ヶー]+\s[ァ-ヶー]+$/u", $_POST['name'])) return false;
      if (mb_strlen($_POST['name']) > 40) return false;
      return true;
   }

   private function validateEmail(): bool {
      if (!preg_match("/^[-0-9a-z_.]+@[-0-9a-z_.]+$/u", $_POST['email'])) return false;
      return true;
   }
}