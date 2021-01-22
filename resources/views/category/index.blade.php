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
                            <a class="nav-link" href="{{route('product.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Category</a>
                        </li>
                    </ul>
                    <div class="card-header">{{ __('Category list') }}</div>
                    <div class="card-body">
                        <p class="mb-4">
                            <a href="{{route('category.create')}}" class="btn btn-success">{{__('Add category')}}</a>
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
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ( $records as $record )
                            <tr>
                                <td>{{$record['id']}}</td>
                                <td>{{$record['name']}}</td>
                                <td class="d-flex">
                                    {{html()->a(route('category.show', ['category'=> $record['id']]), 'View')->class('btn btn-success m-1')}}
                                    {{html()->a(route('category.edit', ['category'=> $record['id']]), 'Edit')->class('btn btn-primary m-1')}}
                                    {{html()->form('DELETE', route('category.destroy', ['category'=> $record['id']]))->open()}}
                                       {{html()->submit('Delete')->class('btn btn-danger m-1')}}
                                    {{html()->form()->close()}}
                                </td>
                            </tr>
                        @empty
                            <tr class="alert alert-warning"><td colspan="5">No records found.</td></tr>
                        @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
