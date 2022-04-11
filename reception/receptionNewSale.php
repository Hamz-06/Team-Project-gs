<?php
// php Insert form for adding vehicle
    include 'connect.php';
    $reference = $_POST['reference'];
    $addPart = $_POST['partCode'];
    $quantity = $_POST['quantity'];

    $sqlPrice = "SELECT price FROM parts_garits WHERE partCode ='$addPart'";
    $resultPrice = mysqli_query($db, $sqlPrice);
    //php script to check if part actually exists 
    $numResultPrice = mysqli_num_rows($resultPrice);
    echo $numResultPrice;

    //validation 
    if(($reference=="")||($addPart=="")||($quantity=="")){

        echo "<script language='javascript'>
        alert('Incomplete data'); 
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
        exit();

    }
 


    //if part exists
    if($numResultPrice<1){
        echo "<script language='javascript'>
        alert('This part does not exist, try again'); 
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
    }else{
        //gets price of item 
        $priceRow = $resultPrice->fetch_assoc();
        $price = $priceRow["price"];
        
        $total = $price * $quantity;
        $sqlGreater = "SELECT stockLevel FROM parts_garits WHERE partCode ='$addPart'";
        $resultGreater = mysqli_query($db, $sqlGreater);
        $row = $resultGreater->fetch_assoc();
        $stock = $row['stockLevel'];
    
        if ($quantity <= $stock) {
            mysqli_query($db, "UPDATE parts_garits SET stockLevel = stockLevel - '$quantity' WHERE partCode = '$addPart'");
            mysqli_query($db, "INSERT INTO sale_garits(receiptReference, quantity, partNo, total)
        VALUES ('$reference','$quantity','$addPart',$total)")
                or die(mysqli_error($db));
    
            echo "<script language='javascript'>
                alert('Use View Receipt to proccess the sale details.');
                window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
                </script>";
        } else {
            echo "<script language='javascript'>
                alert('Out of Bounds!');
                window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
                </script>";
            $db->close();
        }

    }



