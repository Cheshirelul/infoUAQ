<?php 
echo '<!DOCTYPE html>';
echo '<!-- saved from url=(0062)https://getbootstrap.com/docs/4.1/examples/starter-template/?# -->';
echo '<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
    echo '<meta name="description" content="">';
    echo '<meta name="author" content="">';
    echo '<link rel="icon" href="https://getbootstrap.com/favicon.ico">';

    echo '<title>Starter Template for Bootstrap</title>';

    echo '<!-- Bootstrap core CSS -->';
    echo '<link href="./Arriba/bootstrap.min.css" rel="stylesheet">';

    echo '<!-- Custom styles for this template -->';
    echo '<link href="./Arriba/starter-template.css" rel="stylesheet">';
  echo '</head>';

  echo '<body>';

    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">';
      echo '<a class="navbar-brand" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Navbar</a>';
      echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">';
        echo '<span class="navbar-toggler-icon"></span>';
      echo '</button>';

      echo '<div class="collapse navbar-collapse" id="navbarsExampleDefault">';
        echo '<ul class="navbar-nav mr-auto">';
          echo '<li class="nav-item active">';
            echo '<a class="nav-link" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Home <span class="sr-only">(current)</span></a>';
          echo '</li>';
          echo '<li class="nav-item">';
            echo '<a class="nav-link" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Link</a>';
          echo '</li>';
          echo '<li class="nav-item">';
            echo '<a class="nav-link disabled" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Disabled</a>';
          echo '</li>';
          echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="https://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>';
            echo '<div class="dropdown-menu" aria-labelledby="dropdown01">';
              echo '<a class="dropdown-item" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Action</a>';
              echo '<a class="dropdown-item" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Another action</a>';
              echo '<a class="dropdown-item" href="https://getbootstrap.com/docs/4.1/examples/starter-template/?#">Something else here</a>';
            echo '</div>';
          echo '</li>';
        echo '</ul>';
        echo '<form class="form-inline my-2 my-lg-0">';
          echo '<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">';
          echo '<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>';
        echo '</form>';
      echo '</div>';
    echo '</nav>';

    echo '<main role="main" class="container">';

      echo '<div class="starter-template">';
        echo '<h1>Bootstrap starter template</h1>';
        echo '<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>';
      echo '</div>';

    echo '</main><!-- /.container -->';

    echo '<script src="./Arriba/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
    echo '<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>';
    echo '<script src="./Arriba/popper.min.js.download"></script>';
    echo '<script src="./Arriba/bootstrap.min.js.download"></script>';
  

echo '</body>';
echo '</html>';
?>