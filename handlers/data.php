<?php 
$news=getWhere('news', 'status = 1');
$products= getWhere('products','status = 1');
$sponsored=getAll('sponsored');
$team=getAll('team');
$categorys=getWhere('categorys', 'status = 1');
$getProducts=getJoin('categorys','products',"categorys.id AS CatId,
categorys.name AS CatName,
products.id AS ProductsId,
products.name AS ProductName,
products.price AS ProductPrice,
products.description  AS ProudctDescription,
products.Expire_Date   AS ProudctExpire_Date  ,img");


/* echo '<pre>';
print_r($news);
echo '</pre>'; */
?>