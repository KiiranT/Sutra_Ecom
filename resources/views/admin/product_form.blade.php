@extends('layouts.admin')

@section('title', 'Product Add | Admin Dashboard | Munal Store')

@section('form_style')
    <style>

    </style>
@endsection
@section('scripts')
    <script>
        if (window.$('#is_parent').is(':checked')) {
            window.$('#parent_div').hide();
        }
        window.$('#is_parent').change(function() {
            window.$('#parent_div').slideToggle();
        })
    </script>
@endsection

@section('main-content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Product {{ isset($product_list) ? 'Update' : 'Add' }}</div>
                    </div>
                    <div class="ibox-body">
                        @if (isset($product_list))
                            {{ Form::open(['url' => route('product.update', $product_list->id), 'class' => 'form form-container', 'files' => true]) }}
                            @method('put')
                        @else
                            {{ Form::open(['url' => route('product.store'), 'class' => 'form form-container', 'files' => true]) }}
                        @endif
                        <div class="form-group row mb-4">
                            {{ Form::label('title', 'Title:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::text('title', @$product_list->title, ['class' => 'form-control form-control-sm', 'id' => 'title', 'required' => true, 'placeholder' => 'Enter product title ']) }}
                                @error('title')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('summary', 'Summary:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::textarea('summary', @$product_list->summary, ['class' => 'form-control form-control-sm', 'id' => 'summary', 'placeholder' => 'Enter product summary ', 'rows' => '5', 'style' => 'resize : none']) }}
                                @error('summary')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('description', 'Description:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::textarea('description', @$product_list->description, ['class' => 'form-control form-control-sm', 'id' => 'description', 'placeholder' => 'Enter product description ', 'rows' => '5', 'style' => 'resize : none']) }}
                                @error('description')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('cat_id', 'Category:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('cat_id', $categories->pluck('title', 'id'), @$product_list->cat_id, ['class' => 'form-control form-control-sm', 'id' => 'cat_id', 'required' => true, 'placeholder' => 'Select Category']) }}
                                @error('cat_id')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('sub_cat_id', 'Sub Category:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('sub_cat_id', $sub_categories->pluck('title', 'id'), @$product_list->sub_cat_id, ['class' => 'form-control form-control-sm', 'id' => 'sub_cat_id', 'placeholder' => 'Select Sub Category']) }}
                                @error('sub_cat_id')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('stock', 'Stock:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::number('stock', @$product_list->stock, ['class' => 'form-control form-control-sm', 'id' => 'stock', 'required' => true, 'placeholder' => 'Enter product stock ']) }}
                                @error('stock')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('price', 'Price:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::number('price', @$product_list->price, ['class' => 'form-control form-control-sm', 'id' => 'price', 'required' => true, 'placeholder' => 'Enter product price ']) }}
                                @error('price')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('conditions', 'Condition:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('conditions', ['hot' => 'Hot', 'new' => 'New', 'sale' => 'Sale', 'for_you' => 'For You'], @$product_list->conditions, ['class' => 'form-control form-control-sm', 'id' => 'conditions', 'required' => true, 'placeholder' => 'Select Condition ']) }}
                                @error('conditions')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::select('status', ['active' => 'Published', 'inactive' => 'Unpublished'], @$product_list->status, ['class' => 'form-control form-control-sm', 'id' => 'status', 'required' => true]) }}
                                @error('status')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('image', 'Image:', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-5">
                                {{ Form::file('image', ['id' => 'status', 'required' => isset($product_list) ? false : true, 'accept' => 'image/*']) }}
                                @error('error')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <img src={{ asset('uploads/product/Thumb-' . @$product_list->image) }} alt=""
                                    class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            {{ Form::label('', '', ['class' => 'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{ Form::button('<i class = "fa fa-trash"></i> Reset', ['class' => 'btn btn-sm btn-danger', 'id' => 'reset', 'type' => 'reset']) }}
                                {{ Form::button('<i class = "fa fa-paper-plane"></i> Submit', ['class' => 'btn btn-sm btn-success', 'id' => 'submit', 'type' => 'submit']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
