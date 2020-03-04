<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $task=$_POST['task'];
    $date=$_POST['date'];
    $quantity=$_POST['quantity'];    
    
    // checking empty fields
    if(empty($task) || empty($date) || empty($email)) {    
            
        if(empty($task)) {
            echo "<font color='red'>Task field is empty.</font><br/>";
        }
        
        if(empty($date)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        
        if(empty($quantity)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $sql = "UPDATE users SET task=:task, date=:date, quantity=:quantity WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':task', $task);
        $query->bindparam(':date', $date);
        $query->bindparam(':quantity', $quantity);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':task' => $task, ':date' => $date, ':quantity' => $quantity));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM stats WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $task = $row['task'];
    $date = $row['date'];
    $quantity = $row['quantity'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Task</td>
                <td><input type="text" name="task" value="<?php echo $task;?>"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="text" name="date" value="<?php echo $date;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>