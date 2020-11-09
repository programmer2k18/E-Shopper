@extends('admin_layout')
@section('admin_content')



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Brand</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{route('allCategories')}}">All Brands</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Brands</h2>
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
                        <th>Brand Name </th>
                        <th>Created At</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @include('messages')
                    <tbody>

                    @if(count($brands) > 0)
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ucfirst($brand->name)}}</td>
                                <td class="center">{{$brand->created_at}}</td>
                                <td class="center">{{$brand->description}}</td>

                                <td class="center">
                                        <span class="label label-success">
                                            {{ $brand->publication_status === 1 ? "Approved":"Pending"}}
                                        </span>
                                </td>

                                <td class="center">

                                    @if($brand->publication_status === 1)
                                        <a class="btn btn-danger" href="{{route('modifyBrand',['id'=>$brand->id,'value'=>0,'message'=>'Pending'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-down"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success" href="{{route('modifyBrand',['id'=>$brand->id,'value'=>1,'message'=>'Activated'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-up"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-info" href="{{route('showEditBrandForm',$brand->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" id="delete" href="{{route('deleteBrand',$brand->id)}}">
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