@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Control Structures</h2>    
        @if(true)
            <p>Displayed if true</p>
        @else
            <p>False</p>
        @endif
        <hr/>
        @for($i = 0; $i < 5; $i++)
            <p>{{ $i + 1 }}. Iteration</p>
        @endfor
    </div>
</div>
@endsection