<?php
/* @var $category */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ html()->form('POST', route('category.store'))->open() }}

                        {{ html()->label('Name') }}
                        {{html()->div()->class('input-group')->open()}}
                        {{ html()->input()->name('name')->class('form-control input-group-prepend') }}
                        {{html()->div()->close()}}
                        {{ html()->submit('Sumbit')->class('mt-3 btn btn-success input-group-append') }}

                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
