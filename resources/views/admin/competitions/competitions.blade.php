@extends('layouts.admin')
@section('content')

<div class="flex justify-between">
    <h1 class="text-3xl font-semibold text-[#DEB8FF]">Manage Competitions</h1>
    <x-button href="{{ route('competitions.create') }}">
        <x-bx-plus class="w-6 h-6"/>    
        New Competition
    </x-button>
</div>

<div class="flex gap-11">
    <x-stat-card
        title="Active Now"
        value="12"
        growth=""
    >
        <x-bx-pulse class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Total Competitions"
        value="12"
        growth="+8.5% from last month"
    >
        <x-bx-bullseye class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Up Coming"
        value="12"
        growth=""
    >
        <x-bx-calendar-event class="w-10 h-10"/>
    </x-stat-card>
</div>

<div>
    <x-table>
        <form method="GET">
            <div class="flex justify-end items-center gap-4 mb-6">
                <x-dropdown-filter
                    name="category"
                    placeholder="All Categories"
                    :options="$categories"
                    :selected="request('category')"
                />
                <x-dropdown-filter
                    name="status"
                    placeholder="All Status"
                    :options="[
                        'All',
                        'Active',
                        'Closed'
                    ]"
                    :selected="request('status')"
                />
            </div>
        </form>
        <thead>
            <tr class="text-left text-sm text-[#D9D9D9] border-b border-white/10">
                <th class="pb-3">Title</th>
                <th class="pb-3">Category</th>
                <th class="pb-3">Deadline</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
            <tr class="border-b border-white/10">
                <td class="py-4">
                    {{ $competition['title'] }}
                </td>
                <td class="py-4">
                    <x-badge>{{ $competition['category'] }}</x-badge>
                </td>
                <td class="py-4">
                    {{ \Carbon\Carbon::parse($competition['deadline'])->format('M d, Y') }}
                </td>
                <td class="py-4">
                    @php
                        $isClosed =
                            now()->gt($competition['deadline']);
                    @endphp
                    <span class="
                        {{ $isClosed
                            ? 'text-[#FFA5A7]'
                            : 'text-[#C0FFC6]'
                        }}
                    ">
                        {{ $isClosed ? 'Closed' : 'Active' }}
                    </span>
                </td>
                <td class="py-4 flex items-center">
                    <a href="/admin/competitions/{{ $competition['id'] }}/edit" class="text-[#DEB8FF]">
                        <x-bx-pencil class="w-6 h-6"/>
                    </a>
                    <a href="" class="ml-4 text-[#DEB8FF]">
                        <x-bx-trash class="w-6 h-6"/>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    <x-pagination :data="$competitions" />
</div>

@endsection