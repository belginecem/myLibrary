<?php
class Books_model extends CI_Model {
    

    public function list_books($limit = FALSE, $offset = FALSE){
        if($limit!== FALSE)
        {
            $this->db->limit($limit, $offset);
        }
        $list=$this->db->get("books")->result();
        return $list;
    }
    

    public function list_genres(){
        $list=$this->db->get("genres")->result();
        //var_dump($list);
        return $list;
    }

    public function list_authors(){
        $list=$this->db->get("authors")->result();
        return $list;
    }
    
    public function book_detail($id){
        $detail=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                ->from('books')
                ->join('authors','authors.id = books.author_id')
                ->join('genres','genres.id = books.genre_id')
                ->where('books.id',$id)
                ->get();
        //$encodedId=$this->encrypt->encode($id);
        //var_dump($detail->result());
        return $detail->result();
    }
    
    /* public function add_books($data){
        $insert=$this->db->insert("books",$data);
        return $insert;
    } */

}