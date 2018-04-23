<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use Storage;


class ProductsController extends Controller
{
    public function index()
    {
    	return view('products.index');
    }

    public function create(ProductRequest $request)
    {
    	$data = $request->all();
    	$totalNumberValue = $data['quantity'] * $data['price'];

    	$products = Storage::get('products/products.json');

    	$products = json_decode($products);
    	$lastObject = $products->data[count($products->data) - 1];
    	unset($products->data[count($products->data) - 1]);
    	$totalValue = intval(trim(explode(":", $lastObject->totalNumberValue)[1]));
    	if(count($products->data) == 0){
    		$products->data = array();
    	}
    	
    	
    	$newProduct = new \stdClass;

    	$newProduct->name = $data['name'];
    	$newProduct->quantity = $data['quantity'];
    	$newProduct->price = $data['price'];
    	$newProduct->datatime = date("Y-m-d h:i:sa");
    	$newProduct->totalNumberValue = $totalNumberValue;

    	array_push($products->data, $newProduct);

    	$newProduct2 = new \stdClass;

    	$newProduct2->name = "";
    	$newProduct2->quantity = "";
    	$newProduct2->price = "";
    	$newProduct2->datatime = "";
    	$newProduct2->totalNumberValue = "Sum: " . ($totalValue + $totalNumberValue);

    	array_push($products->data, $newProduct2);
    	$products->data = array_values($products->data);
    	$json = json_encode($products);

    	Storage::put('products/products.json', $json);

    	return response()->json([
    		'msg' => 'Product added successfully'
    	], 200);

    }

    public function all(Request $request)
    {
    	$products = Storage::get('products/products.json');
    	return $products;
    }
}
