<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="stylesheet" href="styles/sidebar.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Setting</title>
    <style>
      body {
        margin-left: 20px;
        margin-bottom: 50px;
        font-family: "Poppins", sans-serif;
      }
      .title {
        font-size: 30px;
        font-weight: 400;
        margin-left: 10px;
      }

      .pic-info-div {
        display: flex;
        flex-direction: row;
      }
      .pic-info-div > div {
        flex: 1;
        margin-right: 5%;
      }
      .pic-div {
        font-size: 12px;

        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 30px;
        padding-top: 10px;
        padding-bottom: 15px;
      }
      .pic-text {
        margin-bottom: 5px;
      }

      .upload-icon {
        font-size: 30px;
        margin: none;
        color: #8d98aa;
      }
      table td {
        padding: 10px;
        margin-right: 15px;
      }
      table td:nth-child(2) {
        color: #8d98aa;
        font-size: 12.25px;
      }
      table td:nth-child(1) {
        font-size: 14.5px;
      }
      .input-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 25px;
        margin-left: 32px;
      }

      .input-container > div {
        flex-basis: 48%;
        margin-bottom: 10px;
      }
      .input-container > div > input[type="text"],
      .input-container > div > input[type="password"],
      .input-container > div > input[type="email"] {
        padding-left: 30px;
        font-family: "Poppins", sans-serif;
        background-color: #b5bcc5;
        opacity: 49%;

        border: none;
        height: 40px;
        width: 300px;
        border-radius: 10px;
        margin-bottom: 10px;
        margin-top: 5px;
      }
      label {
        color: #4c535f;
      }
      hr {
        border-color: rgb(215, 215, 215);
        opacity: 0.2;
      }
      .update {
        padding: 8px 20px;
        border-radius: 10px;
        border: none;
        background-color: #1d242e;
        color: rgb(232, 232, 232);
        box-shadow: 0 8px 21px rgba(0, 0, 0, 16%);
        transition: ease 0.3s;
        width: 100px;
        border: 3px solid #1d242e;
      }
      .reset {
        padding: 8px 20px;
        border-radius: 10px;
        border: 3px solid #1d242e;
        color: #1d242e;
        box-shadow: 0 8px 21px rgba(0, 0, 0, 16%);
        transition: ease 0.3s;
        width: 100px;
      }

      .update:hover,
      .reset:hover {
        transform: scale(1.08);
      }
      .buttons {
        margin-top: 50px;
        display: flex;
        justify-content: center;
        gap: 30px;
      }
      .password-wrapper1 {
        display: flex;
        align-items: center;
        justify-content: flex-end;
      }
      .pic {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #4c535f;
        background-color: #edf2f6;
        border: 2px dashed #4c535f;

        border-radius: 20px;
        padding: 5px;
        width: 95px;
        height: 100px;
      }
      #imageUploadDiv {
        width: 95px;
        height: 100px;

        position: relative;
        overflow: hidden;
      }

      #uploadedImage {
        width: 100%;
        height: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      body {
        margin-top: 60px;
        margin-left: 256px;
      }
    </style>
  </head>
  <body>
    <nav>
      <div class="ptitle">Pharma</div>
      <div>
        <div class="acc">
          <div class="accl">
            <svg
              class="contact-icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
              />
            </svg>
            <div>
              <div>Abel</div>
              <div class="admin">Admin</div>
            </div>
          </div>

          <svg
            class="menu"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"
            />
          </svg>
        </div>
      </div>
      <div class="real-nav">
        <div class="upper-nav">
          <a href="/pharma-suite/pages/dashboard_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"
              />
            </svg>
            <div>Dashboard</div>
          </a>
          <a  href="/pharma-suite/pages/medicine_list_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
              />
            </svg>
            <div>Medicine list</div>
          </a>
          <a href="/pharma-suite/pages/supplier_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
              />
            </svg>
            <div>Suppliers</div>
          </a>

          <a href="/pharma-suite/pages/employee_list_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
              />
            </svg>
            <div>Employees</div>
          </a>
          <a href="/pharma-suite/pages/category_list_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z"
              />
            </svg>
            <div>Categories</div>
          </a>
        </div>
        <div class="nav-bottom">
          <a href="/pharma-suite/pages/setting_page.php" class="nav-box">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
              />
            </svg>
            <div>Settings</div>
          </a>
        </div>
      </div>
    </nav>
    <header>
      <div class="header-left">
        <input type="text" placeholder="Search for anything here." />
        <button>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
            />
          </svg>
        </button>
      </div>
      <div class="header-right">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
          />
        </svg>
        <div class="count">01</div>
      </div>
    </header>
    <div class="title">Setting</div>
    <div class="pic-info-div">
      <div class="pic-div">
        <div class="pic-text">Your profile picture</div>
        <div class="pic" id="imageUploadDiv" onclick="handleImageUpload()">
          <div class="upload-icon"><i class="bx bx-cloud-upload"></i></div>

          <div style="text-align: center; margin: none">
            Upload your picture
          </div>
          <input
            type="file"
            id="imageInput"
            style="display: none; width: 95px; height: 100px"
          />
        </div>
      </div>
      <div class="info">
        <table id="dataTable" cellspacing="10">
          <tr>
            <td>Name</td>
            <td>Abebe kebede</td>
          </tr>

          <tr>
            <td>Username</td>
            <td>Abebe07</td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
              <div class="password-wrapper1">
                <input
                  style="
                    border: none;
                    background-color: white;
                    font-family: 'Poppins';
                    color: #8d98aa;
                  "
                  type="password"
                  disabled
                />
                <i
                  class="fas fa-eye-slash"
                  id="togglePassword"
                  onclick="togglePasswordVisibility()"
                ></i>
              </div>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>Abeb@gmail.com</td>
          </tr>
        </table>
      </div>
    </div>
    <hr />
    <form action="#" id="myForm">
      <div class="input-container">
        <div class="fn">
          <label for="fullname">Full name</label><br />

          <input type="text" placeholder="Enter full name" id="fullname" />
        </div>
        <div class="un">
          <label for="username">User name</label><br />
          <input type="text" placeholder="Enter username" id="username" />
        </div>
        <div class="pwd">
          <label for="password">Password</label><br />
          <input type="password" placeholder="Enter password" id="password" />
        </div>
        <div class="email">
          <label for="email">Email</label><br />
          <input type="email" placeholder="Enter email" id="email" />
        </div>
      </div>
    </form>
    <div class="buttons">
      <button class="update" onclick="updateTable()">Update</button>
      <button class="reset" onclick="resetForm()">reset</button>
    </div>
    <script>
      function updateTable() {
        // Get the form input values
        var fullname = document.getElementById("fullname").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;

        // Update the table cells with the form input values
        var table = document.getElementById("dataTable");

        // Update Name
        table.rows[0].cells[1].textContent = fullname;

        // Update Username
        table.rows[1].cells[1].textContent = username;

        // Update Password
        var passwordCell = table.rows[2].cells[1];
        passwordCell.innerHTML = ""; // Clear the cell content
        passwordCell.appendChild(createPasswordElement(password));

        // Update Email
        table.rows[3].cells[1].textContent = email;

        // Reset the form inputs
        document.getElementById("myForm").reset();
      }

      function createPasswordElement(password) {
        var passwordWrapper = document.createElement("div");
        passwordWrapper.classList.add("password-wrapper");

        var passwordInput = document.createElement("input");
        passwordInput.type = "password";
        passwordInput.value = password;
        passwordInput.disabled = true;
        passwordInput.style.border = "none";
        passwordInput.style.backgroundColor = "white";
        passwordInput.style.fontfamily = "Poppins";
        passwordInput.style.color = "#8d98aa";

        var toggleIcon = document.createElement("i");
        toggleIcon.classList.add("fas", "fa-eye-slash");
        toggleIcon.onclick = togglePasswordVisibility;

        passwordWrapper.appendChild(passwordInput);
        passwordWrapper.appendChild(toggleIcon);

        return passwordWrapper;
      }

      function togglePasswordVisibility() {
        var passwordInput = this.previousElementSibling;
        var toggleIcon = this;

        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleIcon.classList.remove("fa-eye-slash");
          toggleIcon.classList.add("fa-eye");
        } else {
          passwordInput.type = "password";
          toggleIcon.classList.remove("fa-eye");
          toggleIcon.classList.add("fa-eye-slash");
        }
      }

      function resetForm() {
        document.getElementById("myForm").reset();
      }
      function handleImageUpload() {
        var imageInput = document.getElementById("imageInput");
        imageInput.click();
      }

      // Event listener for image input change
      document
        .getElementById("imageInput")
        .addEventListener("change", function (event) {
          handleSelectedImage(event.target.files[0]);
        });

      function handleSelectedImage(file) {
        var reader = new FileReader();

        reader.onload = function (event) {
          var imageUrl = event.target.result;
          var imageUploadDiv = document.getElementById("imageUploadDiv");

          // Clear existing contents
          imageUploadDiv.innerHTML = "";

          // Create new image element
          var uploadedImage = document.createElement("img");
          uploadedImage.id = "uploadedImage";
          uploadedImage.src = imageUrl;
          uploadedImage.alt = "Uploaded Image";

          // Append the new image element
          imageUploadDiv.appendChild(uploadedImage);
        };

        reader.readAsDataURL(file);
      }
    </script>
  </body>
</html>