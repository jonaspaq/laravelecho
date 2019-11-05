@extends('layouts.app')

@section('content')
<div class="container">
    <Chat-Box :authuser="{{ Auth::user() }}" />
</div>
@endsection
