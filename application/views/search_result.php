<?php $this->load->view('include/header.php'); ?>

<?php 
echo '<hr>';
echo '<h3> Book List</h3>';
echo '<table id="maintable"  class="table">';
echo '<th> Book Name </th>';
echo '<th> Book Author </th>';
echo '<th> Book Genre </th>';
echo '<th> Book ISBN </th>';
echo '<th></th>';

foreach($results as $val) {
    echo '<tr>
            <td>'.$val['book_name'].'</td>
            <td>'.$val['author_name'].'</td>
            <td>'.$val['genre_name'].'</td>
            <td>'.$val['ISBN'].'</td>
            <td><a href="/Books/get_book/'.$val['id'].'"><i class="fas fa-link"></i></a></td>
        </tr>';
}
echo '</table>'; 
?> 
 


<?php $this->load->view('include/footer.php'); ?> 


