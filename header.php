<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script type=text/javascript src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js">
    < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" >
  </script>


  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
  <!-- <script type=text/javascript src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"> -->
  <title>Healthcare-Center</title>
</head>

<body>
  <?php
    $protocol =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
 
    $getUrl = $protocol.$_SERVER['HTTP_HOST'].'/Health-Center';
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Healthcare-Center</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            echo '<li class="nav-item">
          <a class="nav-link text-white" href="adminlogin.php">' . $user . '</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="logout.php">Logout</a>
        </li>';
          }elseif(isset($_SESSION['patient'])){
            $user = $_SESSION['patient'];
            echo '<li class="nav-item">
          <a class="nav-link text-white" href="./patientlogin.php">' . $user . '</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../patient/logout.php">Logout</a>
        </li>';
          } else {
            echo
            '
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminlogin.php">Admin</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active"  aria-current="page" href="patientlogin.php">Patient</a>
        </li>';
          }
          ?>

        </ul>


        <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      </div>
    </div>
  </nav>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>