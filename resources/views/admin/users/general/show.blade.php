
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile - Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .profile-card {
      max-width: 100%;
      border: 1px solid #ddd;
      border-radius: 15px;
      padding: 25px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin: auto;
    }
    .profile-card img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
      object-fit: cover;
    }
    .social-icons i {
      margin: 0 10px;
      font-size: 1.5rem;
      color: #555;
    }
    .social-icons i:hover {
      color: #007bff;
    }
    @media (max-width: 767px) {
      .profile-card {
        max-width: 90%;
        padding: 20px;
      }
      .profile-card img {
        width: 130px;
        height: 130px;
      }
    }
  </style>
</head>

    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
          <h2 class="text-center">User Profile</h2>
          <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-6">
              <div class="profile-card">
                <img src='{{asset("assets/images/".$user->details->Fimage)}}' alt="Profile Image">
                <h3 class="mt-3">{{$user->name}}</h3>
                <p class="text-muted">{{$user->role->name}}</p>
                <p>Building awesome websites and applications.</p>
                <div class="social-icons mt-3">
                  <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

  @endsection

