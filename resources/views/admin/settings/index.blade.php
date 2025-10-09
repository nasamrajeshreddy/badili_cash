@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">System Settings</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Payment Gateway Mode</label>
            <select name="gateway_mode" class="w-full p-2 rounded bg-gray-700 text-gray-200">
                <option value="sandbox" {{ ($settings['gateway_mode'] ?? '') == 'sandbox' ? 'selected' : '' }}>Sandbox</option>
                <option value="live" {{ ($settings['gateway_mode'] ?? '') == 'live' ? 'selected' : '' }}>Live</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gateway Secret Key</label>
            <input type="text" name="gateway_secret" class="w-full p-2 rounded bg-gray-700 text-gray-200"
                value="{{ $settings['gateway_secret'] ?? '' }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gateway App ID</label>
            <input type="text" name="gateway_app_id" class="w-full p-2 rounded bg-gray-700 text-gray-200"
                value="{{ $settings['gateway_app_id'] ?? '' }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Webhook URL</label>
            <input type="text" name="webhook_url" class="w-full p-2 rounded bg-gray-700 text-gray-200"
                value="{{ $settings['webhook_url'] ?? '' }}">
        </div>

        <div>
            <button type="submit" class="bg-yellow-400 text-black px-4 py-2 rounded">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
