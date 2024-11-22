
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Transcation</title>

  <style>
    /* Input focus effect */
    .form-control:focus {
      border-color: #0056b3;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    /* Subtle form container animation */
    .form-container {
      animation: fadeIn 1s ease-out;
    }

    /* Fade-in effect for the form */
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    /* Smooth transition for the submit button */
    .btn-submit {
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #004085;
      transform: translateY(-2px);
    }

    /* Input validation feedback */
    .invalid-feedback {
      display: none;
    }

    .form-control.is-invalid ~ .invalid-feedback {
      display: block;
    }

    .form-container {
      margin-top: 50px;
    }
  </style>
</head>
@extends('layouts.app')
@section('content')

<div class="container form-container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="text-center mb-4">Send Transaction</h3>
          <form id="classicForm" action="{{route('moneny.store')}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="cash" class="form-label"> Amount</label>
              <input type="text" class="form-control" id="name"  name="cash"placeholder="Enter the Amount" required>
            </div>

            <div class="mb-3">
                <select name="owner_id" id="role" class="form-control form-select">
                    <option value="0" selected disabled>select user</option>
                    @foreach ($users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>

                    @endforeach
                </select>
              </div>

            <button type="submit" class="btn btn-primary btn-submit w-100">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
