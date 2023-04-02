<?php

class Admin extends CI_Controller{
    public function index(){
      if($this->session->userdata('id')){
          
            $data = array();
        $data['course']  = $this->Modschool->viewcoursedata();
        $data['staff']  = $this->Modschool->viewstaffdata();
        $data['student']  = $this->Modschool->viewstudentdata();
        $data['class']  = $this->Modschool->viewclassdata();
           $this->load->view('header/header');
           $this->load->view('header/navleft');
           $this->load->view('header/navtop');
           $this->load->view('home',$data);
           $this->load->view('header/footer');
           
      }else{
            $this->session->set_flashdata('error','please fill all the fields.');
             redirect('admin/login');
      }
       
        
    }


  public function category(){
    if($this->session->userdata('id')){
             $data = array();
             $data['user']  = $this->Modschool->viewdata();
             $this->load->view('header/header');
             $this->load->view('header/navleft');
             $this->load->view('header/navtop');
             $this->load->view('header/category',$data);
             $this->load->view('header/footer');
             
    }else{
             $this->session->set_flashdata('error','please fill all the fields.');
             redirect('admin/login');
    }
    
  }

  public function insertcategorys(){
      $this->form_validation->set_rules('name','Enter Category Name','required');
      if($this->form_validation->run() == true){
           $data['name'] = $this->input->post('name');
          // print_r($data); die;
            $insert = $this->Modschool->insertcategory($data);
            echo json_encode($insert);
      }
  }

  public function login(){
      $this->load->view('login');
  }



