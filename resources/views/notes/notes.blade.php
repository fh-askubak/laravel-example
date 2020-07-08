@extends('layouts.master')

@section('title', 'Notes')

@section('content')
<h2>Notes</h2>
<br/>
<ul>
    @foreach($notes as $note) 
    <li>
        <strong>{{ $note->title }}</strong><br>
        {{ $note->content }}<br>
        {{ $note->created_at->diffForHumans() }}
    </li>
    @endforeach
</ul>
@endsection