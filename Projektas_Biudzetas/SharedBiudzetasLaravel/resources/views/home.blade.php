@extends('layouts.app')

@section('content')
@include('user.show', ['user' => auth()->user()])
@endsection
