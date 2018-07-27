<?php
class Admin_model extends CI_Model{
    
    public function can_login($email, $password)  
         {  
              $this->db->where('email', $email);  
              $this->db->where('password', $password);  
              $query = $this->db->get('users');  
              if($query->num_rows() > 0)  
              {  
                   return true;  
              }  
              else  
              {  
                   return false;       
              }  
         }  
        
    public function all_books(){
        $query=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover')
                       ->from('books')
                       ->join('authors','authors.id=books.author_id')
                       ->join('genres','genres.id=books.genre_id')
                       ->get();
        $result = $query->result();
        return $result;
    }
    public function all_authors(){
        $query=$this->db->select('*')
                    ->from('authors')
                    ->get();
        $result = $query->result();
        return $result;
    }
    public function all_genres(){
        $query=$this->db->select('*')
                    ->from('genres')
                    ->get();
        $result = $query->result();
        return $result;
    }
    public function count_books(){
        return $num_results = $this->db->count_all_results('books');
    }
    public function count_authors(){
        return $num_results = $this->db->count_all_results('authors');
    }
    public function count_genres(){
        return $num_results = $this->db->count_all_results('genres');
    }
    public function add_book($data){
        $this->db->insert('books',$data);
        redirect('/Admin/all_books');
    }
    public function update_run($id, $data){
        $book_id = $id;
        foreach($data as $key => $item){
            if($item == null){
                unset($data[$key]);
            } else {
                $data[$key] = $item;
            }
           
        }
        $this->db->where('id', $book_id);
        $this->db->update('books',$data);
        redirect('/Admin/all_books');
    }
    public function add_authort($data){
        $this->db->insert('authors',$data);
        redirect('/Admin/all_authors');
    }
    public function update_book($id){
        $detail=$this->db->select('books.id,books.name as book_name,authors.name as author_name,genres.name as genre_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                ->from('books')
                ->join('authors','authors.id = books.author_id')
                ->join('genres','genres.id = books.genre_id')
                ->where('books.id',$id)
                ->get();
        $books = $detail->result();
        return $books;
    }
 



}