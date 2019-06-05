<?php

require ("Model/SiteModel.php");

//Contains functions for the page
class SiteController {

    //Creates a dropdown list for products by the product types
    function CreateDropdownList() {
        $productModel = new SiteModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($this->GetProductTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    //Shows all available values
    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    //Generate tables for items in the array
    function CreateTables($types) {
        $productModel = new SiteModel();
        $productArray = $productModel->GetProductByType($types);
        $result = "";

        foreach ($productArray as $key => $product) {
            $result = $result .
                    "<table class = 'coffeeTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$product->image'  /></th>
                            <th width = '75px' >Name: </th>
                            <td>$product->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$product->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$product->price</td>
                        </tr>
                        
                        <tr>
                            <th>Color: </th>
                            <td>$product->color</td>
                        </tr>
                        
                        <tr>
                            <th>Label: </th>
                            <td>$product->label</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$product->review</td>
                        </tr>                      
                     </table>";
        }
        return $result;
    }

     //Returns list of files in a folder.
     function GetImages() {
        //Select folder to scan
        $handle = opendir("Images/Products");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }

    

    function UpdateProduct($id) {
        
    }

    function DeleteProduct($id) {
        
    }
    
    
    //Get Methods
    function GetProductById($id) {
        $productModel = new SiteModel();
        return $productModel->GetProductById($id);
    }

    function GetProductByType($type) {
        $productModel = new SiteModel();
        return $productModel->GetProductByType($type);
    }

    function GetProductTypes() {
        $productModel = new siteModel();
        return $productModel->GetProductTypes();
    }
    
    function GetProductByType2($type) {
        $productModel = new SiteModel();
        return $productModel->GetProductByType2($type);
    }
    
    //Overview table
    function CreateOverviewTable() {
        $result ="
            <table class='overviewTable'>
            <tr>
                <td></td>
                <td></td>
                <td><b>Id</b></td>
                <td><b>Name</b></td>
                <td><b>Type</b></td>
                <td><b>Price</b></td>
                <td><b>Color</b></td>
                <td><b>Label</b></td>
            </tr>";
        
        $productArray = $this->GetProductByType2 ('%');

        foreach ($productArray as $key => $value)
        {
            $result = $result
                "<tr>
                    <td><a href=''>Update</a></td>
                    <td><a href=''>Delete</a></td>
                    <td>$value->id</td>
                    <td>$value->name</td>
                    <td>$value->type</td>
                    <td>$value->price</td>
                    <td>$value->color</td>
                    <td>$value->label</td>
                </tr>";
        }
        
        $result = $result . "</table>";
        return $result;
        
     }
    
}

?>
