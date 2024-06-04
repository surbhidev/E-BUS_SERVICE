<?php
     if(isset($_POST["submit"]))
     {
         $con = mysqli_connect('localhost','root','sdfproject@pss','busschedule');
         $DriverName = $_POST["DriverName"];
         $DriversName = $_POST["DriversName"];
         $StartKm = $_POST["StartKm"];
         $CloseKm = $_POST["CloseKm"];
         $Date = $_POST["Date"];
         $sql = "INSERT INTO invoices (DriverName,DriversName,StartKm,CloseKm,Date) VALUES ('$DriverName','$DriversName','$StartKm','$CloseKm','$Date')";
         mysqli_query($con,$sql);

         mysqli_select_db($con, 'busschedule');
         $invoiceId = mysqli_insert_id($con);

         for($a=0; $a<count($_POST["Time"] ); $a++)
         {
            $Time = $_POST["Time"][$a];
            $formattedTime = date('H:i:s', strtotime($Time));
            $Count = $_POST["Count"][$a];

            $timing = $_POST["timing"][$a];
            $formattedtime = date('H:i:s', strtotime($timing));
            $counting = $_POST["counting"][$a];

            $timer = $_POST["timer"][$a];
            $formattedtime = date('H:i:s', strtotime($timer));
            $counter = $_POST["counter"][$a];

            $times = $_POST["times"][$a];
            $formattedtime = date('H:i:s', strtotime($times));
            $counts = $_POST["counts"][$a];

            $timess = $_POST["timess"][$a];
            $formattedtime = date('H:i:s', strtotime($times));
            $countss = $_POST["countss"][$a];
          
            $sql = "INSERT INTO schedule (invoiceId,Time,Count,timing,counting,timer,counter,times,counts,timess,countss) VALUES ('$invoiceId','$Time', '$Count','$timing','$counting','$timer','$counter','$times','$counts','$timess','$countss')";
            mysqli_query($con,$sql);
        }

      
         echo "<p> Input has been added</p>";
     }
?>

<style>

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    input[type="text"], input[type="integer"], input[type="date"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    button {
        display: block;
        margin-top: 10px;
        padding: 12px 24px;
        background-color: 22799c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.4);
    }

    button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    

    .submit-button {
        display: inline-block;
        padding: 12px 24px;
        background-color: #22799c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }

    .submit-button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.4);
    }

    form {
        width: 100%;
    }

    input {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }

    button {
        display: block;
        margin-top: 10px;
    }

    @media (max-width: 600px) {
        label,
        input {
            width: auto;
        }
    }

    .date {
        text-align: right;
    }
</style>


<form method = "POST" action ="busschedule.php">
    <div> 
        <label for="Date">Date: </label>
        <input id="Date" name="Date" type="Date" placeholder="Write Today's Date">
    </div>
    <div>
        <label for="StartKm">Start:</label>
        <input id="StartKm" name="StartKm" type="integer" placeholder="Enter Starting Reading">
    </div>
    <div>
        <label for="CloseKm">Closing:</label>
        <input id="CloseKm" name="CloseKm" type="integer"  placeholder="Enter Closing Reading">
    </div>
    <div>
        <label for="driverName">Driver Name:</label>
        <input id="driverName" name="DriverName" type="text" placeholder="Enter Driver-1 Name">
    </div>
    <div>
        <label for="driversName">Driver Name:</label>
        <input id="driversName" name="DriversName" type="text" placeholder="Enter Driver-2 Name">
    </div>

<table>
<tr>
  <th colspan="3" style="Text-Align:center"> Bus 1 </th>
  <th colspan="3" style="Text-Align:center"> Bus 2 </th>
  <th colspan="3" style="Text-Align:center"> Bus 3 </th>
  <th colspan="3" style="Text-Align:center"> Bus 4 </th>
  <th colspan="3" style="Text-Align:center"> Bus 5 </th>
  
  </tr>
  <tr>  <th>S.No</th>
        <th>Time</th>
        <th>Count</th>

        <th>S.No</th>
        <th>Time</th>
        <th>Count</th>

        <th>S.No</th>
        <th>Time</th>
        <th>Count</th>

        <th>S.No</th>
        <th>Time</th>
        <th>Count</th>

        <th>S.No</th>
        <th>Time</th>
        <th>Count</th>

 </tr>

 <tbody id="tbody"></tbody>

</table>
 <p>
    <button type="button" onclick="addItem();">
       Enter
    </button>
</p>
<p>
    <button type="submit" name="submit">
       Submit
    </button>
</p>
   
</form>

<script>
    var schedule =0;

    function addItem() {
        schedule++;
        var html ="<tr>";
            html +="<td>" + schedule + "</td>";
            html += "<td><input name ='Time[]'></td>";
            html += "<td><input name ='Count[]'></td>";

            html +="<td>" + schedule + "</td>";
            html += "<td><input name ='timing[]'></td>";
            html += "<td><input name ='counting[]'></td>";
            html += "</tr>";

            html +="<td>" + schedule + "</td>";
            html += "<td><input name ='timer[]'></td>";
            html += "<td><input name ='counter[]'></td>";
            html += "</tr>";

            html +="<td>" + schedule + "</td>";
            html += "<td><input name ='times[]'></td>";
            html += "<td><input name ='counts[]'></td>";
            html += "</tr>";

            html +="<td>" + schedule + "</td>";
            html += "<td><input name ='timess[]'></td>";
            html += "<td><input name ='countss[]'></td>";
            html += "</tr>";

            document.getElementById("tbody").insertRow().innerHTML = html; 
         
            var currentDate = new Date();
            var dateElement = document.getElementById("date");
            dateElement.textContent = currentDate.toDateString();
            
    }
</script>