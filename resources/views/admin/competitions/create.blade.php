@extends('layouts.admin')

@section('content')

<form action="{{ route('competitions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="flex justify-between mb-12">
        <h1 class="text-3xl font-semibold text-[#DEB8FF]">New Competitions</h1>

        <x-button type="submit">
            Publish
        </x-button>
    </div>

    @include('admin.competitions.form')
</form>

@endsection