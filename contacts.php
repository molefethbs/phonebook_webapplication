<?php

    session_start();
    require "database/config.php";
    include "components/navbar.php";

    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }
?>
    <h2>Contacts</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <th>Contact Name</th>
        <th>Mobile Number</th>
        <th>Alternative Number</th>
        <th>Email</th>
        <th>Action</th>

        <tbody>
          <?php
            $sql = "SELECT * FROM contacts";
            $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["mobile_no"]; ?></td>
              <td><?php echo $row["alternate_no"]; ?></td>
              <td><?php echo $row["email"]; ?></td>


              <td><a href="editContact.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-fill"></i> </a>
                <a href="includes/deleteContact.inc.php?id=<?php echo $row['id']; ?>"> <i class="bi bi-trash-fill"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>

    
<?php
    include "components/footer.php";
?>
