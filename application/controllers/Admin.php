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
            $this->load->model('Admin_model');
            $authors = $this->Admin_model->all_authors();
            $genres = $this->Admin_model->all_genres();
            $data = array(
                'authors' => $authors,
                'genres' => $genres
            );
            $this->load->view('new_book',$data);
        }
        public function add_book(){

            $mime_type = array(
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            );
            if (isset ( $_FILES['cover'] ) ) {
                $cover_name = $_FILES['cover']['name'];
                $file_size = $_FILES['cover']['size'];
                $file_type = $_FILES['cover']['type'];
                if(in_array($file_type,$mime_type) && ($file_size < 2097152)){
                    move_uploaded_file($_FILES['cover']['tmp_name'], APPPATH.'../public/uploads/'.$_FILES['cover']['name']);
                } 
            }
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('author_id','authors_id','required');
            $this->form_validation->set_rules('genre_id','genres_id','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('ISBN', 'ISBN', 'regex_match[/^[0-9]{13}$/]'); 
            if($this->form_validation->run()){
                $name = $this->input->post('name');  
                $cover = $cover_name;
                $author_id = $this->input->post('author_id');
                $genre_id = $this->input->post('genre_id'); 
                $publication_date = $this->input->post('publication_date');
                $ISBN = $this->input->post('ISBN');
                $description = $this->input->post('description');
                $quote = $this->input->post('quote');
                $quote_2 = $this->input->post('quote_2');
                $quote_3 = $this->input->post('quote_3');
                $data=array(
                    'name' => $name,
                    'author_id' => $author_id,
                    'genre_id' => $genre_id,
                    'publication_date' => $publication_date,
                    'ISBN' => $ISBN,
                    'description' => $description,
                    'quote' => $quote,
                    'quote_2' => $quote_2,
                    'quote_3' => $quote_3,
                    'cover' => $cover
                 );
                 $this->load->model('Admin_model');
                 $this->Admin_model->add_book($data);
                 
            }else{  
                $this->load->model('Admin_model');
                $authors = $this->Admin_model->all_authors();
                $genres = $this->Admin_model->all_genres();
                $data = array(
                    'authors' => $authors,
                    'genres' => $genres,
                    'error'=>'Please fill out all required fields with right values!'
                );
                $this->load->view('new_book',$data); 
            }  
    }
    public function update_book(){

        $book_id = $this->input->post('book_id');
        
        $mime_type = array(
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            );
            //var_dump($_FILES);
            if (isset ( $_FILES['cover']) &&  $_FILES['cover']['name'] !='') {
                //var_dump('burada');
                
            
                $cover_name = $_FILES['cover']['name'];
                $file_size = $_FILES['cover']['size'];
                $file_type = $_FILES['cover']['type'];
                if(in_array($file_type,$mime_type) && ($file_size < 2097152)){
                    move_uploaded_file($_FILES['cover']['tmp_name'], APPPATH.'../public/uploads/'.$_FILES['cover']['name']);
                }
                $cover = $cover_name;
            } else {
                $cover = null;
            }
            //var_dump( $cover);
            //exit();
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('author_id','authors_id','required');
            $this->form_validation->set_rules('genre_id','genres_id','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('ISBN', 'ISBN', 'regex_match[/^[0-9]{13}$/]'); 
            if($this->form_validation->run()){
                $name = $this->input->post('name'); 
                
                $author_id = $this->input->post('author_id');
                $genre_id = $this->input->post('genre_id'); 
                $publication_date = $this->input->post('publication_date');
                $ISBN = $this->input->post('ISBN');
                $description = $this->input->post('description');
                $quote = $this->input->post('quote');
                $quote_2 = $this->input->post('quote_2');
                $quote_3 = $this->input->post('quote_3');
                $data=array(
                    'name' => $name,
                    'author_id' => $author_id,
                    'genre_id' => $genre_id,
                    'publication_date' => $publication_date,
                    'ISBN' => $ISBN,
                    'description' => $description,
                    'quote' => $quote,
                    'quote_2' => $quote_2,
                    'quote_3' => $quote_3,
                    'cover' => $cover
                 );
                 $this->load->model('Admin_model');
                 $this->Admin_model->update_run($book_id, $data);
                 
            }else{  
                $this->load->model('Admin_model');
                $authors = $this->Admin_model->all_authors();
                $genres = $this->Admin_model->all_genres();
                $data = array(
                    'authors' => $authors,
                    'genres' => $genres,
                    'error'=>'Please fill out all required fields with right values!'
                );
                $this->load->view('new_book',$data); 
            }  

    }
    
        
    public function add_author(){
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('name','name','required');
        if($this->form_validation->run()){
            $name = $this->input->post('name');  
            $data=array(
                'name' => $name
             );
             $this->load->model('Admin_model');
             $this->Admin_model->add_author($data);
             
        }else{  
            $this->load->model('Admin_model');
            $authors = $this->Admin_model->all_authors();
            $genres = $this->Admin_model->all_genres();
            $data = array(
                'authors' => $authors,
                'genres' => $genres,
                'error'=>'Please fill out all required fields with right values!'
            );
            $this->load->view('new_book',$data); 
        }  
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
            $book_id=$id;
            $this->load->model('Admin_model');
            $edit = $this->Admin_model->update_book($book_id);
            $author=$this->Admin_model->all_authors();
            $genre=$this->Admin_model->all_genres();
            $data = array(
                'book' => $edit,
                'authors' =>$author,
                'genres' =>$genre
            );
            $this->load->view('edit_book',$data);
        }
        
    

}
?>
