<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reading Blog - Blog Post</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('https://source.unsplash.com/800x600/?writing');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #333;
    }

    .blog-post {
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin: 50px auto;
      max-width: 800px;
    }

    .blog-post-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .blog-post-text {
      font-size: 1.2rem;
      line-height: 1.8;
    }
  </style>
</head>
<body>

<?php
// Retrieve the blog post title and content from the URL parameters
$title = $_GET['title'];
$content = $_GET['content'];
?>

<div class="blog-post">
  <h2 class="blog-post-title"><?php echo $title; ?></h2>
  <div class="blog-post-content">
    <p class="blog-post-text"><?php echo $content; ?></p>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
