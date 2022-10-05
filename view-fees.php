<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }


;?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  



<?php require_once("./includes/head-ui.php");?>
  <body>
<?php require_once("./includes/side-bar-ui.php");?>
    <?php require_once("./includes/header-ui.php");?>
    
    <table id="datatableid" class="table">
    <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Fees Amount</th>
      <th scope="col">Department</th>
      <th scope="col">Created At</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        require_once("./config.php");
        $sqlInsert = "SELECT * FROM fees";
        $statement = $conn->prepare($sqlInsert);
        $results = $statement->execute();
        $row = $statement->rowCount();
        $columns = $statement->fetchAll();

        if($results){
           if($row > 0){
            foreach($columns as $column){
                $id = $column['id'];
                $feesamount = $column['feesamount'];
                $department	 = $column['department'];
                $createdat = $column['createdat'];
                

                echo "
                <tr>
                  
                    <td scope='row'>{$id}</td>
                    <td>{$feesamount}</td>
                    <td>{$department}</td>
                    <td>{$createdat}</td>
                    <td>
                        <a href='edit-fees.php?id={$id}' class='btn btn-primary'>Edit</a>
                        <a href='delete-fees.php?id={$id}' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>
                
                ";
            }
           } else{
            echo "
            
            <tr class='text-primary'>Sorry!! No data!!</th>
            ";
           }
        } else{
            $_SESSION['message'] = "Sorry! Something went wrong";
            $_SESSION['alert'] = "alert alert-danger";
        }
    
    
    
    ;?>
   
  </tbody>
</table>



          </div>
    </div>
     <?php require_once("./includes/footer-ui.php");?>
     <?php require_once("./includes/bottom-files.php");?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

     <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

     <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
     <script>
                
        $(document).ready(function () {
    $('#datatableid').DataTable({
        "pagingType":"full_numbers",
        "lengthMenu":[
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });
})
     </script>