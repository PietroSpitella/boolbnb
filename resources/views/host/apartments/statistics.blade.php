{{-- Pagina Statistiche (host) --}}
@extends('layouts.dashboard')
@section('title', 'Statistics')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">

                @foreach ($stat_apartment as $item)
                    <div>
                        <h1>Appartamento n°</h1>
                        <p id="apartment_id">{{$item->apartment_id}}</p>
                    </div>
                    <div>
                        <h2>N° visualizzazioni</h2>
                        <p id="apartment_count">{{$item->apartment_count}}</p>
                    </div>
                @endforeach
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script>
    
    let apartment_id = document.getElementById('apartment_id').innerHTML;
    let apartment_count = document.getElementById('apartment_count').innerHTML;
    

    let myChart = document.getElementById("myChart").getContext("2d");
        let apartment = apartment_id;
        let n_views = apartment_count;

        let chart = new Chart(myChart,{
            type: 'line',
            data: {
                labels: apartment,
                datasets: [{
                    label: "Views/Apartment",
                    data: n_views,
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