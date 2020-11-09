@extends('layout')
@section('content')
    <h2 class="title text-center">{{ ucfirst($brandName)}} Brand</h2>
    <h4 class="text-center">{{$products->links()}}</h4>
    @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('storage/'.$product->image)}}" style="width: 200px;height: 230px;" alt="{{$product->name}}" />
                                <h2>{{$product->price}} {{ $product->currency}}</h2>
                                <p>{{$product->name}}</p>
                                <a href="{{route('viewProduct',['id'=>$product->id,'name'=>$product->name])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{$product->price}} {{ $product->currency}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{route('viewProduct',['id'=>$product->id,'name'=>$product->name])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li style="opacity: 0.5"><p style="margin-left: 25px"> <i style="margin-right: 5px" class="fa fa-gift"></i>{{ucfirst($product->brand->name)}}</p></li>
                                <li><a href="{{route('viewProduct',['id'=>$product->id,'name'=>$product->name])}}"><i class="fa fa-plus-square"></i>View product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                    <h4 class="text-center" style="color: #b91d19;margin-top: 45px;margin-bottom: 35px;"> Sorry, No such products
                        related to this {{ ucfirst($brandName)}} brand available yet!
                    </h4>
            @endif
            </div>
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items ( Best Selling )</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="item active">
                                    @foreach($top10 as $item)
                                        @if($loop->index < 3)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{URL::to('storage/'.$item->image)}}" style="width: 220px;height: 250px;"/>
                                                            <h2>{{$item->price}}{{$item->currency}}</h2>
                                                            <p>{{$item->name}}</p>
                                                            <a href="{{route('viewProduct',['id'=>$item->id,'name'=>$item->name])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="item">

                                    @foreach($top10 as $item)
                                        @if($loop->index >= 3)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{URL::to('storage/'.$item->image)}}" style="width: 220px;height: 250px;"/>
                                                            <h2>{{$item->price}}{{$item->currency}}</h2>
                                                            <p>{{$item->name}}</p>
                                                            <a href="{{route('viewProduct',['id'=>$item->id,'name'=>$item->name])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->


@endsection