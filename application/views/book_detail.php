<?php $this->load->view('include/header.php'); ?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-3" style = "padding: 15px; ">
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
        <!-- /.col-lg-3// -->

      <div class="col-lg-9" style="padding:15px;">
        <?php foreach($book_detail as $item){ ?>
          <div class="card mt-4" style="padding:15px 15px 15px 15px;" >
          
          <div class="col-md-12">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                <h3 class="mb-0">
                  <h1 class=""><?php echo $item->book_name; ?></h1>
                </h3>
                <a href="#" class=""><h3><?php echo $item->author_name; ?></h3></a>
                <a href="#" class=""><h5><?php echo $item->genre_name; ?></h5></a>
                <h6 class=""><?php echo $item->publication_date; ?></h6>
                <h6 class="">ISBN: <?php echo $item->ISBN; ?></h6>
                <!-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p> -->
                
                <!--<a href="#">Continue reading</a>-->
              </div>
              <img class="card-img-left flex-auto d-none d-lg-block" src="<?php echo base_url();?>uploads/<?php echo $item->cover;?>" alt="Card image cap" style="height:300px;">
              </div>
            <div class="card-body">
              <h3> Description: </h3></br>
              <p class="card-text"><?php echo $item->description; ?></p>
              <!--<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>-->
              <!--&nbsp; 4.0/5-->
            </div>
            <div class="card card-outline-secondary my-4">
              <div class="card-header">
                <h4> Quotes </h4>
              </div>
                <div class="card-body">
                  <p><?php echo $item->quote;?></p>
                  <!-- <small class="text-muted">Posted by Anonymous on 3/1/17</small> -->
                  <hr>
                  <p><?php echo $item->quote_2; ?></p>
                  <!-- <small class="text-muted">Posted by Anonymous on 3/1/17</small> -->
                  <hr>
                  <p><?php echo $item->quote_3; ?></p>
                  <!-- <small class="text-muted">Posted by Anonymous on 3/1/17</small> -->
                  <hr>
                  <!-- <a href="#" class="btn btn-success">Leave a Review</a> -->
                </div>
            </div>
          </div>
        <?php } ?>
        
    <input type="button" value="Back" class="button_back" onclick="location.href='<?php echo base_url();?>'"/>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->

    </div>
    <!-- Footer -->
    <?php $this->load->view('include/footer.php'); ?>



