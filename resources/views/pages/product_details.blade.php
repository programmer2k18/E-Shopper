@extends('layout')
@section('content')
    <h2 class="title text-center">{{ucfirst($product->name)}}</h2>
        @include('messages')
        <div class="product-details"><!--product-details-->

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
        </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{count($reviews)}})</a></li>
            </ul>
        </div>
        <div class="tab-content">

            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <?php
                        date_default_timezone_set('Africa/Cairo');
                    ?>
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>{{auth()->user()?auth()->user()->name:" User "}}</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>{{date('H:m:s')}}</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>{{date('d:M:Y')}}</a></li>

                    </ul>

                        <ul>
                            @if(count($reviews) > 0)
                                @foreach($reviews as $review)
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="{{asset('frontend/images/blog/man-two.jpg')}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <ul class="sinlge-post-meta">
                                                <li><i class="fa fa-user"></i>{{ucfirst($review->name)}}</li>
                                                <li><i class="fa fa-clock-o"></i>{{$review->created_at}}</li>
                                                <li><i class="fa fa-calendar"></i> Rating: {{$review->rating}}/5</li>
                                                @if(auth()->user()&&auth()->user()->id==$review->user_id)
                                                    <li><i class="fa fa-expand"></i><a style="display: inline-block;padding: 2px" href="{{route('deleteReview',['id'=>$product->id,'name'=>$product->name])}}">
                                                            Delete Review</a></li>
                                                @endif
                                            </ul>
                                            <p>{{$review->review}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>No Reviews for this product yet.</li>
                            @endif

                        </ul>
                </div>

                    <h4> Your feedback is very important to us to enhance our selling process.</h4>
                    <p><b>Write Your Review for {{ucfirst($product->name)}}</b></p>
                    @if(session('reviewed'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    X
                                </button>
                                <h4>{{session('reviewed')}}</h4>
                            </div>
                    @endif
                    <form action="{{route('review',['id'=>$product->id,'name'=>$product->name])}}" method="post">
                        @csrf
                        <textarea name="feedback" placeholder=" Write Your thoughts..." style="color: black" required></textarea>
                        <b>Rating: <input class="form-control-lg" type="number" value="4"
                        min="1" max="5" name="rating" style="margin-left: 7px;border-radius: 5px;outline: 0;border: 0px"> </b>
                        <button type="submit" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->
@endsection