<?php
class SiteEntity
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $color;
    public $label;
    public $image;
    public $review;
    
    function __construct($id, $name, $type, $price, $color, $label, $image, $review) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->color = $color;
        $this->label = $label;
        $this->image = $image;
        $this->review = $review;
    }
}
?>
