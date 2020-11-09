@extends('layout')
@section('content')


        <div class="blog-post-area">
            @if(session('approveMessage'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <h4>{{session('approveMessage')}}</h4>
                </div>
            @endif

            <h2 class="title text-center">Sell Product</h2>
            <section class="sell-product">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 q">
                            <h4> Publish your products to the public now.<br></h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="button">
                                <a href="#" class="btn btn-success">Sell Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h2 class="title text-center">Latest From our Blog</h2>

            @if(count($orders) > 0)
                @foreach($orders as $order)
                    <div class="single-blog-post">
                                <h3>{{ucfirst($order->product_name)}}</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i> {{$order->user_name}}</li>
                                        <li><i class="fa fa-clock-o"></i>{{$order->created_at}} </li>
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
                                    <img src="{{URL::to('storage/'.$order->image)}}" style="width: 100%;height: 370px" alt="{{$order->product_name}}">
                                </a>
                                <p>{{$order->description}}...</p>
                                <a  class="btn btn-primary" href="{{route('singleProduct',$order->id)}}">Read Full Description</a>
                    </div>
                    <hr>
                @endforeach
            @endif
            {{$orders->links()}}
        </div>

        <section class="pop-up">
            <section class="data">
                <div class="container">
                    <div class="row">

                        <div class="bill-to">
                            <form method="post" action="{{route('addOrderToBlog')}}" onsubmit="validate()" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5 form-one">

                                        <input class="form-one" type="text" name="product-name" placeholder=" Product Name">
                                        <span></span>

                                        <input type="text" name="category" placeholder=" Category(eg.clothes,devices,watches etc..)" required>
                                        <span></span>

                                        <select name="status" required>
                                            <option selected> Select Product Status</option>
                                            <option value="new"> New</option>
                                            <option value="old"> Old</option>
                                        </select>

                                        <input type="text" name="selling_area" placeholder=" Please provide an accurate address where to sell it." required>
                                        <span></span>

                                        <input type="text" name="price" placeholder=" Product Price" required>
                                        <span></span>

                                        <select name="currency" required>
                                            <option selected> Select Product Currency</option>
                                            <option value="dollar" > Dollar </option>
                                            <option value="euro" > Euro </option>
                                            <option value="yen" > Yen </option>
                                            <option value="frank" >Frank</option>
                                            <option value="sterling " >Sterling </option>
                                            <option value="rupess">Rupees </option>
                                            <option value="EGB">EGB </option>
                                        </select>

                                        <input type="number" min="1"  name="quantity" placeholder=" Quantity to sell" required>
                                        <span></span>

                                        <input type="text"  name="colors" placeholder=" Colors of the product(eg: red,blue,purpel)">
                                        <span></span>

                                        <input  class="input-size" type="text"  name="size" placeholder=" Sizes (eg: XL,XXL,M,5*6 etc..)">
                                        <span></span>

                                        <input type="text"  name="tags" placeholder=" Tags for the product to power search(eg: kids,shirts,Pink,girls)">
                                        <span></span>

                                        <label>Select product image</label>
                                        <input type="file"  name="image">
                                        <span></span>
                                    </div>

                                    <div class="col-sm-7 form-two form-one order-message">
                                        <p>Shipping Notes</p>
                                        <textarea name="description"  placeholder="Product Description... Please Provide attractive description to attract buyers to your product."
                                                  ></textarea>
                                        <span></span>
                                        <input type="submit" value="Confirm" class="btn btn-outline-primary submit-button">
                                        <input type="reset" value="Cancel" class="btn btn-outline-danger margin">
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </section>

@endsection