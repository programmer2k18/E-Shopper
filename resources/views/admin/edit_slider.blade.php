@extends('admin_layout')
@section('admin_content')


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{route('dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Edit Slider</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Slider</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{route('editSlider',$slider->id)}}" enctype="multipart/form-data">
                    @include('messages')
                    @method('PUT')
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Slider Heading</label>
                            <div class="controls">
                                <input type="text" name="slider_heading" class="span6 typeahead"
                                       placeholder="Slider heading" value="{{$slider->heading}}">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description"
                                          placeholder="Description" id="textarea2" rows="3">
                                    {{htmlspecialchars_decode($slider->description)}}
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1" class="span6 typeahead"
                                >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Slider Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="slider_image" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Slider</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    </div><!--/span-->

    </div><!--/row-->

@endsection