@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('View') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-bordered grid-view-tbl">
                            <tr>
                                <td>{{__('Id')}}</td>
                                <td>{{__('Name')}}</td>
                                <td>{{__('Created at')}}</td>
                                <td>{{__('Updated at')}}</td>
                            </tr>
                            <tbody>
                               <tr>
                                    <td>{{$category['id']}}</td>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['created_at']}}</td>
                                    <td>{{$category['updated_at']}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="mt-4">
                            <a href="{{route('category.index')}}" class="btn btn-success">{{__('Index page')}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
