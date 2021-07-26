<?php
  include_once 'connection.php';

  $stmt = $conn->prepare('SELECT * FROM museums');
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $errors = [];
  if(isset($_POST['submit_en'])){
    $title = $_POST['title'];
    $museum = $_POST['museum'];
    $exp_img = $_POST['exp_img'];
    $description = $_POST['description'];

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
        $insertRes->bindValue(':exp_img', '');
        $insertRes->bindValue(':description', $description);
        $insertRes->bindValue(':qr_image', '');

        $insertRes->execute();
    }
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

<form action="" method="post">
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
		<button type="submit" class="btn btn-primary mt-4 float-end" name="submit_en">დამატება</button>
	</div>
</form>