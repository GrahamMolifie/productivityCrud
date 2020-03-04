<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $task = $_POST['task'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
        
    // checking empty fields
    if(empty($task) || empty($date) || empty($quantity)) {
                
        if(empty($task)) {
            echo "<font color='red'>Task field is empty.</font><br/>";
        }
        
        if(empty($date)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        
        if(empty($quantity)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO stats(task, date, quantity) VALUES(:task, :date, :quantity)";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':task', $task);
        $query->bindparam(':date', $date);
        $query->bindparam(':quantity', $quantity);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':task' => $task, ':quantity' => $quantity, ':date' => $date));
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result1</a>";
    }
}
?>
</body>
</html>