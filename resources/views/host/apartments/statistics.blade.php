{{-- Pagina Statistiche (host) --}}
@extends('layouts.dashboard')
@section('title', 'Statistics')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Statistiche</h1>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script>
    let myChart = document.getElementById("myChart").getContext("2d");
        let myLabels = ['A', 'B', 'C','D','E'];
        let myData = ['32', '45', '20','49','19'];

        let chart = new Chart(myChart,{
            type: 'line',
            data: {
                labels: myLabels,
                datasets: [{
                    label: "Views/Month",
                    data: myData,
                    tension: 0.1,
                    borderColor: "rgb(255, 56, 92)",
                    backgroundColor: "rgb(0, 0, 0)",
                    hoverBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 10,
                    pointBorderColor: "rgb(255,255,255)",
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 4,
                }]
            },
            options: {
            title: {
                    display: true,
                    text: 'chart a caso',
                    fontSize: 30
                },
            legend: {
                display: true,
                position: 'right'
            }
            },
        })
</script>
@endsection