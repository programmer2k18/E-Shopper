@extends('admin_layout')
@section('admin_content')



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Products</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{route('allProducts')}}">All Products</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Name </th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Color(s)</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @include('messages')
                    <tbody>

                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ucfirst($product->name)}}</td>
                                <td><img src="{{asset('storage/'.$product->image)}}" style="width: 80px;height: 80px"></td>
                                <td class="center">{{$product->created_at}}</td>
                                <td class="center">{{$product->description}}</td>
                                <td class="center">{{$product->price}}</td>
                                <td class="center">{{$product->currency}}</td>
                                <td class="center">{{$product->quantity}}</td>
                                <td class="center">{{$product->status}}</td>
                                <td class="center">{{$product->color}}</td>
                                <td class="center">{{$product->size}}</td>
                                <td class="center">
                                        <span class="label label-success">
                                            {{ $product->publication_status === 1 ? "Approved":"Pending"}}
                                        </span>
                                </td>

                                <td class="center">

                                    @if($product->publication_status === 1)
                                        <a class="btn btn-danger" href="{{route('modifyProduct',['id'=>$product->id,'value'=>0,'message'=>'Pending'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-down"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success" href="{{route('modifyProduct',['id'=>$product->id,'value'=>1,'message'=>'Activated'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-up"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-info" href="{{route('showEditProductForm',$product->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" id="delete" href="{{route('deleteProduct',$product->id)}}">
                                        <i class="halflings-icon white trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection