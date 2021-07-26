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
    <h3 class="text-dark p-3">სსიპ "აჭარის მუზეუმი" 🏛️</h3>
    <div class="container">
      <video width="100%" height="600" autoplay>
        <source src="https://ajaramuseums.ge/assets/video/video_last_end.mp4" type="video/mp4">
        <source src="https://ajaramuseums.ge/assets/video/video_last_end.mp4" type="video/ogg">
        Your browser does not support the video tag.
      </video>
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
</body>

</html>