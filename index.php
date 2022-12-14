<?php

    include_once './config/db.php';
    include_once './auth/auth.php';

    $userPhone=$_SESSION['user-phone'];
    $inovice = $conn->query("SELECT invoice FROM users WHERE phone='$userPhone'")->fetch_all()[0];
    $user = $conn->query("SELECT userName FROM users WHERE phone='$userPhone'")->fetch_all()[0];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include('head.php'); ?>
</head>
<body>

    <nav class='bg-primary py-3 px-4 '>
        <div class="container d-flex" style="justify-content: space-between;">
            <div class='d-flex align-items-center gap-3'>
                <i class="fas fa-user-alt text-white " style="font-size:22px;"></i>
                <h3 class='text-white m-0' style="text-transform: capitalize;"><?php echo $user[0]?></h3>
            </div>
            <div class='d-flex align-items-center gap-3 ' style="width: fit-content; cursor: pointer;">
                <a href="./actions/logout.php" class=" d-flex align-items-center gap-3">
                <i class="fas fa-sign-out-alt text-white " style="font-size:22px;"></i>
                <h6 class='text-white m-0' style="text-transform: capitalize;">Logout</h6>
            </a>
            </div>
            
        </div>
    </nav>
    <div class="container my-4">

        <div class="pt-3" style="max-width: 600px;">
            <h6 class="mb-3">Input Your Phone Number To Know Your Invoice</h6>
            <div class="d-flex" style="align-items: flex-end; gap: 1rem;">
                <div  style="width:70%;">
                    <label class="form-label" for="typeNumber">Phone Number</label>
                    <input type="number" id="Phone" class="form-control" />
                </div>
                <button type="button" class="btn btn-primary show-invoice" style="height: fit-content;">Show the invoice</button>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary button-modal" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="display: none;">
            Launch demo modal
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Invoice</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script>
        $(document).ready(()=>{
            $('.show-invoice').click(()=>{
                
                $.ajax({
                    type: 'POST',
                    url: 'actions/invoice.php',
                    data: {
                        Phone:$('#Phone').val()
                    },
                    success: (data) => {
                        $('.modal-body').html(`<strong style="display:flex;align-items:center;gap:2px;"> <p style="margin:0;">${data}</p>SYP</strong>`)
                        $('.button-modal').click()

                    },
                    error: (err) => {
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.error(err.statusText);
                    }
                })
            })
        })
    </script>
</body>
</html>