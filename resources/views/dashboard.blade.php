@extends('index')

@section('header', 'Grafik Guest')

@section('sidebar')
    @parent
 
    <p>This is appended to the master sidebar.</p>
@endsection

@section('action')
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi">
                <use xlink:href="#calendar3" />
            </svg>
            This week
        </button>
    </div>
@endsection

@section('content')
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    <h2>Data Guest Calculation</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Company</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Oktober 2023</td>
                    <td>SMPN 1 Kotabaru</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Oktober 2023</td>
                    <td>SMKN 1 Kotabaru</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    
    <script>
        (() => {
            'use strict'
            
            // Graphs
            const ctx = document.getElementById('myChart')
            // eslint-disable-next-line no-unused-vars
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                labels: [
                    'SMPN 1 Kotabaru',
                    'SMKN 1 Kotabaru',
                    'SMP 2',
                    'SMP 3',
                    'SMP 4',
                    'SMP 5',
                    'SMP 6'
                ],
                datasets: [{
                    data: [
                    5,
                    20,
                    15,
                    17,
                    7,
                    6,
                    9
                    ],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
                },
                options: {
                plugins: {
                    legend: {
                    display: false
                    },
                    tooltip: {
                    boxPadding: 3
                    }
                }
                }
            })
        })()
    </script>
@endsection