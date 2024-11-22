<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

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
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
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

        .form-control.is-invalid~.invalid-feedback {
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
                            <h3 class="text-center mb-4">Edit User</h3>
                            <form id="classicForm" action="{{ route('users.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value = "{{ $data->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value = "{{ $data->email }}"required>
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="email" name="email"
                                        value = "{{ $data->details->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="email" name="email"
                                        value = "{{ $data->details->age }}">
                                </div>




                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>

                                    <select name="role" id="role" class="form-control form-select">

                                        <option value="0" disabled>select Role</option>
                                        @foreach ($roles as $role)


                                        <option value="{{ $role->id }}" >{{ $role->name }}</option>



                                        @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary btn-submit w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
