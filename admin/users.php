<?php
    include_once '../config/db.php';
    include_once '../auth/adminAuth.php';
    session_start();

    
    $sql="SELECT * FROM users";
    $result=$conn->query($sql);
    $arr_users=[];
    if($result->num_rows>0){
        $arr_users=$result->fetch_all(MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Users</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/app.css">
</head>

<body class="dashboard">
    <div class="dashboard-wrapper">
        <div class="flex-row">
            <aside>
                <h3>Dashboard</h3>

                <a href="#" class="d-flex align-items-center gap-3 mt-4">
                    <i class="fas fa-user-alt"></i>
                    <span>users</span>
                </a>
                
                <a href="../actions/logout.php" class="d-flex align-items-center gap-3 " style="position: absolute; bottom: 25px;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>logout</span>
                </a>
            </aside>
            <div class="wrapper-content">
                <h3>Users</h3>
                <div class="table-container">
                    <table id="table_id" class="table table-stripe">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Occupation</th>
                                <th>Birthday</th>
                                <th>Invoice</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($arr_users)) { ?>
                                <?php foreach($arr_users as $user) { ?>
                                    
                                    <tr id="row-<?php echo $user['id']?>">
                                        <td><?php echo $user['firstName']?></td>
                                        <td><?php echo $user['lastName']?></td>
                                        <td><?php echo $user['userName']?></td>
                                        <td><?php echo $user['email']?></td>
                                        <td><?php echo $user['phone']?></td>
                                        <td><?php echo $user['city']?></td>
                                        <td><?php echo $user['address']?></td>
                                        <td><?php echo $user['gender']?></td>
                                        <td><?php echo $user['occupation']?></td>
                                        <td><?php echo $user['date']?></td>
                                        <td id='invoice-feild-<?php echo $user["id"]?>'><?php echo $user['invoice']?></td>
                                        
                                        <td><i id='add-invoice' data-mdb-toggle="modal" data-mdb-target="#modal-<?php echo $user['id']?>"  data-id="<?php echo $user["id"]?>" data-userName="<?php echo $user["userName"]?>"  
                                        data-invoice="<?php echo $user["invoice"]?>"
                                        class="fas fa-plus-circle mx-auto " style="font-size:22px;color:#3b71ca; cursor:pointer;"></i></td>
                                    </tr>
                                    <div class="modal fade" id="modal-<?php echo $user['id']?>" data-id="<?php echo $user['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="title">Edit Invoice for <?php echo $user['userName']?></h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-outline" >
                                                    <input type="number" id="invoice-<?php echo $user['id']?>" value="<?php echo $user['invoice']?>"  style="height:50px !important;" class="form-control" />
                                                    <label class="form-label py-2" for="typeNumber">Invoice</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                                <button id="save-invoice" data-id="<?php echo $user['id']?>" type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                <?php }?>
                            <?php }?>
                           
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                rowReorder: true
            });
 
            
            document.querySelectorAll('#save-invoice').forEach((el)=>{
                    el.addEventListener('click',()=>{
                        const userId=el.getAttribute('data-id');
                        
                        $.ajax({
                    type: 'POST',
                    url: '../actions/add_invoice.php',
                    data: {
                        userId:userId,
                        invoice: $(`#invoice-${userId}`).val(),
                    },
                    success: (message) => {
                        
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.success(message); 
                        
                        $(`#invoice-feild-${userId}`).html( $(`#invoice-${userId}`).val(),)
                        $(`#modal-${userId}`).modal('toggle');
                    },
                    error: (err) => {
                         alertify.set('notifier', 'position', 'bottom-left')
                        alertify.error(err.responseText);
                        console.log(err)
                    }
                })
                })
                    
            })
           
           
        });
    </script>
</body>

</html>