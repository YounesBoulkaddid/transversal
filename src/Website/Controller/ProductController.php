<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 15/05/15
 * Time: 22:54
 */
namespace Website\Controller;
use Website\Model\ProductManager;

class ProductController extends AbstractBaseController{

    public function __construct()
    {
        $this->bdd = $this->getConnection();
    }

    public function listProductsAction($request)
    {
    if(isset($request['query']['category'])){
        $productManager = new ProductManager($this->getConnection());
        $Idproducts = $productManager->ListIdProductsByCategory($request['query']['category']);
        if($Idproducts){
            foreach($Idproducts as $array){

                foreach($array as $value){
                    $products[] = $productManager->showProduct($value);
                }
            }
        }else{
            $this->addMessageFlash(2, 'Aucun produit dans cette section<br>Retour à "Toute les catégories"');
            return[
                'redirect_to' => 'index.php?p=product_list'
            ];
        }

    }else{
        $productManager = new ProductManager($this->getConnection());
        $products = $productManager->ListProducts();
    }
        return [
            'view' => 'src/Website/View/product/listProducts.html.php',
            'products' => $products
        ];
    }

    public function showProductAction($request)
    {
        $productManager = new ProductManager($this->getConnection());
        $product = $productManager->showProduct($request['request']['id']);

        return [
            'view' => 'src/Website/View/product/showProduct.html.php',
            'product' => $product
        ];
    }

    public function addProductAction($request)
    {
        if ($request['request']) {
            $productManager = new ProductManager($this->getConnection());
            $productManager->showProduct($request['request']['name'],$request['request']['password'], $request['request']['email'] );
            return [
                'redirect_to' => 'index.php?p=product_list',
            ];
        }

        return [
            'view' => 'src/Website/View/Product/addProduct.html.php',
        ];
    }

    public function deleteProductAction($request)
    {
        $productManager = new ProductManager($this->getConnection());
        $productManager->showProduct($request['request']['name']);
        return [
            'redirect_to' => 'index.php?p=product_list',
        ];
    }
}