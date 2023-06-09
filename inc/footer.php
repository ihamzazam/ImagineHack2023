<!-- back to top button --> 
<div class="pb-4 px-4 text-end m-0"> 
<a class="bg-white" style=""  href="#top"><i class="fas fa-arrow-circle-up fa-3x" style="color: #820A7D;" ></i></a> 
</div> 
 
<!-- footer --> 
<footer> 
  <div class="text-center pt-2 bg-2" style="background-image: linear-gradient(to right, #5B059D, #820A7D);opacity: 1"> 
    <div class="row p-3" style = "color:#FFFFFF"> 
      <div class="col-md-5 ps-5 text-start"> 
        <h1 style = "color:#FFFFFF">CARBON WATCH</h1> 
        <h5 style = "color:#FFFFFF">MAKING EARTH A BETTER PLACE</h5> 
        No. 1 Jalan Taylor's 47500 Subang Jaya, Selangor Darul Ehsan, Malaysia 
      </div> 
      <div class="col-md-3 ps-5 text-start"> 
        <h3 style = "color:#FFFFFF">Team</h3> 
        <hr style = "color:#FFFFFF"> 
        Code Wizards 
      </div> 
      <div class="col-md-3 ps-5 text-start"> 
        <h3 style = "color:#FFFFFF">Contact</h3> 
        <hr style = "color:#FFFFFF"> 
        codewizards@test.com 
      </div> 
    </div> 
    <hr class="m-0"> 
      <p class="m-0 py-1" style = "color:#FFFFFF; background-color:black"> 
      &copy; 2023 <a href="index.php" style = "color:#FFFFFF">Carbon Watch</a> 
      </p> 
  </div> 
</footer> 
 
<?php 
 
$data1 = 72; 
$data2 = 18; 
?> 
 
 <script>  
jQuery(document).ready(function(){var chartDiv=$("#barChart");var myChart=new Chart(chartDiv,{type:'doughnut',data:{labels:["Transport","FoodConsumption"],datasets:[{data:[<?php echo $data1; ?>,<?php echo $data2; ?>],backgroundColor:["#0076CC","#6DDE16","#FFCE56","#E7E9ED","#36A2EB"]}]},options:{title:{display:true,text:'This Month Carbon Contribution', fontColor: "#000000"},responsive:true,maintainAspectRatio:false}})});  
  
var speedCanvas=document.getElementById("speedChart");Chart.defaults.global;Chart.defaults.global.defaultFontSize=18;Chart.defaults.global.defaultFontColor = '#000000';var speedData={labels:["March","May","Current"],datasets:[{label:"Electricity Bill",data:[157,178,113],lineTension:0,fill:false,borderColor:'orange',backgroundColor:'transparent',pointBorderColor:'orange',pointBackgroundColor:'rgba(255,150,0,0.5)',borderDash:[5,5],pointRadius:5,pointHoverRadius:10,pointHitRadius:30,pointBorderWidth:2,pointStyle:'rectRounded'}]};var chartOptions={legend:{display:true,position:'top',labels:{boxWidth:80, fontColor: "#000000"}},scales:{xAxes:[{gridLines:{display:false, fontColor: "#000000"},scaleLabel:{display:true,labelString:"Months",fontColor: "#000000"}}],yAxes:[{gridLines:{color:"black",borderDash:[2,5]},scaleLabel:{display:true,labelString:"Price (RM)",fontColor: "#000000"}}]}};var lineChart=new Chart(speedCanvas,{type:'line',data:speedData,options:chartOptions});  
</script>
 
 
<!-- link of dependencies --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"> 
</script> 
<script src="https://kit.fontawesome.com/113654cb35.js" crossorigin="anonymous"></script> 


 
</body> 
</html>