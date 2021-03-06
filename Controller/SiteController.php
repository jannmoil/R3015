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
    
    
    
}

?>
