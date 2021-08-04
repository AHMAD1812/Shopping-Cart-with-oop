<?php
session_start();
$_SESSION['show']=0;
class Cart{
    public $id=array();
    public $name=array();
    public $image=array();
    public $price=array();
    public int $i=0;

    public function addToCart($id,$name,$img,$price){
            array_push($this->id, $id);
            array_push($this->name, $name);
            array_push($this->image, $img);
            array_push($this->price, $price);
    }

    public function showCart(){
        echo count($this->name);
        $i=count($this->id);
        $_SESSION['shopping_cart']=$i;
        for($j=0;$j<$i;$j++)
        {
            $image=$this->image[$j];
            $name=$this->name[$j];
            $price=$this->price[$j];
            $element = "
    
    <form action=\"\" method=\"post\" class=\"cart-items space-cart\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"$image\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$name</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\"></h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
            echo  $element;
        }
    }
    
    public function totalPrice(){
        $value=array_sum($this->price);
        echo $value;
    }

    public function deleteItem($id){
        $i=count($this->id);
        $check=1;
        for($j=0;$j<$i;$j++)
        {
            $idFind=$this->id[$j];
            if($idFind==$id){
                array_splice($this->id,$j,1);
                array_splice($this->name,$j,1);
                array_splice($this->image,$j,1);
                array_splice($this->price,$j,1);
                $_SESSION['show']=2;
                $check=2;
                break;
            }
        }
        if($check==1){
            $_SESSION['show']=1;
        }
    }
}

$cart=new Cart();
$cart->addToCart(2,"shoes","product2.jpg",200);
$cart->addToCart(4,"Light Bulbs","product4.jpg",430);
$cart->addToCart(1,"Bag","product1.jpg",130);
// $cart->deleteItem(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart space-cart-1">
                <h6>My Cart</h6>
                <hr>

                <?php
                if($_SESSION['show']==1){
                    echo "<div class=\"alert alert-danger\"> This Product is not in array</div>";
                }
                else if($_SESSION['show']==2){
                    echo "<div class=\"alert alert-success\"> Product is Deleted From Array</div>";
                }
                $cart->showCart();

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6>Total Price:
                        <?php
                        $cart->totalPrice();
                        ?>
                        </h6>
                        <h6>Delivery Charges: FREE</h6>
                        <hr>
                        <h6>Amount Payable
                        <?php
                        $cart->totalPrice();
                        ?>
                        </h6>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

