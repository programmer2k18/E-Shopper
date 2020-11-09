<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use App\Order_Details;

class HomeController extends Controller
{
    public function homePage()
    {
        $products = Products::where('quantity','>',0)->
        where('publication_status','=',1)->paginate(9);

        $topTenIds = Order_Details::topTenIds();
        $testIds = $this->setIds($topTenIds);
        $topTenProducts = Products::Top10Products($testIds);

        return view('pages.home_content')->
        with(['products'=>$products,'top10'=>$topTenProducts]);
    }

    public function setIds($topTenIds){
        $testIds = array();
        foreach ($topTenIds as $id){
            array_push($testIds,$id->productId);
        }
        return $testIds;
    }
}
