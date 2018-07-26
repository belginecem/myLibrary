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
            $this->load->model('Admin_model');
            $this->Admin_model->count_books();
            $this->Admin_model->count_authors();
            $this->Admin_model->count_genres();
            $data['books'] = $this->Admin_model->count_books();
            $data['authors'] = $this->Admin_model->count_authors();
            $data['genres'] = $this->Admin_model->count_genres();
            $this->load->view('admin_panel',$data);
        }
        public function all_books(){
            $this->load->model("Admin_model");
            $data= $this->Admin_model->all_books();
            $data = array(
                "books" => $data
            );
            $this->load->view('all_books',$data);
        }
        public function all_authors(){
            $this->load->model("Admin_model");
            $data=$this->Admin_model->all_authors();
            $data = array(
                "authors" => $data
            );
            $this->load->view('all_authors',$data);
        }
        public function all_genres(){
            $this->load->model('Admin_model');
            $data = $this->Admin_model->all_genres();
            $data = array(
                'genres' => $data
            );
            $this->load->view('all_genres',$data);
        }
        public function new_book(){
            $this->load->view('new_book');
        }
        public function new_author(){
            $this->load->view('new_author');
        }
        public function new_genre(){
            $this->load->view('new_genre');
        }
        public function delete_book($id){
            $delete = $this->db->delete("books",array("id" => $id));
            if($delete){
                redirect("/Admin/all_books");
            }else{
                echo "Error!";
            }
        }
        public function delete_author($id){
            $delete = $this->db->delete("authors",array("id" => $id));
            if($delete){
                redirect("/Admin/all_authors");
            }else{
                echo "Error!";
            }
        }
        public function delete_genre($id){
            $delete = $this->db->delete("genres",array("id" => $id));
            if($delete){
                redirect("/Admin/all_genres");
            }else{
                echo "Error!";
            }
        }
        public function edit_book($id){
            $this->load->view('edit_book');
        }
        
    

}
?>
