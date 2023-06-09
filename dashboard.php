<?php
include "inc/header.php";
if (!isset($_SESSION['users'])) {
    echo "<script>alert('Please Sign in first');window.location.href='signin.php';</script>";
}
include "controller/controller.php";

$C02 = $conn->query("SELECT * FROM pre_data WHERE user_name = '$uname'");
$row = mysqli_fetch_assoc($C02);

?>
<section action="product.php" method="POST" class="px-5 py-0 m-2 mt-0 mb-0 bg-warnings">
    <div class="row py-3 px-5 bg- rounded">
        <div class="col-12 d-flex">
            <h1 class="col-9">Dashboard</h1>
            <p class="col-3 text-end"><?php echo date("d M Y") ?></p>
        </div>
        <hr>

        <!-- total summary -->

       <!-- total summary --> 
       <div class="col-lg-6 p-4 bg-6 text-white"> 
  <h2 class="text-center">Carbon Footprint</h2> 
  <hr> 
  <div id = "pC02" class="d-flex justify-content-center align-items-center flex-column"> 
    <h1 id = "CO2" style="font-size: 130px;">00</h1> 
    <p class="text-end">Kg CO<sub>2</sub> per year</p> 
  </div> 
</div> 

        <!-- consumption by sector --> 
        <div class="col-6 bg-black p-0 m-0 d-flex" style="display: non; color:black;"> 
                <!-- <canvas id="barChart" width="300" height="300"></canvas> --> 
                <div class="col-lg-12 bg-2 p-4"> 
                    <canvas id="barChart" width="300" height="300"></canvas> 
                </div> 
            </div> 
        <!-- Tips part --> 
        <div style="margin-top: 20px;padding-right: 0px;padding-left: 0px;"> 
         <div class="row-lg-6 bg-2 p-4"> 
        <h2 class="" style="text-align:center;">AI Recommendation</h2> 
        <hr> 
        <div class="d-flex flex-column"> 
            <p class="text-justify"><strong> Sustainable Transportation and Energy Efficiency</strong><br> 
            Opt for sustainable transportation alternatives, such as walking, cycling, or using public transportation, <br> 
            to reduce your carbon footprint. By minimizing the use of personal vehicles and choosing greener options, <br> 
            you can significantly decrease greenhouse gas emissions and promote a cleaner environment.<br> 
            </p> 
            <p class="text-justify"><strong>Reducing Your Carbon Footprint</strong><br> 
            Embrace energy-efficient practices by adopting renewable energy sources, like solar panels or wind turbines, <br> 
            for powering your home. Additionally, implementing energy-saving habits like turning off lights when not in use,<br> 
             using energy-efficient appliances, and properly insulating your living space can help reduce carbon emissions and promote a more sustainable lifestyle.<br> 
            </p> 
        </div>

    </div> 
</div> 
        <!-- Tips part -->
            <!-- <div class="col-lg-6 bg-2 p-4">
                <h2 class="">Power Saving Tip</h2>
                <hr>
                <div class="d-flex">
                    <p class="col-5 text-justify pe-3"><strong>Use Natural Light</strong><br>
                    Turning off one 60-watt bulb for four hours a day is a $9 saving over a year.
                    </p>
                    <p class="col-7 text-justify ps-3"><strong>Wash Laundry in Cold</strong><br>
                    Switching from hot to cold water for an average of three loads per week, you could save up to RM 88 per year.
                    </p>
                </div>
            </div> -->
    </div>
</section>

