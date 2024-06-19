<?php
session_start();
include "./controllers/retrieve-data.php";
include "../assets/components/side-bar.php";
include "../assets/components/banner.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/settings.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <title>Setting</title>
</head>

<body>
  <?php displaySideBar(); ?>
  <?php displayBanner(); ?>

  <header>
    <div class="header-left">
      <input type="text" placeholder="Search for anything here." />
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </div>
    <div class="header-right">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
      </svg>
      <div class="count">01</div>
    </div>
  </header>
  <main>
    <h1 class="title">Setting</h1>
    <div class="pic-info-div">
      <div class="pic-div" id="imageUploadDiv">
        <?php
        $src =  $employee['profile_pic'] != "" ? $employee['profile_pic'] : '/pharma-suite/assets/default.png';
        echo "<img src='$src' alt='' />"
        ?>
      </div>
      <div class="info">
        <table id="dataTable" cellspacing="10">
          <tr>
            <td>Name</td>
            <td><?php echo $employee['fullname']; ?></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><?php echo $employee['username']; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $employee['email']; ?></td>
          </tr>
          <tr>
            <td>Contact Number</td>
            <td><?php echo $employee['contact_number']; ?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><?php echo $employee['address']; ?></td>
          </tr>
          <tr>
            <td>Position*</td>
            <td><?php echo $employee['position']; ?></td>
          </tr>
          <tr>
            <td>Salary*</td>
            <td><?php echo $employee['salary']; ?></td>
          </tr>
        </table>
      </div>
    </div>
    <hr />
    <form action="/pharma-suite/setting/controllers/update-data.php" method="post" enctype="multipart/form-data" id="myForm">
      <div class="input-container">
        <div class="fn">
          <label for="fullname">Full name</label><br />
          <input type="text" placeholder="Enter full name" name="fullname" id="fullname" value="<?php echo $employee['fullname']; ?>" required />
        </div>
        <div class="un">
          <label for="username">User name</label><br />
          <input type="text" placeholder="Enter username" name="username" id="username" value="<?php echo $employee['username']; ?>" required />
        </div>
        <div class="pwd">
          <label for="password">Password*(Not required)</label><br />
          <input type="password" placeholder="Enter new password" name="password" id="password" />
        </div>
        <div class="email">
          <label for="email">Email</label><br />
          <input type="email" placeholder="Enter email" name="email" id="email" value="<?php echo $employee['email']; ?>" required />
        </div>
        <div class="contact">
          <label for="contact">Contact Number</label><br />
          <input type="text" placeholder="Enter contact number" name="contact_number" id="contact" value="<?php echo $employee['contact_number']; ?>" required />
        </div>
        <div class="address">
          <label for="address">Address</label><br />
          <input type="text" placeholder="Enter your address" name="address" id="address" value="<?php echo $employee['address']; ?>" required />
        </div>
        <div class="profile-picture">
          <label for="profile_pic">Change Profile Picture</label><br />
          <input type="file" name="profile_pic" id="profile_img" style="padding: 5px 10px;" />
        </div>
      </div>
      <div class="buttons">
        <button class="update" type="submit">Update</button>
        <button class="reset" type="reset">Reset</button>
      </div>
    </form>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var banner = document.getElementById("banner");
      if (banner) {
        banner.style.display = "block"; // Show the banner
        setTimeout(function() {
          banner.style.display = "none"; // Hide the banner after 5 seconds
        }, 5000);
      }
    });
    document.getElementById("profile_img").addEventListener("change", function() {
      var reader = new FileReader();
      reader.onload = function(event) {
        var imageUrl = event.target.result;
        var imageUploadDiv = document.getElementById("imageUploadDiv");

        imageUploadDiv.innerHTML = "";

        var uploadedImage = document.createElement("img");
        uploadedImage.id = "uploadedImage";
        uploadedImage.src = imageUrl;
        uploadedImage.alt = "Uploaded Image";
        uploadedImage.style.objectFit = "cover";
        uploadedImage.style.height = "100%";
        imageUploadDiv.appendChild(uploadedImage);
      };
      reader.readAsDataURL(event.target.files[0]); // Read the file as data URL
    });
  </script>
</body>

</html>