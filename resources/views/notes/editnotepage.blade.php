@extends('layouts.admin')

@section('title', $note->title)

@section('content')
<h2>Update Note</h2>
<form method="post" action="{{ route('updatenote', ['id'=> $note->id]) }}">
    <input type="text" placeholder="{{ $note->title }}" name="title">
    <input type="text" placeholder="{{ $note->content }}" name="content">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <button type="submit" class="btn-primary">Update</button>
</form>
<a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
@endsection