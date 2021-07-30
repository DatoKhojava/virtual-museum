<?php
  include_once './includes/connection.php';

  $stmt = $conn->query('SELECT e.*, museums.name as mname FROM exhibit as e JOIN museums ON e.museum_id = museums.id');
  $items = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajaramuseums.ge - აჭარის მუზეუმების გაერთიანებასსიპ &quot;აჭარის მუზეუმი&quot;</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- custom css -->
  <link rel="stylesheet" href="style.css" />
  <!-- tiny -->
  <script src="https://cdn.tiny.cloud/1/e4c91l7ccy2azrrkotvanvlbs86gyjthp66yw3asdqjf6yut/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
  <!-- Side-Nav -->
  <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
      <a href="#" class="nav-link h3 text-white my-2">
        <div style="display: flex">
            <img src="logos.png" width="150px" height="150px" style="margin: 0 auto"/>
        </div>
      </a>
      <li class="nav-link">
        <a href="dashboard.php" class="t"> 
            <i class="bx bxs-dashboard"></i>
            <span class="mx-2">მთავარი</span>
        </a>
      </li>
      <li class="nav-link">
        <a href="add.php">
            <i class="bx bx-plus-medical"></i>
            <span class="mx-2">ახლის დამატება</span>
        </a>
      </li>
      <li href="#" class="nav-link">
        <a href="exhibits.php">
            <i class='bx bx-spreadsheet'></i>
            <span class="mx-2">ექსპონატები</span>
        </a>
      </li>
    </ul>

    <span href="#" class="nav-link h4 w-100 mb-5">
      <!-- <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
      <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a> -->
      <a href=""><i class='bx bxs-chevron-left-square'>&nbsp;&nbsp;გასვლა</i></a>
    </span>
  </div>

  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-light bg-light px-5">
      <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
    </nav>
    <!--End Top Nav -->
    
    <div class="container">
      <h3 class="text-dark p-3">ექსპონატები</h3>
      <div class="row">
          <?php foreach($items as $key => $row ): ?>
            <div class="col-md-4 ">
              <div class="card mt-4 card-img-top"> <img src="<?=$row['img']?>">
                <div class="card-body">
                  <h5 class="card-title small-text"><?=$row['title']?></h5>
                  <p class="card-text">
                    <?=$row['mname']?>
                  </p>
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?=$key?>"><img src="qr.png" width="20px" height="auto" /></button> <a href="del.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-outline-danger"><i class='bx bx-x-circle'></i></a> </div>
              </div>
            </div>
            <div class="modal fade" id="staticBackdrop-<?=$key?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">qr დაგენერირდა</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://localhost/virtualMuseum/index.php?id=<?=$row['id']?>&choe=UTF-8" title="Link to Google.com" /> </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">გამოსვლა</button>
                    <!-- <button type="button" class="btn btn-primary">გადმოწერა</button> -->
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
        </div>
      </div>
    </div>


  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script>
    var menu_btn = document.querySelector("#menu-btn");
    var sidebar = document.querySelector("#sidebar");
    var container = document.querySelector(".my-container");
    menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("active-cont");
    });
  </script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>


</body>

</html>