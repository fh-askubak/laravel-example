@extends('layouts.master')

@section('title', $note->title)

@section('content')
    <h3>{{ $note->title }}</h3>
    <p>{{ $note->content }}</p>
    
@endsection