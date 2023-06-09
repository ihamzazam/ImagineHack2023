<?php
include "inc/header.php";
if (isset($_SESSION['users'])) {
    header("location: profile.php");
}
// username & password verification for login
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pass = hash('sha256', $_POST['pass']);
    if (empty($uname) || empty($pass)) {
        echo "<script> alert('Please provided all informations')</script>";
    } else {
        $login = $conn->query("SELECT * FROM users WHERE user_name = '$uname' AND pass = '$pass'");
        if ($login->num_rows == 0) {
            echo "<script> alert('Username or password did not match!')</script>";
        } else {
            $_SESSION['users'] = $uname;
            header("location: dashboard.php");
        }
    }
}
?>
  <form action="" method="POST">
    <div class="container my-5">
      <div class="row">
        <div class="col-md-4">
          <!-- Sign-in form -->
          <form action="" method="POST" class="card mx-auto my-5 text-center">
            <div class="card-body bg-light pt-5" >
              <div class="vertical-align">
              <i class="fas fa-sign-in-alt fa-6x mx-auto my-6 custom-icon"></i>
                <h3 class="card-title my-3">Sign In</h3>
                <div class="input-group my-4">
                  <span class="input-group-text"><i class="fas fa-user custom-icon"></i></span>
                  <input type="text" class="form-control" placeholder="Username" name="uname">
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-text"><i class="fas fa-lock custom-icon" ></i></span>
                  <input type="password" class="form-control" placeholder="Password" name="pass">
                </div>
                <input type="submit" class="form-control btn btn-primary mb-4" value="Sign In" name="submit" style="background-image: linear-gradient(to right, #5B059D, #820A7D);opacity: 1">
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="h-100 d-flex flex-column justify-content-center align-items-center">
            <span class="divider"></span>
            <!-- Image on the right side -->
            <img src="https://static01.nyt.com/images/2018/02/08/smarter-living/carbonfootprint-slide-ERID/carbonfootprint-slide-ERID-jumbo-v2.gif" class="img img-fluid" alt="Image">
          </div>
        </div>
      </div>
    </div>
  </form>
<style>
  .custom-icon {
    background: linear-gradient(to right, #5B059D, #820A7D);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    opacity: 1;
  }
    .card {
      width: 20rem;
      border-radius: 10px;
    }

    .card-body {
      padding-top: 5rem;
    }

    .card-title {
      margin-top: 3rem;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn {
      border-radius: 10px;
    }

    .divider {
      border-right: 1px solid #ccc;
      height: 100%;
    }
    
    .vertical-align {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .img{ 
    margin-left:300px; 
  }
  </style>
<?php
include "inc/footer.php";
?>

