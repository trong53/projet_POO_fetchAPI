<?php
namespace App\Controllers;

use App\Models\ArticleModel;
use App\Controllers\ErrorController;

class ArticleController extends ArticleModel
{
    public function index($id=null) {
        
        if ($id) {
            $product = $this->getOne($id);
        }
        if (empty($id) || empty($product)) {
            $error = new ErrorController();
            $error->loadError();
            exit;
        }
        render('views.article', [
            'user'          => $_SESSION['user']??'',
            'product'       => $product
        ]);
    }

    public function getArticles() {
        $idRange = [];

        $cartData = json_decode(file_get_contents('php://input', true));

        if (!empty($cartData)) {
            foreach ($cartData as $key=>$item) {
                if ((intval($item)!=0)) {
                    $articles = $this->getOne(intval($item));
                    $idRange[]= $articles;
                }
            }
        
            if (!empty($idRange)) {
                echo json_encode($idRange);
            }else{
                echo json_encode('Error 404');
            }
        } 
        
    }
}







