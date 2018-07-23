<?php
class Admin extends CI_Controller{
    

    public function index(){
        $this->load->view('login');
    }

    public function login_validation(){  
        $this->load->library('form_validation');  
        $this->load->library('session');
        $this->form_validation->set_rules('email', 'email', 'required');  
        $this->form_validation->set_rules('password', 'password', 'required');  
        if($this->form_validation->run())  
        {  
             //true  
             $email = $this->input->post('email');  
             $password = $this->input->post('password');  
             //model function  
             $this->load->model('Admin_model');  
             if($this->Admin_model->can_login($email, $password))  
             {  
                  $session_data = array(  
                       'email'     =>     $email  
                  );  
                  $this->session->set_userdata($session_data);  
                  redirect('/Admin/admin_panel');
             }  
             else  
             {  
                  $this->load->view('login',['error'=>'Invalid Email and/or Password']);  
                   
             }  
        }  
        else  
        {  
             //false
             $this->load->view('login');  
        }  
   }  

       
        public function logout(){  
        $this->session->unset_userdata('email');  
        redirect('/Admin/index');  
        }  

        public function admin_panel(){
            $this->load->view('admin_panel');
        }
        public function all_books(){
            $this->load->model("Admin_model");
            $this->Admin_model->all_books();
            $this->load->view('all_books');
        }
    

}
?>
