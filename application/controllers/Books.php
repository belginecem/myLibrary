<?php
class Books extends CI_Controller {

    public function index(){

        $this->load->library('table');

        //pagination
        $config['base_url'] = '/books/index/';
        $config['total_rows'] = $this->db->get('books')->num_rows();
        $config['per_page'] = 2;
        $config['num_links'] = 10;
        $config['first_link'] = 'First';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config); 

        //trick
        $page_number = ($this->uri->segment(3)) == null ? 1 : $this->uri->segment(3);
        $offset = $config["per_page"] * ($page_number - 1);
        
        $limit = $config['per_page'];

        //model data
        $book_list = $this->Books_model->list_books($limit, $offset);
        
        $genre_list= $this->Books_model->list_genres();
        $author_list= $this->Books_model->list_authors();

        $view_data = array(
            "book_list" => $book_list,
            "genre_list" => $genre_list,
            "author_list" => $author_list
        );

        $this->load->view("book_list",$view_data); 
        
    }


    public function get_book($id){
        
        $encodedId=$this->encrypt->encode($id);
        //$id=$decodedId;
        $genre_list= $this->Books_model->list_genres();
        $author_list= $this->Books_model->list_authors();
        $book_detail=$this->Books_model->book_detail($id);
        $view_data = array(
            "book_detail" => $book_detail,
            "genre_list" => $genre_list,
            "author_list" => $author_list
        );
        //var_dump($book_detail);
        //$data["id"]=$id;
        $this->load->view("book_detail",$view_data);
        $decodedId=$this->encrypt->decode($encodedId);
    }
    

    /* public function insert(){
        $this->load->model("books_model");
        //$data=array();
        $insert=$this->books_model->add_books($data);
        if($insert){
            echo "successful";
        }else{
            echo "failed";
        }
    } */
}