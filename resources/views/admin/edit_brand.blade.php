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
            <a href="#">Update Brand</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Brand</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form class="form-horizontal" method="post" action="{{route('editBrand',$brand->id)}}">

                    @include('messages')
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Brand Name</label>
                            <div class="controls">
                                <input type="text" name="brand_name" class="span6 typeahead"
                                       placeholder="Brand Name" value="{{$brand->name}}">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description"
                                          placeholder="Description" id="textarea2" rows="3">
                                    {{$brand->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    </div><!--/span-->

    </div><!--/row-->

@endsection