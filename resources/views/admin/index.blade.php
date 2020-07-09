@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<h2>Admin</h2>
@if(Session::has('info'))
<br>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">{{ Session::get('info') }}</p>
    </div>
</div>
@endif
@include('partials.errors')
<br>
<h2>Add New Note</h2>
<form action="{{ route('createnote') }}" method="post">
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="content" placeholder="Content">
    {{ csrf_field() }}
    <button type="submit">Submit</button>
</form>
<h2>Notes</h2>
<br/>
<ul>
    @foreach($notes as $note) 
    <li>
        <strong>{{ $note->title }}</strong><br>
        {{ $note->content }}<br>
        {{ $note->created_at->diffForHumans() }}
        <br>
        <a href="{{ route('singlenote', ['id' => $note->id]) }}">View Note</a>
    </li>
    @endforeach
</ul>
@endsection