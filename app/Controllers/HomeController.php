<?php
namespace App\Controllers;

use App\Models\HomeModel;

class HomeController extends HomeModel
{
    private $filter;
    private $articlesPerPage = 12;

    public function index($filter, $page) {
        $this->filter = $filter; 
        if (!in_array($this->filter,['all', 'female', 'male', 'price_ins', 'price_des'])){
            $this->filter = 'all';
        }

        [$count, $pages] = $this->pagination($this->filter);

        if ($page <=0 || $page>$pages) {
            $page = 1;
        }

        $products = $this->getProductsByFilter($this->filter, $page, $this->articlesPerPage);

        render('views.home', [
            'user'          => $_SESSION['user']??'',
            'product'       => $products,
            'filter'        => $filter,
            'currentPage'   => $page,
            'pages'         => $pages
        ]);
    }

    public function pagination($filter){
        $count = count($this->countProductsByFilter($this->filter));
        $pages = ceil($count/$this->articlesPerPage);
        return [$count, $pages];
    }

}







