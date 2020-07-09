@extends('layouts.master')

@section('title', $note->title)

@section('content')
<div class="row align-content-center">
    <div class="col-12">
        <h3>{{ $note->title }}</h3>
        <p>{{ $note->content }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
    </div>
</div>
@endsection