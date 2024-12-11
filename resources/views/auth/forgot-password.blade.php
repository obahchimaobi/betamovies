@extends('components.layouts.app')

@section('title')
    Reset Password | {{ config('app.name') }}
@endsection

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <livewire:forgot-password />
        </div>
    </div>
@endsection
