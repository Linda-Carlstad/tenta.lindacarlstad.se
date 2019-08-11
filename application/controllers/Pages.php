<?php
  class Pages extends CI_Controller{
    public function view ($page = 'home'){



      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
          show_404();
      }

        if(isset($_POST['source'])){

          $config['upload_path']          = './uploads/';
          $config['allowed_types']        = 'pdf';
          $config['max_size']             = 4000;

          $this->load->library('upload', $config);

          $data['title'] =ucfirst($_POST['source']);
          $data['upload'] =" ";
          $data['errorMessage'] =" ";
          $data['antal'] =$this->tenta->get_tentor($_POST['source']);
          $this->form_validation->set_rules('file1','Välj fil','required');

          if ( ! $this->upload->do_upload('file1')){
            $data['errorMessage'] ="Filen kunde inte laddas upp, Vänligen försök igen ";
            $this->load->view('templates/header');
            $this->load->view('templates/toppage', $data);
            $this->load->view('pages/'.$_POST['source'], $data);
            $this->load->view('templates/footer');

          }
          else{

            $upload_data = $this->upload->data();
            $file_name =   $upload_data['file_name'];
            $data['upload']= $file_name;
            $this->tenta->upload_tenta();
            $data['errorMessage'] ="Filen är uppladdad";
            $this->load->view('templates/header');
            $this->load->view('templates/toppage', $data);
            $this->load->view('pages/'.$_POST['source'], $data);
            $this->load->view('templates/footer');

          }

        }

        else{
          if($page=="home"){
                $this->load->view('templates/header');
                $this->load->view('pages/'.$page);
                $this->load->view('templates/apifoot');
          }
          else{




        $data['title']= ucfirst($page);
        $data['upload'] =" ";
          $data['errorMessage'] =" ";
        $data['antal'] =$this->tenta->get_tentor($page);

        $this->load->view('templates/header');
        $this->load->view('templates/toppage', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        }
        }
    }



  }
