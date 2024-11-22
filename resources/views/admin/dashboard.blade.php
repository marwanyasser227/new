
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
</head>


<style>
body {
    background-color: #f8f9fa; /* Light gray for a clean background */
    color: #212529; /* Standard dark text color */
}

.card {
    background-color: #ffffff; /* White card background */
    border: 1px solid #e0e0e0; /* Light gray border */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.card-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #495057; /* Medium dark for text headers */
}

.stats-number {
    font-size: 2rem;
    font-weight: bold;
    color: #0d6efd; /* Bootstrap primary blue for emphasis */
}

.animated-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.animated-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15); /* Slightly more pronounced shadow */
}

.chart-container {
    position: relative;
    height: 250px;
}

</style>
</head>
@extends('layouts.app')
@section('content')

<div class="container my-5">
    <!-- Statistics Cards -->
    <div class="row g-4">
        <!-- Users -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Users</h5>
                <p class="stats-number">{{count($users)}}</p>
                <small>+10% from last week</small>
            </div>
        </div>
        <!-- Shipments -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Shipments</h5>
                <p class="stats-number">{{count($shipments)}}</p>
                <small>+5% from last week</small>
            </div>
        </div>
        <!-- Pilots -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Pilots</h5>
                <p class="stats-number">{{count($filter_user['users'])}}</p>
                <small>-2% from last week</small>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Business -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Business</h5>
                <p class="stats-number">$1.23M</p>
                <small>+12% from last week</small>
            </div>
        </div>
        <!-- Hubs -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Hubs</h5>
                <p class="stats-number">{{count($hubs)}}</p>
                <small>No change</small>
            </div>
        </div>
        <!-- Transactions -->
        <div class="col-md-4">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Transactions</h5>
                <p class="stats-number">{{count($transactions)}}</p>
                <small>+15% from last week</small>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4 mt-5">
        <div class="col-md-6">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Users Growth</h5>
                <div class="chart-container">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 animated-card">
                <h5 class="card-title">Revenue & Transactions</h5>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Initialization -->
<script>
    // Users Growth Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    new Chart(usersCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Users',
                data: [120, 150, 180, 220, 300, 400, 500],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            }
        }
    });

    // Revenue & Transactions Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [
                {
                    label: 'Revenue',
                    data: [30000, 45000, 32000, 52000, 60000, 75000],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Transactions',
                    data: [1200, 1500, 1700, 2000, 2400, 3000],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>

@endsection

