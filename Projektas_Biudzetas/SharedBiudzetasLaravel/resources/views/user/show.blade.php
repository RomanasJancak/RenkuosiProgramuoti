@extends('layouts.app')
@section('content')
<div class="container">

    @can('user-view')
    <div>
        <h6><a href="{{route('user.index')}}">Back </a></h6>
        {{ Breadcrumbs::render() }}
    </div>
    @endcan    
    <table class="table table-striped caption-top">
        <caption>Vartotojas</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email verified at</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Budgets count</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->email_verified_at}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>{{$user->budgets->count()}}</td>
            <td><a href="{{route('user.edit',[$user])}}">Edit</a></td>
            <td><a href="{{route('user.destroy',[$user])}}">Delete account</a></td>
        </tr>
    </table>
    @include('budget.index', ['budgets' => $user->budgets])
</div>
@endsection
@section('side')
<div>
    ŠIT
</div>
@endsection