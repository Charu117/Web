<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
    <style>
        p{
            margin-left: 8px;
            color: grey;
        }
    </style>
</head>
<body>
<div>
    <h5 class="center-align">Cinema seat reserving simulation</h5>
</div>
<div class="divider"></div>
<div class="row">
    <form method="post" class="col s2" id="form">
        <input type="text" name="line" id="line" placeholder="line(A,B,C,D,E)">
        <input type="text" name="seat" id="seat" placeholder="seat(1-14)">
        <input type="submit" value="Delete" name="sub" class="btn red lighten-2">
        <input type="submit" value="Reserve" name="sub" class="btn" id="submit">
        
    </form>
</div>    
<div class="row">
    <div class="col s5 ">
        <label for="A">A</label>
        <i class="material-icons" id="A1">event_seat</i>
        <i class="material-icons" id="A2">event_seat</i>
        <i class="material-icons" id="A3">event_seat</i>
        <i class="material-icons" id="A4">event_seat</i>
        <i class="material-icons" id="A5">event_seat</i>
        <i class="material-icons" id="A6">event_seat</i>
        <i class="material-icons" id="A7">event_seat</i>
        <i class="material-icons" id="A8">event_seat</i>
        <i class="material-icons" id="A9">event_seat</i>
        <i class="material-icons" id="A10">event_seat</i>
        <i class="material-icons" id="A11">event_seat</i>
        <i class="material-icons" id="A12">event_seat</i>
        <i class="material-icons" id="A13">event_seat</i>
        <i class="material-icons" id="A14">event_seat</i>
    </div>
    
   
    
</div>
<div class="row">
    <div class="col s5">
        <label for="B">B</label>
        <i class="material-icons" id="B1">event_seat</i>
        <i class="material-icons" id="B2">event_seat</i>
        <i class="material-icons" id="B3">event_seat</i>
        <i class="material-icons" id="B4">event_seat</i>
        <i class="material-icons" id="B5">event_seat</i>
        <i class="material-icons" id="B6">event_seat</i>
        <i class="material-icons" id="B7">event_seat</i>
        <i class="material-icons" id="B8">event_seat</i>
        <i class="material-icons" id="B9">event_seat</i>
        <i class="material-icons" id="B10">event_seat</i>
        <i class="material-icons" id="B11">event_seat</i>
        <i class="material-icons" id="B12">event_seat</i>
        <i class="material-icons" id="B13">event_seat</i>
        <i class="material-icons" id="B14">event_seat</i>
    </div>
</div>
<div class="row">
    <div class="col s5">
        <label for="C">C</label>
        <i class="material-icons" id="C1">event_seat</i>
        <i class="material-icons" id="C2">event_seat</i>
        <i class="material-icons" id="C3">event_seat</i>
        <i class="material-icons" id="C4">event_seat</i>
        <i class="material-icons" id="C5">event_seat</i>
        <i class="material-icons" id="C6">event_seat</i>
        <i class="material-icons" id="C7">event_seat</i>
        <i class="material-icons" id="C8">event_seat</i>
        <i class="material-icons" id="C9">event_seat</i>
        <i class="material-icons" id="C10">event_seat</i>
        <i class="material-icons" id="C11">event_seat</i>
        <i class="material-icons" id="C12">event_seat</i>
        <i class="material-icons" id="C13">event_seat</i>
        <i class="material-icons" id="C14">event_seat</i>
    </div>
    
</div>
<div class="row">
    <div class="col s5">
        <label for="D">D</label>
        <i class="material-icons" id="D1">event_seat</i>
        <i class="material-icons" id="D2">event_seat</i>
        <i class="material-icons" id="D3">event_seat</i>
        <i class="material-icons" id="D4">event_seat</i>
        <i class="material-icons" id="D5">event_seat</i>
        <i class="material-icons" id="D6">event_seat</i>
        <i class="material-icons" id="D7">event_seat</i>
        <i class="material-icons" id="D8">event_seat</i>
        <i class="material-icons" id="D9">event_seat</i>
        <i class="material-icons" id="D10">event_seat</i>
        <i class="material-icons" id="D11">event_seat</i>
        <i class="material-icons" id="D12">event_seat</i>
        <i class="material-icons" id="D13">event_seat</i>
        <i class="material-icons" id="D14">event_seat</i>
    </div>
</div>
<div class="row">
    <div class="col s5">
        <label for="E">E</label>
        <i class="material-icons" id="E1">event_seat</i>
        <i class="material-icons" id="E2">event_seat</i>
        <i class="material-icons" id="E3">event_seat</i>
        <i class="material-icons" id="E4">event_seat</i>
        <i class="material-icons" id="E5">event_seat</i>
        <i class="material-icons" id="E6">event_seat</i>
        <i class="material-icons" id="E7">event_seat</i>
        <i class="material-icons" id="E8">event_seat</i>
        <i class="material-icons" id="E9">event_seat</i>
        <i class="material-icons" id="E10">event_seat</i>
        <i class="material-icons" id="E11">event_seat</i>
        <i class="material-icons" id="E12">event_seat</i>
        <i class="material-icons" id="E13">event_seat</i>
        <i class="material-icons" id="E14">event_seat</i>
    </div>
</div>

<?php include 'logic.php';

$sub = isset($_POST['sub']) ? $_POST['sub']: " ";

if($sub != " "){
    $line = $_POST['line'];
    $seat = $_POST['seat'];
    $arr = read_file();
}


switch($sub){
    case "Reserve":{
        $confirm = 0;
        for($i = 0; $i < 5; $i++){
            for($j = 1; $j <= 14; $j++){
                if($arr[$i][0] == $line){
                    if(($j == $seat) && ($arr[$i][$j] == "0")){
                        $arr[$i][$j] = "2";
                        $confirm = 1;
                        break;
                    }else{
                        $confirm = 0;
                    }
                }
            }
        }
        save_to_file($arr);

        if($confirm){
            echo "<p>Seat reserved</p>";
        }else{
            echo "<p>Seat unavailable</p>";
        }
        break;
    }
    case "Delete":{
        for($i = 0; $i < 5; $i++){
            for($j = 1; $j <= 14; $j++){
                if($arr[$i][0] == $line){
                    if(($j == $seat) && ($arr[$i][$j] == "2")){
                        $arr[$i][$j] = "0";
                        break;
                    }
                }
            }
        }
        save_to_file($arr);
        break;
    }
    default:
        break;
}


?>

<script type="text/javascript">

window.onload = function(){
    var arrayExternal = <?php echo json_encode(read_file()); ?>;
    for(let i = 0; i < arrayExternal.length ; i++){
        for(let j = 1; j < 15; ++j){
            var reserve = arrayExternal[i][0] + j;
            console.log(reserve);
            if(arrayExternal[i][j] == "2"){
                var seatArr = document.getElementById(reserve);
                seatArr.classList.add("teal");
            }
        }
    }
}    

/* document.getElementById("submit").onclick = function(){
    var reservation = document.getElementById("line").value + document.getElementById("seat").value;
    console.log(reservation);
    var seat = document.getElementById(reservation);
    seat.classList.add("red"); 
    //document.getElementById("form").reset();
} */
</script>
</body>
</html>