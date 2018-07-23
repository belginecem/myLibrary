<?php
class Books_model extends CI_Model {
    

    public function list_books($limit = FALSE, $offset = FALSE){
        if($limit!== FALSE)
        {
            $this->db->limit($limit, $offset);
        }
        $list=$this->db->select('books.id,books.name as book_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                       ->from('books')
                       ->get();
        $books = $list->result();
        foreach($books as $item){
            $item->id =encrypt_url($item->id);
        }
        return $books;
    }
    

    public function list_genres(){
        $list=$this->db->get("genres")->result();
        foreach($list as $item){
            $item->id = encrypt_url($item->id);
        }
        return $list;
    }

    public function list_authors(){
        $list=$this->db->get("authors")->result();
        foreach($list as $item){
            $item->id = encrypt_url($item->id);
        }
        return $list;
    }
    
    public function book_detail($id){
        $detail=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                ->from('books')
                ->join('authors','authors.id = books.author_id')
                ->join('genres','genres.id = books.genre_id')
                ->where('books.id',$id)
                ->get();
  $books = $detail->result();
        foreach($books as $item){
            $item->id = encrypt_url($item->id);
        }
        return $books;
    }

    public function get_results($search_term='default')
    {
        $query= $this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                 ->from('books')
                 ->join('authors','authors.id=books.author_id')
                 ->join('genres','genres.id=books.genre_id')
                 ->like('books.name',$search_term)
                 ->or_like('authors.name',$search_term)
                 ->or_like('genres.name',$search_term)
                 ->get();
        $result = $query->result();
        foreach($result as $item){
            $item->id = encrypt_url($item->id);
        }
        //var_dump($result);                
        return $result;
    }
    public function list_by_genre($genre){
        
        $list=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                       ->from('books')
                       ->join('authors','authors.id = books.author_id')
                       ->join('genres','genres.id = books.genre_id')               
                       ->where('genres.id',$genre)
                       ->get(); 
        $books = $list->result();
        foreach($books as $item){
            $item->id = encrypt_url($item->id);
        }
        return $books;
        
        
    }
    public function list_by_author($author){
        $list=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                       ->from('books')               
                       ->join('authors','authors.id = books.author_id')
                       ->join('genres','genres.id = books.genre_id')               
                       ->where('authors.id',$author)
                       ->get(); 
         $books = $list->result();
        foreach($books as $item){
            $item->id = encrypt_url($item->id);
        }
        return $books;
    }

}