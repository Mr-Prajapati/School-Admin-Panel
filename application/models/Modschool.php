<?php

class Modschool extends CI_Model{
    public function insertcategory($data){
        $this->db->insert('category',$data);
    }

    public function viewdata(){
      return  $this->db->get('category')->result_array();
    }

    public function logadmin($data){
       return  $this->db->get_where('adminschool',$data)->result_array();
    }


//login student
public function logstudent($data){
       return  $this->db->get_where('student',$data)->result_array();
}

//add image to student
public function addimage($data){
       $this->db->insert('student',$data);
}

//retrieve pic from database
public function get_pic($id){
       $this->db->where('id',$id);
      return $this->db->get('student')->row();
   }


  //update profile pic
  public function  updatepic($id,$userdata){
       $this->db->where('id',$id);
       $this->db->update('student',$userdata);
}



    public function deletedata($userid){
             $this->db->where('id',$userid);
             $this->db->delete('category');
    }

    public function editdata($id){
            $this->db->where('id',$id);
         return $user =  $this->db->get('category')->row_array();
    } 

    public function updatedata($id,$data){
        $this->db->where('id',$id);
        $this->db->update('category',$data);
    }

     public function viewclassdata(){
          return $this->db->get('class')->result_array();
     }


     public function insertclass($data){
         $this->db->insert('class',$data);     
     }

    // delete class
    public function deleteclas($id){
         $this->db->where('id',$id);
         $this->db->delete('class');
    }

   //edit class
   public function editclasses($id){
          $this->db->where('id',$id);
          return $user = $this->db->get('class')->row_array();
   }

   //update class data

   public function updateclass($id,$data){
         $this->db->where('id',$id);
         $this->db->update('class',$data);
   }

//view course data
public function viewcoursedata(){
  return $this->db->get('course')->result_array();
}

//insert course data

public function insertcourse($data){
          $this->db->insert('course',$data);
}

//delete course data

public function deletecourses($id){
       $this->db->where('id',$id);
       $this->db->delete('course');
}

//edit courses
public function editcourses($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('course')->row_array();
}

//update course
public function updatecourse($id,$data){
       $this->db->where('id',$id);
       $this->db->update('course',$data);
}

//viewstudent data
public function viewstudentdata(){
  return $this->db->get('student')->result_array();
}


//view studentattendance data

public function viewattendancedata($name){
       $this->db->where('class',$name);
       return $this->db->get('student')->result_array();
}



//insert student data

public function insertstudent($data){
     $this->db->insert('student',$data);
}
//edit student
public function editstud($id){
       $this->db->where('id',$id);
    return $user = $this->db->get('student')->row_array();
}

//delete student data

public function deletestud($id){
       $this->db->where('id',$id);
       $this->db->delete('student');
}

//update student data
public function updatestud($id,$data){
         $this->db->where('id',$id);
         $this->db->update('student',$data);
}
//view staff data
public function viewstaffdata(){
       return $this->db->get('staff')->result_array();
}

//insert staff data
public function insertstaff($data){
        $this->db->insert('staff',$data);
}

//delete staff

public function deletestaf($id){
       $this->db->where('id',$id);
       $this->db->delete('staff');
}

//edit staff
public function editstaf($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('staff')->row_array();
}


//update staff
public function updatestaff($id,$data){
       $this->db->where('id',$id);
       $this->db->update('staff',$data);
}

//insert attendance

public function insertattendance($data){
       $this->db->order_by('id','desc');
       $this->db->insert('attendance',$data);
}
//view attendance data
public function viewallattendancedata(){
       return $this->db->get('attendance')->result_array();
}

//delete attendance

public function deleteattend($id){
       $this->db->where('id',$id);
       $this->db->delete('attendance');
}
//edit attendent
public function editattend($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('attendance')->row_array();
}
//update attendance

public function updateattend($id,$data){
       $this->db->where('id',$id);
       $this->db->update('attendance',$data);
}

// view exam data
public function viewexam(){
       return $this->db->get('exam')->result_array();
}
//insert exam

public function insertexam($data){
       $this->db->order_by('id','desc');
       $this->db->insert('exam',$data);
}

//delete exam

public function deleteexm($id){
        $this->db->where('id',$id);
        $this->db->delete('exam');
}


//edit exam
public function editexam($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('exam')->row_array();
}

//update exam
public function updateexam($id,$data){
       $this->db->where('id',$id);
       $this->db->update('exam',$data);
}
//view time table
public function viewtime(){
       return $this->db->get('timetable')->result_array();
}
//insert timetable

public function inserttime($data){
       $this->db->insert('timetable',$data);
}

//delete time table


public function deletetimetable($id){
       $this->db->where('id',$id);
       $this->db->delete('timetable');
}


//update timetable
public function updatetime($id,$data){
       $this->db->where('id',$id);
       $this->db->update('timetable',$data);
}
//edit time table

public function edittimes($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('timetable')->row_array();
}

//view result
public function viewresult(){
       return $this->db->get('result')->result_array();
}


//view student result
public function viewres(){
       
       return $this->db->get('result')->result_array();
}


//view and get student data for profile
public function viewprofile($id){
       $this->db->where('id',$id);
      return $this->db->get('student')->row();
   }



//insert result

public function insertresult($data){
       $this->db->insert('result',$data);
}

//delete result

public function resultdelete($id){
       $this->db->where('id',$id);
       $this->db->delete('result');
}

//edit result
public function editresult($id){
       $this->db->where('id',$id);
       return $user = $this->db->get('result')->row_array();
}

//update result

public function updateresult($id,$data){
       $this->db->where('id',$id);
       $this->db->update('result',$data);
}







}



?>