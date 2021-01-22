<?php
/* @var $category */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Category</a>
                        </li>
                    </ul>
                    <div class="card-header">{{ __('Edit') . ' #' . $category->id}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ html()->modelForm($category, 'PATCH', route('category.update', ['category' => $category->id]))->open() }}

                            {{ html()->label('Name') }}
                            {{html()->div()->class('input-group')->open()}}
                                {{ html()->input()->name('name')->value($category->name)->class('form-control') }}
                            {{html()->div()->close()}}
                            {{ html()->submit('Sumbit')->class('mt-3 btn btn-success') }}
                            {{ html()->a(route('category.index'), 'List')->class('mt-3 btn btn-primary') }}

                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
