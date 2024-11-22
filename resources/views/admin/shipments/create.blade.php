
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create City</title>

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
            <h3 class="text-center mb-4">Send Shipments</h3>
          <form id="classicForm" action="{{route('shipments.store')}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label"> Client Name</label>
              <input type="text" class="form-control" id="name"  name="name"placeholder="Enter the Amount" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label"> Phone Number 1</label>
              <input type="tel" class="form-control" id="name"  name="phone"placeholder="Enter the Amount" required>
            </div>
            <div class="mb-3">
              <label for="phone2" class="form-label"> Phone Number 2</label>
              <input type="tel" class="form-control" id="Phone Number"  name="phone2"placeholder="Enter the Amount" required>
            </div>



            <button type="submit" class="btn btn-primary btn-submit w-100">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection




