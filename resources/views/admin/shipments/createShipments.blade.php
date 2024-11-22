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
@section('content')

    @extends('layouts.app')
@section('content')
    @php
        $data = Session::get('data');
    @endphp
    <div class="container form-container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Send Shipments</h3>
                        <h5 class="text-center mb-4">ShipDetails</h5>
                        <form id="classicForm" action="{{ route('shipments.createShipments') }}" method="post">
                            @csrf


                            <input type="hidden" name="customerValue" value="{{ $data }}">
                            <div class="mb-3">
                                <label for="size" class="form-label"> Size</label>
                                <input type="text" class="form-control" id="size"
                                    name="size"placeholder="Enter the size" required>
                            </div>

                            <div class="mb3">
                                <label for="details" class="form-label">Details</label>
                                <textarea name="details" id="details" class="form-control form-textarea" cols="30" rows="2">enter details of shipemnt</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="cost" class="form-control" id="numberOfShipment"
                                    name="cost"placeholder="Enter the cost" required>
                            </div>

                            <div class="mb-3">
                                <select name="type_id" id="role" class="form-control form-select">
                                    <option value="0" selected disabled>select type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input with radio button"
                                        disabled value="let user open the package?">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name ='letClientOpenit'
                                            value="true" aria-label="Radio button for following text input">
                                    </div>
                                </div>

                            </div>



                            <button type="submit" class="btn btn-primary btn-submit w-100">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
