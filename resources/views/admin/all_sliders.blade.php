@extends('admin_layout')
@section('admin_content')



    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="#">Sliders</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{route('allSliders')}}">All Sliders</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Sliders</h2>
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
                        <th>Heading </th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @include('messages')
                    <tbody>

                    @if(count($sliders) > 0)
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ucfirst($slider->heading)}}</td>
                                <td><img src="{{asset('storage/'.$slider->image)}}" style="width: 140px;height: 140px"></td>
                                <td class="center">{{$slider->created_at}}</td>
                                <td class="center">{{html_entity_decode($slider->description)}}</td>
                                <td class="center">
                                        <span class="label label-success">
                                            {{ $slider->publication_status === 1 ? "Approved":"Pending"}}
                                        </span>
                                </td>

                                <td class="center">

                                    @if($slider->publication_status === 1)
                                        <a class="btn btn-danger" href="{{route('modifySlider',['id'=>$slider->id,'value'=>0,'message'=>'Pending'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-down"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success" href="{{route('modifySlider',['id'=>$slider->id,'value'=>1,'message'=>'Activated'])}}">
                                            <i class="halflings-icon white zoom-in thumbs-up"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-info" href="{{route('showEditSliderForm',$slider->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" id="delete" href="{{route('deleteSlider',$slider->id)}}">
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