  public function logout(){
    if($this->session->userdata('id')){
        $this->session->userdata('id','');
        $this->session->set_flashdata('error','logout successfully!');
        redirect('admin/login');
    }
}



public function registered(){
    $this->load->view('register');
}

public function loginadmin(){
    $data['email'] = $this->input->post('email');
    $data['password'] = ($this->input->post('password'));
    if(!empty($data['email']) && !empty($data['password'])){

            
            $user = $this->Modschool->logadmin($data);
            if(count($user) == 1){
                $forsession = array(
                            'id'=>$user[0]['id'],
                            'email'=>$user[0]['email']
                );
                $this->session->set_userdata($forsession);
                 if($this->session->userdata('id')){
                     redirect('admin');
                 }else{
                     echo 'session is not created';
                 }
             }else{
                    $this->session->set_flashdata('error','email and password is not matched');
                    redirect('admin/login');
             }
        }else{
                  $this->session->set_flashdata('error','please fill all the fields.');
                  redirect('admin/login');
        }
}


public function delete($userid){
          $this->Modschool->deletedata($userid);
          redirect('admin/category');
}


public function editcategory($id){
         $user =  $this->Modschool->editdata($id);
         $data = array();
         $data['user'] = $user;
         $this->form_validation->set_rules('name','Enter Category Name','required');
         if($this->form_validation->run() == false){
            $this->load->view('header/header');
            $this->load->view('header/navleft');
            $this->load->view('header/navtop');
            $this->load->view('header/editcategory',$data);
            $this->load->view('header/footer');
            
         }else{
                  $data = array();
                  $data['name'] = $this->input->post('name');
                  $this->Modschool->updatedata($id,$data);
                  redirect('admin/category');
                   

         }
}

public function class(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewclassdata();
        $data['cats']  = $this->Modschool->viewdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/class',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}

}

public function insertclass(){
       $this->form_validation->set_rules('name','Enter Class Name','required');
       $this->form_validation->set_rules('cat','Select Category','required');
       if($this->form_validation->run() == true){
          $data['name'] = $this->input->post('name');
          $data['category'] = $this->input->post('cat');
          $insert = $this->Modschool->insertclass($data);
          echo json_encode($insert);
   }
       
}

public function deleteclass($id){
        $this->Modschool->deleteclas($id);
        redirect('admin/class');
}

public function editclass($id){
    $user =  $this->Modschool->editclasses($id);
    $data = array();
    $data['cats']  = $this->Modschool->viewdata();
    $data['user'] = $user;
    $this->form_validation->set_rules('name','Enter Class Name','required');
    $this->form_validation->set_rules('cat','Select Category','required');
    if($this->form_validation->run() == false){
       $this->load->view('header/header');
       $this->load->view('header/navleft');
       $this->load->view('header/navtop');
       $this->load->view('header/editclass',$data);
       $this->load->view('header/footer');
       
    }else{
             $data = array();
             $data['name'] = $this->input->post('name');
             $data['category'] = $this->input->post('cat');
             $this->Modschool->updateclass($id,$data);
             redirect('admin/class');
              
    }
}

public function course(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewcoursedata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/course',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function insertcourse(){
       $this->form_validation->set_rules('course','Enter Course Name','required');
       $this->form_validation->set_rules('duration','Enter Course Duration','required');
       $this->form_validation->set_rules('fees','Enter Course Fees','required');
       $this->form_validation->set_rules('started','Course Started','required');
       if($this->form_validation->run() == true){
        $data['name'] = $this->input->post('course');
        $data['duration'] = $this->input->post('duration');
        $data['fees'] = $this->input->post('fees');
        $data['started'] = $this->input->post('started');
        $insert = $this->Modschool->insertcourse($data);
        echo json_encode($insert);
 }
}

public function deletecourse($id){
    $this->Modschool->deletecourses($id);
    redirect('admin/course');
}

public function editcourse($id){
       $user =  $this->Modschool->editcourses($id);
       $data = array();
       $data['user'] = $user;
       $this->form_validation->set_rules('course','Enter Course Name','required');
       $this->form_validation->set_rules('duration','Enter Course Duration','required');
       $this->form_validation->set_rules('fees','Enter Course Fees','required');
       $this->form_validation->set_rules('started','Course Started','required');
    if($this->form_validation->run() == false){
       $this->load->view('header/header');
       $this->load->view('header/navleft');
       $this->load->view('header/navtop');
       $this->load->view('header/editcourse',$data);
       $this->load->view('header/footer');
       
    }else{
             $data = array();
             $data['name'] = $this->input->post('course');
             $data['duration'] = $this->input->post('duration');
             $data['fees'] = $this->input->post('fees');
             $data['started'] = $this->input->post('started');
             $this->Modschool->updatecourse($id,$data);
             redirect('admin/course');
              
    }
}


public function student(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewstudentdata();
        $data['cats']  = $this->Modschool->viewdata();
        $data['student']  = $this->Modschool->viewclassdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/student',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function insertstudent(){
    $this->form_validation->set_rules('sname','Enter Student Name','required');
    $this->form_validation->set_rules('fname','Enter Father Name','required');
    $this->form_validation->set_rules('email','Enter Email','required');
    $this->form_validation->set_rules('cat','Enter Category Name','required');
    $this->form_validation->set_rules('class','Enter Class Name','required');
    $this->form_validation->set_rules('dob','Enter Student DOB','required');
    $this->form_validation->set_rules('join','Enter Join Date','required');
    if($this->form_validation->run() == true){
     $data['name'] = $this->input->post('sname');
     $data['fname'] = $this->input->post('fname');
     $data['email'] =  $this->input->post('email');
     $data['password'] = md5('123456');
     $data['category'] = $this->input->post('cat');
     $data['class'] = $this->input->post('class');
     $data['dob'] = $this->input->post('dob');
     $data['pendingfees'] = $this->input->post('fees');
     $data['joindate'] = $this->input->post('join');
     
     $insert = $this->Modschool->insertstudent($data);
     echo json_encode($insert);
    }
}

public function deletestudent($id){
           $this->Modschool->deletestud($id);
           redirect('admin/student');
}

public function editstudent($id){
    $user =  $this->Modschool->editstud($id);
    $data = array();
    $data['user'] = $user;
    $this->form_validation->set_rules('sname','Enter Student Name','required');
    $this->form_validation->set_rules('fname','Enter Father Name','required');
    $this->form_validation->set_rules('email','Enter Email','required');
    $this->form_validation->set_rules('cat','Enter Category Name','required');
    $this->form_validation->set_rules('class','Enter Class Name','required');
    $this->form_validation->set_rules('dob','Enter Student DOB','required');
    $this->form_validation->set_rules('join','Enter Join Date','required');
 if($this->form_validation->run() == false){
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/editstudent',$data);
    $this->load->view('header/footer');
    
 }else{
          $data = array();
          $data['name'] = $this->input->post('sname');
          $data['fname'] = $this->input->post('fname');
          $data['email'] = $this->input->post('email');
          $data['category'] = $this->input->post('cat');
          $data['class'] = $this->input->post('class');
          $data['dob'] = $this->input->post('dob');
          $data['joindate'] = $this->input->post('join');
          $this->Modschool->updatestud($id,$data);
          redirect('admin/student');
           
 }
}


public function staff(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewstaffdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/staff',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}


public function insertstaff(){
    $this->form_validation->set_rules('sname','Enter Staff Name','required');
    $this->form_validation->set_rules('fname','Enter Father Name','required');
    $this->form_validation->set_rules('email','Enter Email','required');
    $this->form_validation->set_rules('mobile','Enter Mobile Number','required');
    $this->form_validation->set_rules('dob','Enter Staff DOB','required');
    $this->form_validation->set_rules('join','Enter Join Date','required');
    $this->form_validation->set_rules('exp','Enter Exprience','required');
    $this->form_validation->set_rules('payment','Enter Staff Payment','required');
    $this->form_validation->set_rules('staffarea','Enter Staff Other Information','required');
    if($this->form_validation->run() == true){
     $data['name'] = $this->input->post('sname');
     $data['fname'] = $this->input->post('fname');
     $data['email'] =  $this->input->post('email');
     $data['mobile'] = $this->input->post('mobile');
     $data['dob'] = $this->input->post('dob');
     $data['join'] = $this->input->post('join');
     $data['exp'] = $this->input->post('exp');
     $data['payment'] = $this->input->post('payment');
     $data['staffarea'] = $this->input->post('staffarea');
     
     $insert = $this->Modschool->insertstaff($data);
     echo json_encode($insert);
    }
}

public function deletestaff($id){
        $this->Modschool->deletestaf($id);
        redirect('admin/staff');
}

public function editstaff($id){
    $user =  $this->Modschool->editstaf($id);
    $data = array();
    $data['user'] = $user;
    $this->form_validation->set_rules('sname','Enter Staff Name','required');
    $this->form_validation->set_rules('fname','Enter Father Name','required');
    $this->form_validation->set_rules('email','Enter Email','required');
    $this->form_validation->set_rules('mobile','Enter Mobile Number','required');
    $this->form_validation->set_rules('dob','Enter Staff DOB','required');
    $this->form_validation->set_rules('join','Enter Join Date','required');
    $this->form_validation->set_rules('exp','Enter Exprience','required');
    $this->form_validation->set_rules('payment','Enter Staff Payment','required');
    
 if($this->form_validation->run() == false){
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/editstaff',$data);
    $this->load->view('header/footer');
    
 }else{
          $data = array();
          $data['name'] = $this->input->post('sname');
          $data['fname'] = $this->input->post('fname');
          $data['email'] =  $this->input->post('email');
          $data['mobile'] = $this->input->post('mobile');
          $data['dob'] = $this->input->post('dob');
          $data['join'] = $this->input->post('join');
          $data['exp'] = $this->input->post('exp');
          $data['payment'] = $this->input->post('payment');
          $this->Modschool->updatestaff($id,$data);
          redirect('admin/staff');
           
 }
}

public function attendance(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewclassdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/attendance',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function userattendance($name){
    $data = array();
    $data['user']  = $this->Modschool->viewattendancedata($name);
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/userattendance',$data);
    $this->load->view('header/footer');
    

}

public function allattendance(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewallattendancedata();
       
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/allattendance',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function insertallattendance(){
   
    $this->form_validation->set_rules('status','Enter Status','required');
    $this->form_validation->set_rules('date','Select Date','required');
    $this->form_validation->set_rules('remark','Enter Remark','required');
   
    if($this->form_validation->run() == true){
       
     $data['status'] = $this->input->post('status');
     $data['date'] =  $this->input->post('date');
     $data['remark'] = $this->input->post('remark');
     
     
     $insert = $this->Modschool->insertattendance($data);
     echo json_encode($insert);
    }
}


public function deleteattendance($id){
    $this->Modschool->deleteattend($id);
    redirect('admin/allattendence');
}








public function editattendance($id){
    $user =  $this->Modschool->editattend($id);
    $data = array();
    $data['user'] = $user;
   
    $this->form_validation->set_rules('status','Enter Status','required');
    $this->form_validation->set_rules('date','Select Date','required');
    $this->form_validation->set_rules('remark','Enter Remark','required');

 if($this->form_validation->run() == false){
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/editattend',$data);
    $this->load->view('header/footer');
    
 }else{
          $data = array();
             
     $data['status'] = $this->input->post('status');
     $data['date'] =  $this->input->post('date');
     $data['remark'] = $this->input->post('remark');
     
          $this->Modschool->updateattend($id,$data);
          redirect('admin/allattendance');
           
 }
}


public function exam(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewexam();
        $data['categ']  = $this->Modschool->viewdata();
        $data['student']  = $this->Modschool->viewclassdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/exam',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function insertexam(){
    $this->form_validation->set_rules('title','Enter Title','required');
    $this->form_validation->set_rules('date','Select Start Date','required');
    $this->form_validation->set_rules('category','Select Category','required');
    $this->form_validation->set_rules('class','Select Class','required');
   
    if($this->form_validation->run() == true){
       
     $data['title'] = $this->input->post('title');
     $data['date'] =  $this->input->post('date');
     $data['category'] = $this->input->post('category');
     $data['class'] = $this->input->post('class');
     
     
     $insert = $this->Modschool->insertexam($data);
     echo json_encode($insert);
    }
}

public function deleteexam($id){
          $this->Modschool->deleteexm($id);
          redirect('admin/exam');
}

public function editexam($id){
    $user =  $this->Modschool->editexam($id);
    $data = array();
    $data['user'] = $user;
     $data['categ']  = $this->Modschool->viewdata();
     $data['student']  = $this->Modschool->viewclassdata();
    $this->form_validation->set_rules('title','Enter Title','required');
    $this->form_validation->set_rules('date','Select Start Date','required');
    $this->form_validation->set_rules('category','Select Category','required');
    $this->form_validation->set_rules('class','Select Class','required');

 if($this->form_validation->run() == false){
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/editexam',$data);
    $this->load->view('header/footer');
    
 }else{
          $data = array();
             
     $data['title'] = $this->input->post('title');
     $data['date'] =  $this->input->post('date');
     $data['category'] = $this->input->post('category');
     $data['class'] = $this->input->post('class');
     
      $this->Modschool->updateexam($id,$data);
      redirect('admin/exam');
           
 }
}

public function timetable(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewtime();
        $data['exam']  = $this->Modschool->viewexam();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/time',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
}

public function inserttime(){
    $data['exam_id'] = $this->input->post('exam');
     $data['file'] =  $_FILES['file']['name'];
     $this->Modschool->inserttime($data);
     $config['upload_path'] = './uploads/';
     $config['allowed_types'] = 'gif|jpg|png|pdf|doc';

     $this->load->library('upload', $config);
    
     redirect('admin/timetable');
   
}

public function deletetime($id){
         $this->Modschool->deletetimetable($id);
         redirect('admin/timetable');
}

   public function edittime($id){
       $user =  $this->Modschool->edittimes($id);
       $data = array();
      $data['user'] = $user;
    
      $this->form_validation->set_rules('exam','Select Exam','required');
   
    if($this->form_validation->run() == false){
       $this->load->view('header/header');
       $this->load->view('header/navleft');
       $this->load->view('header/navtop');
       $this->load->view('header/edittime',$data);
      $this->load->view('header/footer');
      
    }else{
           
             
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
     
            $this->load->library('upload', $config);
           $data = array();
            $data['exam_id'] = $this->input->post('exam');
           $data['file'] =  $_FILES['file']['name'];
     
             $this->Modschool->updatetime($id,$data);
             redirect('admin/timetable');
           
  }
 }

 public function result(){
    if($this->session->userdata('id')){
        $data = array();
        $data['user']  = $this->Modschool->viewresult();
        $data['exam']  = $this->Modschool->viewexam();
        $data['stud']  = $this->Modschool->viewstudentdata();
        $this->load->view('header/header');
        $this->load->view('header/navleft');
        $this->load->view('header/navtop');
        $this->load->view('header/result',$data);
        $this->load->view('header/footer');
        
}else{
        $this->session->set_flashdata('error','please fill all the fields.');
        redirect('admin/login');
}
 }

 public function insertresult(){
    $this->form_validation->set_rules('student','Select Student','required');
    $this->form_validation->set_rules('exam','Select Exam','required');
    $this->form_validation->set_rules('result','Result','required');
   
    if($this->form_validation->run() == true){
       
     $data['sname'] = $this->input->post('student');
     $data['exam'] =  $this->input->post('exam');
     $data['result'] = $this->input->post('result');
     
     $insert = $this->Modschool->insertresult($data);
     echo json_encode($insert);
    }
 }

public function deleteresult($id){
       $this->Modschool->resultdelete($id);
       redirect('admin/result');
}

public function editresult($id){
    $user =  $this->Modschool->editresult($id);
    $data = array();
    $data['user'] = $user;
    $data['exam']  = $this->Modschool->viewexam();
    $data['stud']  = $this->Modschool->viewstudentdata();
    $this->form_validation->set_rules('student','Select Student','required');
    $this->form_validation->set_rules('exam','Select Exam','required');
    $this->form_validation->set_rules('result','Result','required');
   
 if($this->form_validation->run() == false){
    $this->load->view('header/header');
    $this->load->view('header/navleft');
    $this->load->view('header/navtop');
    $this->load->view('header/editresult',$data);
    $this->load->view('header/footer');
    
 }else{
          $data = array();
             
          $data['sname'] = $this->input->post('student');
          $data['exam'] =  $this->input->post('exam');
          $data['result'] = $this->input->post('result');  
          $this->Modschool->updateresult($id,$data);
          redirect('admin/result');
           
 }
}





}





?>