@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
/* style　>　profiles-show.css */
    <title>Profile</title>

</head>

<body>

    <div class="profile-container">
        <div class="profile-side">
            <div class="column">
                <i class="fa-solid fa-user text-dark"></i>
                <img 
                    src="profile-photo.jpg" 
                    alt="John Adam Smith" 
                    class="profile-image">
                <h1
                    class="profile-name">
                    John Adam Smith
                </h1>
                <p class="profile-bio">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!-- Add more profile information here -->
            </div>
        </div>
            <div class="profile-my-posts">
                <i class="fa-solid fa-user text-dark"></i>
                <img 
                    src="profile-photo.jpg" 
                    alt="John Adam Smith" 
                    class="profile-image">
                <h1
                    class="profile-name">
                    John Adam Smith
                </h1>
                <p class="profile-bio">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!-- Add more profile information here -->
            </div>
    </div>
</body>
</html>
@endsection