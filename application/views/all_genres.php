
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Panel">
    <meta name="author" content="EBelgin">
    <link rel="icon" href="/public/assets/images/icon.png">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/Admin/admin_panel">My Library</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/Admin/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="/Admin/admin_panel">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Admin/all_books">
                  <span data-feather="book"></span>
                  Books
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Admin/all_authors">
                  <span data-feather="feather"></span>
                  Authors
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/Admin/all_genres">
                  <span data-feather="list">(current)</span>
                  Genres
                </a>
              </li>
            </ul>

     
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding:80px;">
        
          
          <h2>Genres</h2>
          <button type="submit" class= "btn" onclick="location.href ='/Admin/new_genre'"><span data-feather="plus-circle"></span> Add Genre</button>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Genre Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($genres as $val){ ?>
                <tr>
                  <td><?php echo $val->name;?></td>
                  <td>
                    <a type="submit" class="btn btn-danger" href="/Admin/delete_genre/<?php echo $val->id;?>"><span data-feather="trash-2"></span></a>
                  </td>
                
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    
  </body>
</html>
