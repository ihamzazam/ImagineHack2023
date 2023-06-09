<?php
include "inc/header.php";
if (!isset($_SESSION['users'])) {
    echo "<script>alert('Please Sign in first');window.location.href='signin.php';</script>";
}
include "controller/controller.php";

?>
<div class="container">
    <form class="row pt-3" action="" method="POST">
        <!-- displaying user info -->
        <?php while ($row = mysqli_fetch_array($query_run)) {?>
                <!-- payment info section start -->
                <div class="card-body">
                    <h3 class="card-title my-3">Add an activity</h3>
                    <p class="py-0 my-1">Mode of Transportation</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle" name="option1" style = "margin-right: 5px">
                        Bike
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle" name="option1" style = "margin-right: 5px">
                        Car
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle" name="option1" style = "margin-right: 5px">
                        E-Hailing
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle" name="option1" style = "margin-right: 5px">
                        Walk
                        </label>
                    </div>
                    <p class="py-0 my-1">Transport Frequency (per day)</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-id-badge text-secondary"></i></span>
                        <input type="number" min="1" max="1440" class="form-control" placeholder="Enter in Mins" name="mID" value="<?php echo $row['meterID']; ?>">
                    </div>
                    <p class="py-0 my-1">Flight Frequency (per year)</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-id-badge text-secondary"></i></span>
                        <input type="number" min="1" max="1440" class="form-control" placeholder="Enter Value" name="mID" value="<?php echo $row['meterID']; ?>">
                    </div>
                    <?php
                    if (isset($_POST["add_activity"])) {
                        $activity = 'Transportation';
                    
                        if (!empty($activity)) {
                            $_SESSION["activities"][] = $activity;
                        }
                    }
                    ?>
        </div>
        <?php }?>
        </div>
        <div class="px-5 mt-0">
            <div class="input-group mb-5 pt-5 px-5">
                <a href="" class="form-control btn border-secondary me-1">Discard</a>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <button type="submit" name="add_activity">Add Activity</button>
                    <?php 
                    if (isset($_POST['add_activity'])){
                        echo "<script>window.location.href='dashboard.php';</script>";
                    }
                    ?>

                </form>
            </div>
        </div>
    </form>
</div>
<?php
include "inc/footer.php";
?>