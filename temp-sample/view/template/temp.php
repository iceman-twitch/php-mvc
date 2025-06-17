<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- CK EDITOR -->
<!--script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script-->
<link rel="stylesheet" type="text/css" href="./res/main.css">
  <meta charset="charset=utf-8">
  <title><?php echo $data; ?></title>
</head>
<body>
<?php include './view/nav/view.php'; ?>


<?php include './view/header/view.php'; ?>
<div class="row">
<?php include './view/' . $template; ?>
<?php include './view/section/view.php'; ?>
</div>

<?php include './view/footer/view.php'; ?>


</body>
</html>