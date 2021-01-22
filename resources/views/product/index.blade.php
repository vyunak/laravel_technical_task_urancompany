<?php
/* @var $records */
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
                    <div class="card-header">{{ __('Product list') }}</div>
                    <div class="card-body">
                        <p class="mb-4">
                            <a href="{{route('product.create')}}" class="btn btn-success">{{__('Add product')}}</a>
                        </p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-bordered grid-view-tbl">
                            <thead>
                            <tr>
                                <td>{{__('Id')}}</td>
                                <td>{{__('Name')}}</td>
                                <td>{{__('Photo')}}</td>
                                <td>{{__('Price')}}</td>
                                <td>{{__('Category')}}</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ( $records as $record )
                                <tr>
                                    <td>{{$record['id']}}</td>
                                    <td>{{$record['name']}}</td>
                                    <td>{{$record['photo']}}</td>
                                    <td>{{$record['price']}}</td>
                                    <td>{{\App\Formatters\CategoryFormatter::getNameById($record['category_id'])}}</td>
                                    <td class="d-flex">
                                        {{html()->a(route('product.show', ['product'=> $record['id']]), 'View')->class('btn btn-success m-1')}}
                                        {{html()->a(route('product.edit', ['product'=> $record['id']]), 'Edit')->class('btn btn-primary m-1')}}
                                        {{html()->form('DELETE', route('product.destroy', ['product'=> $record['id']]))->open()}}
                                        {{html()->submit('Delete')->class('btn btn-danger m-1')}}
                                        {{html()->form()->close()}}
                                    </td>
                                </tr>
                            @empty
                                <tr class="alert alert-warning"><td colspan="6">No records found.</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
