<?php
class api extends CI_Controller{
  public function index (){


      $keyval = $_GET['action'];
      $data['tentor']=  $this->tenta->getSelectedTenta($keyval);
    //  $this->load->view('templates/header');
      $this->load->view('apiet/apifile', $data);
      $this->load->view('templates/apifoot');
  }}
?>
