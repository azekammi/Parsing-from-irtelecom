<?php
require_once "library/simple_html_dom.php";
include_once "classes/db.php";

//> Turning off the time limit
set_time_limit(0);
//< Turning off the time limit

//> Necessary pages
$pageIndexes = array("Telephones" => array("Alcatel 27",
                                    "Apple 6",
                                    "Blackberry 8",
                                    "HTC 23",
                                    "Keneksi 256",
                                    "Meizu 354",
                                    "Philips 353",
                                    "Samsung 7",
                                    "Xiaomi 95"),
                    "Tablets" => array("Alcatel 34",
                                    "Asus 11",
                                    "Lenovo 106",
                                    "Samsung 30"));
//< Necessary pages

//> Crating base query
$sql = "INSERT INTO `products`(`product_name`, `category_id`, `image_path`, `product_price`, `mark_id`,`product_color`,`product_description`,`product_raiting`,`product_operaiting_system`)
VALUES ";
//< Crating base query

foreach ($pageIndexes as $category => $products) {

        for ($i = 0; $i < count($products); $i++) {

            //> Taking the page of the model
            $markAndIndex = explode(" ", $products[$i]);
            $categoryPage = file_get_html('http://irtelecom.az/catalog/index/' . $markAndIndex[1]);
            //< Taking the page of the model

            //> Taking all the links of the Products
            $aTags = $categoryPage->find('a[class=catprev]');
            //< Taking all the links of the Products

            for ($j = 0; $j < count($aTags); $j++) {

                //> Taking the link of the image of the product and saving it
                $imgSrc = $aTags[$j]->find('img')[0]->src;
                if (!file_exists('images/' . basename($imgSrc))) copy($imgSrc, 'images/' . basename($imgSrc));
                //< Taking the link of the image of the product and saving it

                //> Name of the Product
                $prodName = $aTags[$j]->find('div[class=catprev_name]')[0]->innertext;
                //< Name of the Product

                //> Price of the Product
                $property = 'data-product_price';
                $prodPrice = $aTags[$j]->$property;
                //< Price of the Product

                //> Page of the Product
                $prodPage = file_get_html('http://irtelecom.az'.$aTags[$j]->href);
                //< Page of the Product

                //> Color of the Product
                $prodColor = $prodPage->find('span[class=mc_colorname]')[0]->innertext;
                //< Color of the Product

                //> Property name of the Product
                $speclabels = $prodPage->find('span[class=f_speclabel]');
                //< Property name of the Product

                //> Property value of the Product
                $specvalues = $prodPage->find('span[class=f_specvalue]');
                //< Property value of the Product

                //> Creating a description of the Product
                $prodDescr="";
                for ($k=0;$k<count($speclabels);$k++){
                    $prodDescr .= $speclabels[$k]->innertext . "  " . $specvalues[$k]->innertext . "\n";
                }
                //< Creating a description of the Product

                //> Operating system of the Product
                $prodOperSys = $specvalues[0]->innertext;
                if (!empty($prodOperSys)&&strtolower($prodOperSys[0])=='i') $prodOperSys = "iOS";
                else $prodOperSys = "Android";
                //< Operating system of the Product

                //> Creating final query
                $sql .= "('" . addslashes(htmlspecialchars($prodName)) . "',(select id
from categories
where category_name='".$category."'),'".addslashes(htmlspecialchars(basename($imgSrc))) . "','" . addslashes(htmlspecialchars($prodPrice)) . "'," . "(select id
from marks
where mark_name='".$markAndIndex[0]."'),'".addslashes(htmlspecialchars($prodColor))."','".addslashes(htmlspecialchars($prodDescr))."','".(0.5*rand(0,10))."','".addslashes(htmlspecialchars($prodOperSys))."')";
                if ($category!=end($pageIndexes)||$i < count($products) - 1 || $j < count($aTags) - 1) $sql .= ',';
                //< Creating final query
            }
        }
}

//> Query execution
DB::query($sql);
//< Query execution
