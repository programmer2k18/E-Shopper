@extends('layout')
@section('content')

    <div class="blog-post-area">
        <hr>
        <div class="single-blog-post">
            <h3>{{ucfirst($product->product_name)}}</h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> {{$product->user_name}}</li>
                    <li><i class="fa fa-clock-o"></i> {{$product->created_at}}</li>
                    <li> <i class="fa fa-tablet"></i> {{$product->emailAddress->email}}</li>
                    <li><i class="fa fa-mobile-phone"></i> {{$product->emailAddress->phone}}</li>
                </ul>
                <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
            </div>
            <a href="">
                <img src="{{URL::to('storage/'.$product->image)}}"  style="width: 100%;height: 370px"alt="">
            </a>
            <p>{{$product->description}}</p>

            <div>
                <p><b>Price:</b> {{$product->price}} {{$product->currency}}</p>
                <p><b>Available Quantity:</b> {{$product->quantity}}</p>
                <p><b>Status:</b> {{$product->status}}</p>
                <p><b>Category:</b> {{$product->category}}</p>
                <p><b>Size:</b> {{$product->sizes}}</p>
                <p><b>Color:</b> {{$product->colors}}</p>
                <p><b>Selling Address:</b> {{$product->selling_address}}</p>
                <p><b>Published date:</b> {{$product->created_at}}</p>
            </div>

        </div>
    </div><!--/blog-post-area-->

    <div class="rating-area">
        <ul class="tag">
            <li>TAGS:</li>
            <li><a class="color" href="#">{{$product->tags}}</a></li>
        </ul>
    </div><!--/rating-area-->


{{--

    <div class="socials-share">
        <a href=""><img src="{{URL::to('frontend/images/blog/socials.png')}}" alt=""></a>
    </div><!--/socials-share-->

    <div class="media commnets">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{URL::to('frontend/images/blog/man-one.jpg')}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Annie Davis</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="blog-socials">
                <ul>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <a class="btn btn-primary" href="">Other Posts</a>
            </div>
        </div>
    </div><!--Comments-->
--}}

    <div class="response-area">
        <h2>{{count($comments)}} RESPONSES</h2>
        <ul class="media-list">
            @foreach($comments as $comment)
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object"  style="border-radius: 50%;width: 50px;height: 50px;" src="{{URL::to('frontend/images/blog/man-four.jpg')}}" alt="">
                    </a>
                    <div class="media-body">
                        <ul class="sinlge-post-meta">
                            <li><i class="fa fa-user name"></i>{{$comment->user_name}}</li>
                            <li><i class="fa fa-clock-o time"></i> {{$comment->created_at}}</li>
                        </ul>
                        <p class="commentBody">{{$comment->comment}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div><!--/Response-area-->

    <div class="replay-box">
        <div class="row">
            <div class="col-sm-9">
                <h2>Leave a comment</h2>
                <form id="commentForm" method="post">
                    @csrf
                    <div class="text-area">
                        <div class="blank-arrow">
                            <label>Your Comment</label>
                        </div>
                        <span>*</span>
                        <textarea name="comment" id="commentBox" rows="11" data-id="{{$product->id}}"></textarea>
                        <span></span>
                        <button class="btn btn-primary" id="addComment" type="submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/Repaly Box-->

@endsection