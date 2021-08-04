<?php
session_start();
class Products {
    public $id=array();
    public $name=array();
    public $image=array();
    public $price=array();
    //Constructor
    public function addProduct($id,$name,$img,$price){
        array_push($this->id, $id);
        array_push($this->name, $name);
        array_push($this->image, $img);
        array_push($this->price, $price);
    }
    // Methods
    public function showProduct(){
        $i=count($this->id);
        for($j=0;$j<$i;$j++)
        {
            $image=$this->image[$j];
            $name=$this->name[$j];
            $price=$this->price[$j];
        $data="<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$image\" alt=\"image1\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">
                    $name
                    <h5>
                    <h6>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                    </h6>
                    <h5>
                        <span>$$price</span>
                    </h5>
                    <button type=\"submit\" name=\"add\" class=\"btn btn-warning my-3\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                </div>
            </div>
        </form>
    </div>
";;
        echo $data;
        }
    }

  
}

?>
