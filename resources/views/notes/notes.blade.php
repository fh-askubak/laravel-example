@extends('layouts.master')

@section('title', 'Notes')

@section('content')
<h2>Notes</h2>
<br/>
<div class="notelist">
    <h2>Notes</h2>
    <br/>
    <div class="row">
        @foreach($notes as $note) 
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('singlenote', ['id' => $note->id]) }}" class="notecard">
            <div class="note card">
                <div class="card-header">
                    {{ $note->created_at->diffForHumans() }}
                </div>
                <div class="card-body">
                    <h2 class="card-title">
                        <strong>{{ $note->title }}</strong>
                    </h2>
                    <p class="card-body">{{ $note->content }}</p> 
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection