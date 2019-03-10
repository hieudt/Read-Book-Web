<?php
include_once 'db.php';
include_once  'SplitPDF.php';
include_once 'Sach.php';
$sach = new Sach();
$ListSach = $sach->getAllSach();
$ob = new SplitPDF();
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đọc giáo trình trực tuyến</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Đọc giáo trình trực tuyến</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Ngân hàng bách khoa toàn thư</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Danh mục 1</a>
            <a href="#" class="list-group-item">Danh mục 2</a>
            <a href="#" class="list-group-item">Danh mục 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="post" action="" enctype="multipart/form-data"><br/>
                        Tên sách : <input type="text" name="txtName"><br/>
                        <input type="file" name="PdfFile"/><br/>
                        <input type="submit" name="uploadclick" value="Upload"/><br/><br/>
                    </form>
                </div>
            </div>

            <?php // Xử Lý Upload

            // Nếu người dùng click Upload
            if (isset($_POST['uploadclick']))
            {
                // Nếu người dùng có chọn file để upload
                if (isset($_FILES['PdfFile']))
                {
                    // Nếu file upload không bị lỗi,
                    // Tức là thuộc tính error > 0
                    if ($_FILES['PdfFile']['error'] > 0)
                    {
                        echo 'File Upload Bị Lỗi '.$_FILES['PdfFile']['error'];
                    }
                    else{
                        // Upload file
                        move_uploaded_file($_FILES['PdfFile']['tmp_name'], './data/'.$_FILES['PdfFile']['name']);
                        echo 'Tên file '.$_FILES['PdfFile']['name'];
                        echo $ob->split($_FILES['PdfFile']['name'],$_POST['txtName']);
                    }
                }
                else{
                    echo 'Bạn chưa chọn file upload';
                }
            }
            ?>

          <div class="row">
<?php
        foreach ($ListSach as $item){ ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="data/<?php echo $item['tenfile'];?>/img1.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $item['tensach']; ?></a>
                  </h4>
                  <h5>Free</h5>
                  <p class="card-text"><a href='xem.php?id=<?php echo $item['sach_id']; ?>'>Xem Nội dung</a></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
        <?php } ?>






          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Dương Trung Hiếu 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
