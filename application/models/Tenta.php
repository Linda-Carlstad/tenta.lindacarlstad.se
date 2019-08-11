<?php
class tenta extends CI_Model{
    public function __construct(){
      $this->load->database();

}
public function get_tentor($source){
$query = $this->db->get_where('filer',array('source' => $source));
return $query->num_rows();
}

public function getSelectedTenta($key){
$this->db->select('*');
  $this->db->like('namn', $key, 'both');
 $query = $this->db->get('filer');
 return $query->result_array();
}




public function upload_tenta(){
  $upload_data = $this->upload->data();
   $file_name=   $upload_data['file_name'];
   $data= array(
     'namn' => $file_name,
     'source' => $this->input->post('source')
);
return $this->db->insert('filer',$data);
}


}
 ?>
