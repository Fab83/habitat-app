@extends('layouts.app')

@section('content')
    <h1>Créer un programme</h1>
    <form action="{{ route('programmes.store') }}" method="POST">
        @include('programmes.form')
    </form>
@endsection
