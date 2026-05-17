@extends('layouts.admin')

@section('content')

<form method="POST" action="{{ route('competitions.update', $competition->id) }}">
    @csrf
    @method('PUT')

    <div class="flex justify-between mb-12">
        <h1 class="text-3xl font-semibold text-[#DEB8FF]">Edit Competition</h1>

        <x-button type="submit">
            Update Competition
        </x-button>
    </div>

    @include(
        'admin.competitions.form',
        [
            'competition' => $competition
        ]
    )
</form>

@endsection