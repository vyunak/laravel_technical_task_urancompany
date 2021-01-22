<?php
/* @var $product */
use App\Formatters\CategoryFormatter;
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}">Category</a>
                        </li>
                    </ul>
                    <div class="card-header">{{ __('Edit') . ' #' . $product->id}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ html()->modelForm($product, 'PATCH', route('product.update', ['product' => $product->id]))->open() }}

                            {{ html()->label('Name') }}
                            {{html()->div()->class('input-group m-1')->open()}}
                            {{ html()->input()->name('name')->class('form-control input-group-prepend '. ($errors->has('name') ? 'is-invalid' : '') )->value($product->name) }}
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            {{html()->div()->close()}}

                            {{ html()->label('Photo') }}
                            {{html()->div()->class('input-group m-1')->open()}}
                            {{ html()->input()->name('photo')->class('form-control input-group-prepend '. ($errors->has('photo') ? 'is-invalid' : '') )->value($product->photo) }}
                            @error('photo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            {{html()->div()->close()}}

                            {{ html()->label('Price') }}
                            {{html()->div()->class('input-group m-1')->open()}}
                            {{ html()->input('number')->name('price')->class('form-control input-group-prepend '. ($errors->has('price') ? 'is-invalid' : '') )->value($product->price) }}
                            @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            {{html()->div()->close()}}

                            {{ html()->label('Category') }}
                            {{html()->div()->class('input-group m-1')->open()}}
                            <?php

                            echo html()->select('category_id')->options(CategoryFormatter::getAll())->class('custom-select ' . ($errors->has('category_id') ? 'is-invalid' : ''))->value($product->category_id)
                            ?>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            {{html()->div()->close()}}

                            {{ html()->submit('Submit')->class('mt-3 btn btn-success') }}
                            {{ html()->a(route('product.index'), 'List')->class('mt-3 btn btn-primary') }}

                            {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
