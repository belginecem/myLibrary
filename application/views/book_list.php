<?php $this->load->view('include/header.php'); ?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-3">
        <div class="card my-4" style="height:auto;">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <span class="input-group-btn">
                  <form action="/Books/execute_search" method="post" accept-charset="utf-8"> 
                    <input type="text" name="search" value="" class="form-control" placeholder="Search for...">
                    <input type="submit" name="search_submit" value="Submit"  class="btn btn-secondary"> 
                  </form>
                </span>
              </div>
            </div>
          </div>
          <h1 class="my-4">Genres</h1>
          <div class="list-group">
            <?php foreach($genre_list as $item){?>
              <a href="/Books/genre/<?php echo $item->id; ?>" class="list-group-item"><?php echo $item->name;?></a>
            <?php } ?>
          </div>
          <h1 class="my-4">Authors</h1>
          <div class="list-group">
            <?php foreach($author_list as $item){ ?>
              <a href="/Books/author/<?php echo $item->id; ?>" class="list-group-item"><?php echo $item->name; ?></a>
            <?php } ?>
          </div>          
        </div>
    <div class="col-lg-9">
              <!-- Jumbotron Header -->
              
      <header class="jumbotron my-4">
        <h1 class="display-3">Hello!</h1>
        <p class="lead">Welcome to my library! </p>
      </header>
          

      <!-- Page Features -->
      <div class="row text-center">
        <?php foreach($book_list as $item){ ?>
          <input type="hidden" name="id" value="<?php echo $item->id; ?>" >
          <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="/public/uploads/<?php echo $item->cover;?>" alt="book_cover">
            <div class="card-body">
              <h4 class="card-title"><?php echo $item->book_name; ?></h4>
            </div>
            <div class="card-footer">
              <a href="/Books/get_book/<?php echo $item->id; ?>" class="btn btn-primary">Find Out More!</a>
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
    </div>
        
      
<?php $this->load->view('include/footer.php'); ?>