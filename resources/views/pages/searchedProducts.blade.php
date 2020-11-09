@extends('layout')
@section('content')
    @include('messages')
    <div class="product-details"><!--product-details-->

        @if(count($products) > 0)
            @foreach($products as $product)

                <div>
                    <h2 style="margin-left: 11px;">{{ucfirst($product->name)}}</h2>
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset('storage/'.$product->image)}}" style="max-width: 350px;max-height: 265px;"/>
                            <h3>New</h3>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h2>{{$product->description}}</h2>
                            <p>Web ID: {{$product->id}}</p>
                            <img src="{{asset('frontend/images/product-details/rating.png')}}" alt="" />
                            <span>
                                            <span id="showPrice">{{$product->price}} {{$product->currency}}</span>
                                            <label>Quantity:</label>
                                            <form method="post" action="{{route('addToCart',$product->id)}}" style="display: inline-block">
                                                @csrf
                                                <input type="number" value="1" min="1" max="{{$product->quantity}}" name="quantity"/>
                                                <input type="hidden" name="availableQuantity" value="{{$product->quantity}}">
                                                <input type="hidden" name="price" value="{{$product->price}}">
                                                <input type="hidden" name="currency" value="{{$product->currency}}">
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                            </form>
                                        </span>
                            <p><b>Available Quantity:</b> {{$product->quantity}}</p>
                            <p><b>Status:</b> {{$product->status}}</p>
                            <p><b>Brand:</b> {{$product->brand->name}}</p>
                            <p><b>Category:</b> {{$product->category->name}}</p>
                            <p><b>Size:</b> {{$product->size}}</p>
                            <p><b>Color:</b> {{$product->color}}</p>
                            <p><b>Published date:</b> {{$product->created_at}}</p>
                            <a href=""><img src="{{asset('frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div>
            @endforeach

        @else
            <h3 class="text-center">Sorry, no matched results.</h3>
        @endif
    </div><!--/product-details-->
@endsection