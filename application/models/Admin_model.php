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
        $query=$this->db->select('books.id,books.name as book_name,books.description,books.publication_date,books.ISBN,books.cover,books.quote,books.quote_2,books.quote_3')
                       ->from('books')
                       ->get();
        $result = $query->result();
        return $result;
    }
 



}