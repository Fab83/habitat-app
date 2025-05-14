@extends('layouts.app')

@section('content')
    <h1>Modifier le programme</h1>
    <form action="{{ route('programmes.update', $programme) }}" method="POST">
        @method('PUT')
        @include('programmes.form')
    </form>
@endsection
