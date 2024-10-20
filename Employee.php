<?php
defined('BASEPATH') OR exit('No direct script accessed allowed');
class Employee extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url');
        $this->load->library('upload');
    }
    public function index(){
        $data['employees']= $this->Employee_model->get_all_employee(50 );
        $this->load->view('employee/index',$data);
    }

    public function create(){
        $data=array(
            'first_name'=>set_value('first_name'),
            'last_name'=>set_value('last_name'),
            'email'=>set_value('email'),
            'mobile'=>set_value('mobile'),
            'address'=>set_value('address'),
            'gender'=>set_value('gender'),
            'hobby'=>set_value('hobby'),
        );
        $this->load->view('employee/form',$data);
    }
    public function create_action(){
        // print_r($_POST);exit;
        $config['upload_path']='./uploads/';
        $config['allowed_types']='jpg|jpeg|png';
        $config['max_size']=2048;
        $config['file_name']= uniqid();

        $this->upload->initialize($config);
        if(!$this->upload->do_upload('photo')){
            $error=$this->upload->display_errors();
            echo "File Upload failed" .$error;
            return;
        }else{
            $upload_data= $this->upload->data();
            $photo_path= $upload_data['file_name'];
        $data=array(
            'first_name'=>$this->input->post('first_name',TRUE),
            'last_name'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email'),
            'mobile'=>$this->input->post('country_code'). $this->input->post('mobile'),
            'address'=>$this->input->post('address'),
            'gender'=>$this->input->post('gender'),
            'hobby'=>implode(',', $this->input->post('hobby') ?? []),
            'photo'=>$photo_path,
        );
        $this->Employee_model->SaveData('employee',$data);
        echo "Employee has been created successfully.";
    }
}
public function update($id){
    $employee=$this->Employee_model->get_employee_by_id($id);
    if(!$employee){
        show_404();
    }
    $data=array(
        'employee'=>$employee,
    );
    $this->load->view('employee/edit',$data);
}
public function update_action(){
    if($this->input->post('update')){
        $id= $this->input->post('id');
        $employee=$this->Employee_model->get_employee_by_id($id);
        if(!$employee){
            show_404();
            return;
        }
        $config['upload_path']='./uploads/';
        $config['allowed_types']='jpg|jpeg|png';
        $config['max_size']=2048;
        $config['file_name']= uniqid();
        $this->upload->initialize($config);
        $photo_path= $employee->photo;
        if($_FILES ['photo']['size'] >0){
            if(!$this->upload->do_upload('photo')){
                $error=$this->upload->display_errors();
                echo "File Upload failed:" .$error;
                return;
            }else{
                $upload_data=$this->upload->data();
                $photo_path=$upload_data['file_name'];

            }
            $data=array(
                'first_name'=>$this->input->post('first_name',TRUE),
                'last_name'=>$this->input->post('last_name',TRUE),
                'email'=>$this->input->post('email',TRUE),
                'mobile'=>$this->input->post('country_code'). $this->input->post('mobile'),
                'address'=>$this->input->post('address',TRUE),
                'gender'=>$this->input->post('gender',TRUE),
                'hobby'=>implode(',', $this->input->post('hobby') ?? []),
                'photo'=>$photo_path,
           );
           if($this->Employee_model->UpdateData('employee',$data,array('id'=>$id))){
            echo "Employee has been updated successfully";
            redirect('employee/index');
           }
        }
    }
}
public function delete($id){
    $employee=$this->Employee_model->get_employee_by_id($id);
    if(!$employee){
        show_404();
        return;
    }
    if($this->Employee_model->DeleteData('employee',array('id'=>$id))){
        echo "Employee has been deleted successfully";
        redirect('employee/index');
    }else{
        echo "failed to delete employee.";
    }
}
}

?>