@extends('admin_layout')
@section('admin_content')



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Category</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{route('allCategories')}}">All Categories</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
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
                            <th>Category Name </th>
                            <th>Created At</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        @include('messages')
                    <tbody>

                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ucfirst($category->name)}}</td>
                                    <td class="center">{{$category->created_at}}</td>
                                    <td class="center">{{$category->description}}</td>

                                    <td class="center">
                                        <span class="label label-success">
                                            {{ $category->publication_status === 1 ? "Approved":"Pending"}}
                                        </span>
                                    </td>

                                    <td class="center">

                                        @if($category->publication_status === 1)
                                            <a class="btn btn-danger" href="{{route('modifyCategory',['id'=>$category->id,'value'=>0,'message'=>'Pending'])}}">
                                                <i class="halflings-icon white zoom-in thumbs-down"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-success" href="{{route('modifyCategory',['id'=>$category->id,'value'=>1,'message'=>'Activated'])}}">
                                                <i class="halflings-icon white zoom-in thumbs-up"></i>
                                            </a>
                                        @endif
                                            <a class="btn btn-info" href="{{route('showEditForm',$category->id)}}">
                                                <i class="halflings-icon white edit"></i>
                                            </a>
                                            <a class="btn btn-danger" id="delete" href="{{route('deleteCategory',$category->id)}}">
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