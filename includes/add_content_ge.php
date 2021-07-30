<?php
  include_once 'connection.php';

  $stmt = $conn->prepare('SELECT * FROM museums');
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $errors = [];

  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $museum = $_POST['museum'];
    $exp_img = $_POST['exp_img'] ?? null;
    $description = $_POST['description'];

    $image = $_FILES['exp_img'] ?? null;
    $imgPath = '';

    if(!is_dir('images')){
      mkdir('./images');
    }

    if($image){
      $imgPath = 'images/'.randString(8).'/'.$image['name'];
      mkdir(dirname($imgPath));
      move_uploaded_file($image['tmp_name'], $imgPath); //image tmp name
    }

    if(!$title){
        $errors[] = 'ექსპონატის სახელი სავალდებულოა';
    }

    if(!$description){
      $errors[] = 'ექსპონატის აღწერა სავალდებულოა';
    }

    if(empty($errors)){
        $insertRes = $conn->prepare("INSERT INTO exhibit (title, museum_id, img, description, qr_image) VALUES (:title, :museum, :exp_img, :description, :qr_image)");
    
        $insertRes->bindValue(':title', $title);
        $insertRes->bindValue(':museum', intval($museum));
        $insertRes->bindValue(':exp_img', $imgPath);
        $insertRes->bindValue(':description', $description);
        $insertRes->bindValue(':qr_image', 'შეგიძლიათ მიიღოთ უფრო მეტი ინფორმაცია, ჩვენი მუზეუმის გიდისგან.');

        $insertRes->execute();
    }
  }

  function randString($n){
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for($i = 0; $i < $n; $i++){
      $index = rand(0, strlen($chars) - 1);
      $str .= $chars[$index];
    }
    return $str;
  }
?>

<div class="container mt-2">
  <?php if(!empty($errors)){ ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error){ ?>
        <div><?php echo $error ?></div>
      <?php } ?>
    </div>
  <?php } ?>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<div class="container mt-4">
		<!-- CONTENT -->
		<div class="row">
			<div class="col">
				<!-- TITLE AREA -->
				<div class="row">
					<div class="col">
						<div class="row mt-3">
							<div class="col-md-2 col-sm-12">დასახელება:</div>
							<div class="col-md-10 col-sm-12">
								<input type="text" class="form-control" name="title"> </div>
						</div>
					</div>
				</div>
				<!-- LIST OF MUSEUMS -->
				<div class="row mt-3">
					<div class="col-md-2 col-sm-12">აირჩიეთ მუზეუმი:</div>
					<div class="col-md-10 col-sm-12">
            <select class="form-select" name="museum">
                <option selected>აირჩიეთ მუზეუმი</option>
                <?php foreach ($res as $res) { ?>
                  <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?></option>
                <?php } ?>
              </select>
					</div>
				</div>
				<!-- IMAGE ADD -->
				<div class="row mt-3">
					<div class="col-md-2 col-sm-12"> ატვირთეთ ფოტო </div>
					<div class="col-md-10 col-sm-12">
						<input class="form-control" type="file" name="exp_img"> </div>
				</div>
				<!-- DESCRIPTION AREA -->
				<div class="row mt-4">
					<div class="col">
						<textarea name="description"></textarea>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary mt-4 float-end" name="submit">დამატება</button>
	</div>
</form>