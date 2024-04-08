<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reading Blog</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .hero {
      background-image: url('https://source.unsplash.com/1600x900/?books,reading');
      background-size: cover;
      background-position: center;
      height: 500px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .blog-post {
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .blog-post:hover {
      transform: translateY(-10px);
    }

    .blog-post img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .marquee {
      white-space: nowrap;
      overflow: hidden;
      width: 100%;
      box-sizing: border-box;
      animation: marquee 10s linear infinite;
      scroll-behavior: smooth;
      scroll-snap-type: smooth;
      animation-delay: 0s;
    }

    .marquee:hover {
      animation-play-state: paused;
    }

    @keyframes marquee {
      0% {
        transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Reading Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="container">
      <h1 class="display-4">Welcome to Reading Blogs</h1>
      <p class="lead">Explore the world of books and literature.</p>
    </div>
  </div>

  <!-- Blog Posts -->
  <div class="marquee">
    <div class="container my-5">
      <h2 class="mb-4 text-center">Latest Blog Posts</h2>
      <div class="owl-carousel owl-theme owl-carousel-continuous">
        <!-- Blog posts will be dynamically loaded here from the backend -->
        <!-- PHP code to include read_blog.php -->
        <?php
          // Database connection parameters
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "quillverse";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Query to fetch all blogs from the database
          $sql = "SELECT * FROM blogs";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<div class="blog-post">';
                  echo '<img src="' . $row["image_url"] . '" alt="Blog Post Image">';
                  echo '<div class="blog-post-content">';
                  echo '<h3 class="mt-1">' . $row["title"] . '</h3>';
                  echo '<p>' . $row["content"] . '</p>';
                  echo '<a href="#" class="btn btn-primary">Read More</a>';
                  echo '</div></div>';
              }
          } else {
              echo "No blogs found";
          }
          $conn->close();
        ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white py-3">
    <div class="container">
      <p>&copy; 2023 Reading Blog. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.owl-carousel-continuous').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 3
          }
        }
      });
    });
  </script>
</body>
</html>
