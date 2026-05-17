@extends('layouts.admin')
@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <h1 class="text-2xl md:text-3xl font-semibold text-[#DEB8FF]">Manage Competitions</h1>
    <x-button onclick="window.location.href='/admin/competitions/create'">
        <x-bx-plus class="w-6 h-6"/>    
        New Competition
    </x-button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 md:gap-11">
    <x-stat-card
        title="Active Now"
        :value="$openCompetitions"
        growth=""
    >
        <x-bx-pulse class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Total Competitions"
        :value="$totalCompetitions"
        growth="+8.5% from last month"
    >
        <x-bx-bullseye class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Up Coming"
        :value="$upcomingCompetitions"
        growth=""
    >
        <x-bx-calendar-event class="w-10 h-10"/>
    </x-stat-card>
</div>

<div>
    <x-table>
        <form id="filter-form" method="GET">
            <div class="flex justify-end items-center gap-4 mb-6">
                <x-dropdown-filter
                    name="category"
                    placeholder="All Categories"
                    :options="$categories->pluck('name', 'id')"
                    :selected="request('category')"
                    data-filter="true"
                />
                <x-dropdown-filter
                    name="status"
                    placeholder="All Status"
                    :options="[
                        'All' => 'All',
                        'Upcoming' => 'Upcoming',
                        'Active' => 'Active',
                        'Closed' => 'Closed'
                    ]"
                    :selected="request('status')"
                    data-filter="true"
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
                    {{ $competition->title }}
                </td>
                <td class="py-4">
                    <x-badge>{{ $competition->category->name }}</x-badge>
                </td>
                <td class="py-4">
                    {{ $competition->formatted_deadline }}
                </td>
                <td class="py-4">
                    @php $status = $competition->status; @endphp

                    <span class="
                        px-3 py-1 rounded-full text-xs font-medium
                        {{ $status === 'Active' ? 'text-[#C0FFC6]' : '' }}
                        {{ $status === 'Upcoming' ? 'text-[#D3E5FF]' : '' }}
                        {{ $status === 'Closed' ? 'text-[#FFA5A7]' : '' }}
                    ">
                        {{ $status }}
                    </span>
                </td>
                <td class="py-4 flex items-center">
                    <a href="/admin/competitions/{{ $competition['id'] }}/edit" class="text-[#DEB8FF]">
                        <x-bx-pencil class="w-6 h-6"/>
                    </a>
                    <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" onsubmit="return confirm('Delete this competition?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="ml-4 text-[#DEB8FF]">
                            <x-bx-trash class="w-6 h-6"/>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    <x-pagination :data="$competitions" />
</div>

@endsection