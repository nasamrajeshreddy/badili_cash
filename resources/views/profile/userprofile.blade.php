@extends('layouts.app')
@section('title', 'User Profile')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #c8f0f1, #a5e3ff);
    
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
}

/* Profile Card */
.profile-card {
    background: #3e9b9bff;
    width: 500px;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    overflow: hidden;
    position: relative;
    padding: 2rem;
    margin-left:27%;
    transition: all 0.3s ease-in-out;
}
.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Avatar */
.profile-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid #fff;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    object-fit: cover;
}

/* Header Section */
.profile-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

/* Name & Email */
.profile-name {
    font-weight: 700;
    font-size: 1.3rem;
    color: #ededeeff;
}
.profile-email {
    font-size: 0.85rem;
    color: #dde0e6ff;
}

/* Info Section */
.profile-info {
    margin-top: 1rem;
}
.profile-info p {
    color: #f5f6f8ff;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}
.profile-label {
    font-weight: 600;
    color: #dfe2e7ff;
}

/* Logout Button */
.logout-btn {
    display: inline-block;
    margin-top: 1rem;
    background: linear-gradient(90deg, #16a34a, #0284c7);
    color: white;
    font-weight: 600;
    border: none;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
}
.logout-btn:hover {
    opacity: 0.9;
}
</style>

<div class="profile-card">
    <!-- Header -->
    <div class="profile-header">
        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
             alt="Profile" class="profile-avatar">
        <div>
            <h2 class="profile-name">{{ Auth::user()->name }}</h2>
            <p class="profile-email">{{ Auth::user()->email }}</p>
            <p class="text-gray-500 text-sm">Joined on {{ Auth::user()->created_at->format('d M, Y') }}</p>
        </div>
    </div>

    <!-- User Info -->
    <div class="profile-info">
        <p><span class="profile-label">Full Name:</span> {{ Auth::user()->name }}</p>
        <p><span class="profile-label">Email:</span> {{ Auth::user()->email }}</p>
        <p><span class="profile-label">Phone:</span> {{ Auth::user()->phone ?? 'Not Provided' }}</p>
        <p><span class="profile-label">Address:</span> {{ Auth::user()->address ?? 'Not Provided' }}</p>
    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>
@endsection
