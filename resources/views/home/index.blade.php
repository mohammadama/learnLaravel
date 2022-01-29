@extends('layouts.app')

@section('title','Home page')

@section('content')
<h1>heloo world</h1>
<div>
    @for ($i = 0 ; $i < 10 ; $i++)
        <div>the number of i {{ $i }}</div>
    @endfor
</div>
@endsection