<section class="px-5 py-0 m-2 mt-0 mb-5 bg-warnings">
    <div class="row py-3 px-5 bg-warnings rounded">
        <h2>Activity List</h2>
        <?php
        // Display the list of activities
        if (isset($_SESSION["activities"]) && !empty($_SESSION["activities"])) {
            echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
            echo "<tr><th style='border: 1px solid black; padding: 8px;'>Activity</th><th style='border: 1px solid black; padding: 8px;'>Co2 Emission</th><th style='border: 1px solid black; padding: 8px;'>Action</th></tr>";
            // echo "<tr><th style='border: 1px solid black; padding: 8px;'>Activity</th><th style='border: 1px solid black; padding: 8px;'>Co2 Emission</th></tr>";
            foreach ($_SESSION["activities"] as $index => $activity) {
                echo "<tr>";
                echo "<td style='border: 1px solid black; padding: 8px;'>$activity</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>10.00</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='activity_index' value='$index'>"; 
                echo "<button type='submit' name='delete_activity'>Delete</button>";
                if(isset($_POST['delete_activity'])){
                    echo "<script>window.location.href='dashboard.php';</script>";
                }
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No activities found.";
        }

        // Delete activity from the list
        if (isset($_POST["delete_activity"]) && isset($_POST["activity_index"])) {
            $index = $_POST["activity_index"];
        if (isset($_SESSION["activities"][$index])) {
            unset($_SESSION["activities"][$index]);
            $_SESSION["activities"] = array_values($_SESSION["activities"]);
        }
}

        ?>
    </div>
</section>





<!--

the best tips to save energy

 Turn off unnecessary lights- two 100-watt incandescent bulbs switched off an extra two hours per day could save you $15 over a year. Better yet, switch to LED.
Save $15

Unplug unused electronics - Standby power can account for 10% of an average household's annual electricity use. Unplug unused electronics and save $50 a year.
Save $50
Not home? Turn off the air conditioner- Turn off that old window unit air conditioner for five hours a day while you're away. Do that for 60 days over a summer and you'll save $16.
Save $16
Ditch the desktop computer- If you're still using that old desktop, recycle it and switch to your laptop. If you use your laptop two hours per day, you'll save $4 over a year.
Save $4
.Wash laundry in cold- By switching from hot to cold water for an average of three loads per week, you could save up to $22 per year on your energy bill.
Save $22
Be efficient with refrigeration- Unplug that second fridge and save up to $55 a year. Freeze plastic jugs of water and use them in a cooler when you need them.
Save $55
Use the microwave, crock pot or toaster oven- A microwave takes 15 minutes to do the same job as 1 hour in an oven. Use a microwave instead of your oven 4 times a week and save $13/year.
Save $13
Use task lighting- turn off ceiling lights and use table lamps, track lighting and under-counter lights in work and hobby areas as well as in kitchens.
Save $


Manage your thermostat- If you have electric heat, lower your thermostat by two degrees to save 5% on your heating bill. Lowering it five degrees could save 10%.

Wash laundry in cold- By switching from hot to cold water for an average of three loads per week, you could save up to $22 per year on your energy bill.
Save $22
 -->
<?php
include "inc/footer.php";
?>
<script>
src="https://code.jquery.com/jquery-3.6.0.min.js";
function calCarbonTransport(transportMode, transportFrequency){
    transportMode = transportMode.split(', ')
    if(transportMode.includes('walk') && transportMode.length == 1){
        return 0;
    }else if(transportMode.includes('bike')){
        transportFrequency = transportFrequency * 12;
    }else if(transportMode.includes('car')){
        transportFrequency = transportFrequency * 10;
    }else{
        transportFrequency = transportFrequency * 7;
    }
    transportResult = transportFrequency/transportMode.length;
    return transportResult;
}

function calMeatConsumption(meatChoice){
    if(meatChoice == 'VEGAN'){
        return 0;
    }else if(meatChoice == 'LOW'){
        return 1;
    }else if(meatChoice == 'MEDIUM'){
        return 1.8;
    }else if(meatChoice == 'HIGH'){
        return 2.2;
    }
}

function calFlightConsumption(flightDur){
    if(flightDur == 'Short'){
        return 26;
    }else if(flightDur == 'Medium'){
        return 39;
    }else{
        return 60;
    }
}

var resource = <?php echo json_encode($row); ?>;

$(document).ready(function() {
    var totalC02 = calCarbonTransport(resource.mode_Of_Transportation, resource.transport_Frequency) + calMeatConsumption(resource.meat_Choice) + calFlightConsumption(resource.flight_Options);
    var element = document.getElementById("CO2");
    element.textContent = totalC02;
});
</script>

