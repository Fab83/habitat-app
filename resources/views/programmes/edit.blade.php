@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">
    <h1>Modifier le programme</h1>
    <form action="{{ route('programmes.update', $programme) }}" method="POST">
        @method('PUT')
        @include('programmes.form')
    </form>
</div>
@endsection