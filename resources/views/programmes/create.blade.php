@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">
    <h1>Créer un programme</h1>
    <form action="{{ route('programmes.store') }}" method="POST">
        @include('programmes.form')
    </form>
</div>
@endsection