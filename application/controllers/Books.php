<?php
class Books extends CI_Controller{

    public function index($offset=0){

    $this->load->library('pagination');
    $this->load->library('table');
    $config['base_url'] = base_url().'books/index';
    //echo uri_string();
    //var_dump(uri_string());
    //$this->uri->total_segments();
    //var_dump($this->db->get('books')->num_rows());
    $config['total_rows'] = $this->db->get('books')->num_rows();
    $config['per_page'] = 3;
    $config['uri_segment']= 5;
    //$config['attributes'] = array('class' => 'pagination-link');
    $config['page_query_string'] = TRUE;

    $this->pagination->initialize($config); 
    //$start = isset($_GET['start']) ? $_GET['start'] : 0;
    //$book_list = $this->Books_model->list_books($start, $config['per_page']);
    $book_list = $this->Books_model->list_books($this->uri->segment(5), $config['per_page'], $offset);
    $genre_list= $this->Books_model->list_genres();
    $author_list= $this->Books_model->list_authors();

    $view_data = array(
        "book_list" => $book_list,
        "genre_list" => $genre_list,
        "author_list" => $author_list
    );

    $this->load->view("book_list",$view_data); 
   



        //$this->db->get('books', $config['per_page'], $this->uri->segment(3));
        //$data['records'] = $this->Books_model->list_books(FALSE, $config['per_page'], $offset);
        //$data['records'] = $this->Books_model->list_books($this->uri->segment(3), $config['per_page'], $offset);
        //$book_list = $this->Books_model->list_books($this->uri->segment(3), $config['per_page'], $offset);
        
        //$book_list = $this->Books_model->list_books($start, $config['per_page']);
        

        
        
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