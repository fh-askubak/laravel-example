@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<h2>Admin</h2>
<br>
<h2>Add New Note</h2>
<form action="/create">
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
        <a href="/note/{{ $note->id }}">View Note</a>
    </li>
    @endforeach
</ul>
@endsection