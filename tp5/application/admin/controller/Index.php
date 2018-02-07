<?php
namespace app\admin\controller;
use think\Controller;
class Index extends controller
{
    public function index()
    {
      $this->redirect('Conf/lst');
    }
}
