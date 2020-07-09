@extends('layouts.master')

@section('title', $note->title)

@section('content')
<div class="row singlenote">
    <div class="col-4">
        <h3>{{ $note->title }}</h3>
        <p>{{ $note->content }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
    </div>
</div>
@endsection