<?php $this->load->view('include/header.php'); ?>
<?php //print_r($book_list); ?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-3">
        <div class="card my-4" style="height:auto;">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
          <h1 class="my-4">Genres</h1>
          <div class="list-group">
            <?php foreach($genre_list as $item){ //var_dump($item);?>
              <a href="#" class="list-group-item"><?php echo $item->name;?></a>
            <?php } ?>
          </div>
          <h1 class="my-4">Authors</h1>
          <div class="list-group">
            <?php foreach($author_list as $item){ ?>
              <a href="#" class="list-group-item"><?php echo $item->name; ?></a>
            <?php } ?>
          </div>          
        </div>
    <div class="col-lg-9">
              <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Hello!</h1>
        <p class="lead">Welcome to my library! Click to list all books </p>
        <!-- <a href="#" class="btn btn-primary btn-lg">Call to action!</a> -->
      </header>

      <!-- Page Features -->
      <div class="row text-center">
        <?php foreach($book_list as $item){ //var_dump($item);?>
          <input type="hidden" name="id" value="<?php echo $item->id; ?>" >
          <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="<?php echo base_url();?>uploads/<?php echo $item->cover;?>" alt="book_cover">
            <div class="card-body">
              <h4 class="card-title"><?php echo $item->name; ?></h4>
             <!-- <p class="card-text">A great modern classic and the prelude to The Lord of the Rings.</p> -->
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url();?>Books/get_book/<?php echo $item->id; ?>" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <?php } ?>
        

       
      </div>
      <!-- /.row -->
</div>
    

    </div>
    </div>
    <!-- /.container -->
    <div class="pagination-links">
    

    <?php echo $this->pagination->create_links(); ?>
    


    
<!--
</div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
        -->
    

<?php $this->load->view('include/footer.php'); ?>