<?php
include("config.php");
// Initialize the session
session_start();


//edits journal entry
if(isset($_POST['edit'])){
  $query = "UPDATE journal SET journal='$_POST[journaledit]' WHERE id ='$_POST[id]'";
	mysqli_query($link,$query);
}
//deletes journal entry
if(isset($_POST['delete'])){
  $DeleteQuery = "Delete FROM journal WHERE id ='$_POST[id]'";
	 mysqli_query($link,$DeleteQuery);
}

//display all journal entries from current user logged in
$sql = "SELECT * from journal WHERE user_id ='$_SESSION[id]'";
$result = mysqli_query($link,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Journal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }

        .journalwrapper {
            margin: 20px auto;
            width:1200px;
            padding: 10px 10px 10px;
            padding-top: 10px;
            background-color:darkgray;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
        }
        .container{
          margin: 20px auto;
        }

        .table{
          border-collapse:separate;
          border-spacing: 20px 15px;

        }
        td{
          background-color: white;
          border-radius: 10px;

        }
        textarea{
          border: none;
          resize: none;
        }

    </style>

</head>
  <body>
<a href="welcome.php" class="btn btn-danger">Home</a>
    <!--Submit a journal entry -->
    <div class="journalwrapper">
      <div class="container">
          <form  action="Submit.php" method="post">
            <div class="row">
              <div class="col-sm-10">
                <textarea class="form-control" type="text" name="journalentry" rows="1" placeholder="Enter text here...."></textarea>
              </div>
              <div class="col-sm">
                <button type="submit" value="Insert"> Submit Entry </button>
              </div>
            </div>
          </form>
        </div>

<!--Display journal entries -->
        <div class="container">
          <table class="table table-borderless ">
    <?php

//Display all journal entries in database
     while ($row = mysqli_fetch_array($result)){
      ?>
      <form action="" method="post">
      <tr>
        <td>
            <textarea type="text"name="journaledit" wrap="off"><?php echo $row['journal'];?></textarea>
            <input type="hidden"name="id" value="<?php echo $row['id'];?>">
            <td><button type="submit" class="btn" name="edit">Edit</button></td>
              <td><button type="submit" class="btn"name="delete">Delete</button></td>
            </td>
          </tr>
        </form>
    <?php
  }
  ?>

    </table>
  </div>
      </div>
    </body>
</html>
