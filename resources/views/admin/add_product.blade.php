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
            <a href="#">Add Product</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{route('addProduct')}}" enctype="multipart/form-data">
                    @include('messages')
                    {{csrf_field()}}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Name</label>
                            <div class="controls">
                                <input type="text" name="product_name" class="span6 typeahead"
                                       placeholder="Product Name" value="{{old('product_name')}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name="category">
                                    <option value="" selected>Select Category</option>
                                    @foreach($publishedCategories as $category)
                                        <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand</label>
                            <div class="controls">
                                <select id="selectError3" name="brand">
                                    <option value="" selected>Select Brand</option>
                                    @foreach($publishedBrands as $brand)
                                        <option value="{{$brand->id}}">{{ucfirst($brand->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description"
                                          placeholder="Description" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price</label>
                            <div class="controls">
                                <input type="text" name="product_price" class="span6 typeahead"
                                       placeholder="Product Price" value="{{old('product_price')}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Currency</label>
                            <div class="controls">
                                <select id="selectError3" name="currency">
                                    <option value="" selected>Select Currency--</option>
                                    <option value="dollar" > Dollar </option>
                                    <option value="euro" > Euro </option>
                                    <option value="yen" > Yen </option>
                                    <option value="frank" >Frank</option>
                                    <option value="sterling " >Sterling </option>
                                    <option value="rupess">Rupees </option>
                                    <option value="EGB">EGB </option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Status</label>
                            <div class="controls">
                                <select id="selectError3" name="status">
                                    <option>Select Status--</option>
                                    <option value="New" > New </option>
                                    <option value="Old" > Old </option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Quantity</label>
                            <div class="controls">
                                <input type="number" min="1" max="1000" name="quantity">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Size</label>
                            <div class="controls">
                                <input type="text" name="product_size" class="span6 typeahead"
                                       placeholder="Product size" value="{{old('product_size')}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Color</label>
                            <div class="controls">
                                <input type="text" name="product_color" class="span6 typeahead"
                                       placeholder="Product Color" value="{{old('product_color')}}">
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
                            <label class="control-label" for="fileInput">Product Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    </div><!--/span-->

    </div><!--/row-->

@endsection