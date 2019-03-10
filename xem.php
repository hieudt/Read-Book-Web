<?php
include_once 'db.php';
include 'Sach.php';
if (!isset($_GET['id'])){
    header("Location: index.php");
}
else {
    $id = $_GET['id'];
    $sachOb = new Sach();
    $ListImage = $sachOb->getSachByID($id);

}
?>
<head>
    <meta name="viewport" content="width = 1050, user-scalable = no" />
    <script type="text/javascript" src="extras/jquery.min.1.7.js"></script>
    <script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
</head>
<body>

<div class="flipbook-viewport">
    <div class="container">
        <div class="flipbook">
           <?php
            foreach($ListImage as $row){

                echo "<div style=\"background-image:url(data/{$row['tenfile']}/{$row['image_name']})\"></div>";
            }
           ?>

        </div>
    </div>
</div>


<script type="text/javascript">

    function loadApp() {

        // Create the flipbook

        $('.flipbook').turn({
            // Width

            width:922,

            // Height

            height:600,

            // Elevation

            elevation: 50,

            // Enable gradients

            gradients: true,

            // Auto center this flipbook

            autoCenter: true

        });
    }

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test : Modernizr.csstransforms,
        yep: ['lib/turn.js'],
        nope: ['lib/turn.html4.min.js'],
        both: ['css/basic.css'],
        complete: loadApp
    });

</script>

</body>
</html>