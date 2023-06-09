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
                    <h3 class="card-title my-3">Pre-Assessment Questions</h3>
                    <p class="py-0 my-1">Mode of Transportation</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle" name="bike" style = "margin-right: 5px">
                        Bike
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle1" name="car" style = "margin-right: 5px">
                        Car
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle2" name="e-hailing" style = "margin-right: 5px">
                        E-Hailing
                        </label>
                        <label for="checkbox" style="display: inline-flex; align-items: center; margin: 10px">
                        <input type="checkbox" id="vehicle3" name="walk" style = "margin-right: 5px">
                        Walk
                        </label>
                    </div>
                    <p class="py-0 my-1">Transport Frequency (per day)</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-id-badge text-secondary"></i></span>
                        <input type="number" min="1" max="1440" class="form-control" placeholder="Enter in Mins" name="trasnportFreq" value="<?php echo $row['meterID']; ?>">
                    </div>

                    <p class="py-0 my-1">Meat Choice</p>

                    <select class="py-0 mb-3" name="meat">
                    <option>Select a Choice</option>
                    <option value="3">High</option>
                    <option value="2">Medium</option>
                    <option value="1">Low</option>
                    <option value="0">Vegan</option>
                    </select>


                    <p class="py-0 my-1">Flight Frequency (per year)</p>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fas fa-id-badge text-secondary"></i></span>
                        <input type="number" min="1" max="1440" class="form-control" placeholder="Enter Value" name="flightFreq" value="<?php echo $row['meterID']; ?>">
                    </div>

                    <p class="py-0 my-1">Flight Options</p>
                    <div class="input-group mb-4">
                        <input type="radio" id="option1" class="me-1" name="radioGroup1" value="option1">
                        <label for="option1" class="me-5">Short (Less then 3 hours)</label>
                        <input type="radio" id="option2" class="me-1" name="radioGroup2" value="option2">
                        <label for="option2" style = "margin-right:35px">Medium (3-6 hours)</label> 
                        <input type="radio" id="option3" class="me-1" name="radioGroup3" value="option3">
                        <label for="option3">Long (6+ hours)</label> 
                    </div>
        </div>
        <?php }?>
        </div>
        <div class="px-5 mt-0">
            <div class="input-group mb-5 pt-5 px-5">
                <a href="" class="form-control btn border-secondary me-1">Discard</a>
                <input type="submit" class="form-control btn btn-2" value="Save Changes" name="preAssess">
            </div>
        </div>
    </form>
</div>
<?php
include "inc/footer.php";
?>
