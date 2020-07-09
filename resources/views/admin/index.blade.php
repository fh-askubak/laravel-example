@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<h2>Admin</h2>
@include('partials.sessionalerts')
@include('partials.errors')
<br>
<h2>Add New Note</h2>
<form action="{{ route('createnote') }}" method="post">
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="content" placeholder="Content">
    {{ csrf_field() }}
    <button type="submit">Submit</button>
</form>
<div class="notelist">
    <h2>Notes</h2>
    <br/>
    <div class="row">
        @foreach($notes as $note) 
        <div class="col-md-6 col-lg-4">
            <div class="note card">
                <div class="card-header">
                    {{ $note->created_at->diffForHumans() }}
                </div>
                <div class="card-body">
                    <h2 class="card-title"><strong>{{ $note->title }}</strong></h2>
                    <p class="card-body">{{ $note->content }}</p>
                    <br>
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('singlenote', ['id' => $note->id]) }}"class="btn btn-dark">View Note</a>
                        <a href="{{ route('editnotepage', ['id' => $note->id]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('deletenotepage', ['id' => $note->id]) }}" class="btn btn-danger">Delete</a>
                    </div> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
</div>