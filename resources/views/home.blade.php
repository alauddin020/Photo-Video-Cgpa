@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{route('newData')}}" class="list-group-item list-group-item-action">Add New Data</a>
                <a href="{{route('result')}}" class="list-group-item list-group-item-action">Result</a>
                <a href="{{route('home')}}" class="list-group-item list-group-item-action disabled">Dashboard</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>CSE-101</th>
                                <th>CSE-102</th>
                                <th>Math</th>
                                <th>ENG</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$a->user->name}}</td>
                                <td>{{$a->CSE101}}</td>
                                <td>{{$a->CSE102}}</td>
                                <td>{{$a->Math}}</td>
                                <td>{{$a->ENG}}</td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
