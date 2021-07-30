<?php
try {
    include_once './includes/connection.php';
  
    $stmt = $conn->prepare('SELECT * FROM exhibit  WHERE id=? ');
    $stmt->execute([$_GET['id']]); 
    $item = $stmt->fetch();
} catch (\Throwable $th) {
    throw $th;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajaramuseums.ge - აჭარის მუზეუმების გაერთიანებასსიპ &quot;აჭარის მუზეუმი&quot;</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- BOX ICONS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <style>
        body{ height:100vh; margin:0; }

        nav{ min-height:120px;}
        footer{ min-height:50px; }

        
        body{ 
        display:flex; 
        flex-direction:column; 
        }

        footer{
        margin-top: 5%; 
        }

        .center-logo {
            margin: 0 auto;
        }

        .exp-img {
            padding-top: 23px;
        }

        @media only screen and (max-width: 320px) {
            .exp-img {
                width: 90%;
                height: auto;
            }
        }

        @media only screen and (max-width: 375px) {
            .exp-img {
                width: 90%;
                height: auto;
            }
        }

        @media only screen and (max-width: 425px) {
            .exp-img {
                width: 90%;
                height: auto;
            }
        }

        @media only screen and (max-width: 768px) {
            .exp-img {
                width: 90%;
                height: auto;
            }
        }

        @media only screen and (max-width: 1024px) {
            .exp-img {
                width: 90%;
                height: auto;
            }
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="center-logo"> 
            <a class="navbar-brand" href="#"><img src="logos.png" width="100px" height="auto" style="padding: 5px"/></a>
        </div>
    </nav>

    <div class="mt-4 container">
        <h3 class="text-center mb-3"><?=$item['title']?></h3>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <img src="<?php echo $item['img']?>" class="exp-img"/>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <p><?=$item['description']?></p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p class="text-center"><?=$item['qr_image']?></p>
    </footer>
</body>
</html>