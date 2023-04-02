<?php

class Student extends CI_Controller{
    public function index(){
        if($this->session->userdata('id')){
            $id = $this->session->userdata('id');
            $dataa['profile'] = $this->Modschool->viewprofile($id);
            $data['user'] = $this->Modschool->get_pic($id);
            $this->load->view('student/header');
            $this->load->view('student/navleft',$data);
           $this->load->view('student/navtop');
           $this->load->view('studenthome',$dataa);
            $this->load->view('student/footer');
            
        }else{
            $this->session->set_flashdata('error','please fill all the fields.');
            redirect('student/login');
        }
    }

    public function login(){
        $this->load->view('student/login');
    }


    public function logout(){
        if($this->session->userdata('id')){
            $this->session->userdata('id','');
            $this->session->set_flashdata('error','logout successfully!');
            redirect('student/login');
        }
    }

   public function loginstudent(){
    $data['email'] = $this->input->post('email');
    $data['password'] = md5($this->input->post('password'));
    if(!empty($data['email']) && !empty($data['password'])){
          $user =  $this->Modschool->logstudent($data);
          
          if(count($user) == 1){
                    $session = array(
                         'id'=>$user[0]['id'],
                         'email'=>$user[0]['email'],
                         'name'=>$user[0]['name'],
                          
                    );
                    $this->session->set_userdata($session);
                    if($this->session->userdata('id')){
                        redirect('student');
                    }else{
                        echo 'session is not created';
                    }
          }else{
            $this->session->set_flashdata('error','email and password is not matched please contact to school admin');
            redirect('student/login');
     }

    }else{
             $this->session->set_flashdata('error','please fill all the fields.');
             redirect('student/login');
    }
   }
      
   public function changepic(){
    if($this->session->userdata('id')){
    $id = $this->session->userdata('id');
         $data['user'] = $this->Modschool->get_pic($id);
        $this->load->view('student/header');
        $this->load->view('student/navleft',$data);
         $this->load->view('student/navtop');
         $this->load->view('student/changeimage',);
         $this->load->view('student/footer');
         
    }else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('student/login');
    }
   }

   public function changeimage(){
    if($this->session->userdata('id')){
   
             $config['upload_path'] = './upload/';
             $config['allowed_types'] = 'gif|jpg|png';
      
             $this->load->library('upload', $config);
             if (!$this->upload->do_upload('profile_pic')) {
                 // if(isset($_FILES['profile_pic'])){
                     $error = array('error' => $this->upload->display_errors());
                     $this->load->view('student/header'); 
                     $this->load->view('student/navleft');
                     $this->load->view('student/navtop');
                     $this->load->view('student/changeimage',$error);
                     $this->load->view('student/footer');
                     
                 // }
             } else {
                $id = $this->session->userdata('id');
                $user = $this->Modschool->get_pic($id);
                if($user->image && file_exists('upload/'.$user->profilepic)) {
                    unlink('upload/'.$user->image);
                }
                   $data =  $this->upload->data();
                  // print_r($data); die;
                   $filename = $data['file_name'];
                 $userdata = array(
                    'image' => $filename
                  );
                  $this->Modschool->updatepic($id,$userdata);
                  $this->session->set_flashdata('error','image uploaded successfully');
                  redirect('student/changepic'); 

             }
             

   }
    else{
           $this->session->set_flashdata('error','please fill all the fields.');
            redirect('student/login');
       }
   }

public function table(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewtime();
        $id = $this->session->userdata('id');
        $dataa['user'] = $this->Modschool->get_pic($id);
        $this->load->view('student/header'); 
        $this->load->view('student/navleft',$dataa);
        $this->load->view('student/navtop');
        $this->load->view('student/table',$data);
        $this->load->view('student/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('student/login');
}
}

public function result(){
    if($this->session->userdata('id')){
        $data = array();
        
        
        
        $data['user']  = $this->Modschool->viewres();
        $id = $this->session->userdata('id');
       
        $dataa['user'] = $this->Modschool->get_pic($id);
        $this->load->view('student/header'); 
        $this->load->view('student/navleft',$dataa);
        $this->load->view('student/navtop');
        $this->load->view('student/result',$data);
        $this->load->view('student/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('student/login');
}
}

public function profile(){
    if($this->session->userdata('id')){
        $data = array();
        $id = $this->session->userdata('id');
        $data['profile'] = $this->Modschool->viewprofile($id);
        $dataa['user'] = $this->Modschool->get_pic($id);
        $this->load->view('student/header'); 
        $this->load->view('student/navleft',$dataa);
        $this->load->view('student/navtop');
        $this->load->view('student/profile',$data);
        $this->load->view('student/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('student/login');
}
}




}





?>