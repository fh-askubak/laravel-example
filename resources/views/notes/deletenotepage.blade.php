@extends('layouts.admin')

@section('content')
<div class="row" style="text-align: center;">
    <div class="col">
        <h2>Confirm Delete Note</h2>
        <form action="{{ route('deletenote', ['id'=>$note->id]) }}" method="post">
            <p>{{ $note->title }} | {{ $note->content }}</p>
            <button type="submit" class="btn btn-danger">Delete</button>
            {{ method_field('post') }}
            {{ csrf_field() }}
        </form>
        <a href="{{ route('adminpage') }}" class="btn btn-primary">Cancel</a>
    </div>
</div>
@endsection