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
    <h3 class="text-dark p-2 container">ახალი ექსპონატის დამატება</h3>
    
    <div class="container">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Georgia.svg/1200px-Flag_of_Georgia.svg.png" widht="15px" height="15px">&nbsp;&nbsp;ქართული </button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <img src="https://cdn.britannica.com/33/4833-004-828A9A84/Flag-United-States-of-America.jpg" widht="15px" height="15px">&nbsp;&nbsp;English </button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <?php include 'includes/add_content_ge.php'; ?>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <?php include 'includes/add_content_en.php'; ?>
        </div>
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
      height: 300,
      
   });
  </script>
</body>

</html>