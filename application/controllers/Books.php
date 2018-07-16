<?php
class Books extends CI_Controller {

    public function index(){

        $this->load->library('table');

        //pagination
        $config['base_url'] = '/books/index/';
        $config['total_rows'] = $this->db->get('books')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] ='</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item"><a href="#" aria-label="Next">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item"><a href="#" aria-label="Next">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        
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
        
        //$encodedId=$this->encrypt->encode($id);
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
        //$decodedId=$this->encrypt->decode($encodedId);
    }
 
    public function execute_search()
        {
            // Retrieve the posted search term.
            $search_term = $this->input->post('search');
        
            // Use a model to retrieve the results. 
            $data['results'] = $this->Books_model->get_results($search_term);
            // Pass the results to the view.
            $this->load->view('search_result',$data);
            
            }
    public function genre($genre){
        $genre = urldecode($genre);
        $book_list = $this->Books_model->list_by_genre($genre);
        $genre_list= $this->Books_model->list_genres();
        $author_list= $this->Books_model->list_authors();

        $view_data = array(
            "book_list" => $book_list,
            "genre_list" => $genre_list,
            "author_list" => $author_list
        );
        $this->load->view("book_list",$view_data);

    }
    public function author($author){
        $author = urldecode($author);
        $book_list = $this->Books_model->list_by_author($author);
        $genre_list= $this->Books_model->list_genres();
        $author_list= $this->Books_model->list_authors();
        

        $view_data = array(
            "book_list" => $book_list,
            "genre_list" => $genre_list,
            "author_list" => $author_list
        );
        //var_dump($book_list);
        $this->load->view("book_list",$view_data);
        

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