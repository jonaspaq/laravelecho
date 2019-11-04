@extends('layouts.app')

@section('content')
<div class="container">
    <Chat-Box :userid="{{ Auth::id() }}" />
</div>
@endsection
