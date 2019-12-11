@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home">

                    </i> Home</a> <a href="#">Products</a> <a href="#" class="current">Edit Product</a></div>
            <h1>Products</h1>
            @if(Session::has('flash_maessage_error'))
                <div class="alert alert-success alert-danger">
                    <strong> {{  Session('flash_maessage_error') }}</strong>

                </div>


            @endif
            @if(Session::has('flash_maessage_success'))
                <div class="alert alert-success alert-success">
                    <strong> {{  Session('flash_maessage_success') }}</strong>

                </div>


            @endif

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">

                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add validation</h5>
                        </div>
                        <div class="widget-content nopadding">


                            <form enctype="multipart/form-data" class="form-horizontal"
                                  method="post" action="{{ url('/admin/edit-product/'.$productDetails->id)}}"
                                  name="edit_product" id="edit_product" novalidate="novalidate">
                                @csrf

                                <div class="control-group">
                                    <label class="control-label">Under Category</label>
                                    <div class="controls">
                                        <select class="" id="category_id" name="category_id" style="width:220px;">
                                            <?php echo $categories_dropdown; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <div class="controls">
                                        <input type="text" value="{{$productDetails->product_name}}" name="product_name"
                                               id="product_name">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product code</label>
                                    <div class="controls">
                                        <input type="text" value="{{$productDetails->product_code}}" name="product_code"
                                               id="product_code">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color</label>
                                    <div class="controls">
                                        <input type="text" value="{{$productDetails->product_color}}"
                                               name="product_color" id="product_color">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description"
                                                  id="description">{{ $productDetails->description }}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">price</label>
                                    <div class="controls">
                                        <input type="text" value="{{$productDetails->price}}" name="price" id="price">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" class="uploader" name="image" id="image">
                                        <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                                        @if(!empty($productDetails->image))
                                            <img width="50px"
                                                 src="{{asset('/images/backend_images/products/small/'.$productDetails->image  )}}">
                                            |
                                            <a id="delProduct"
                                               href="{{URL('/admin/delete-product-image/'.$productDetails->id)}}">Delete</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
