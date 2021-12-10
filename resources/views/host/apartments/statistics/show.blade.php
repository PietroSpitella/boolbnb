@extends('layouts.dashboard')
@section('title', 'Statistiche appartamento ' . $apartment->title)

@section('content')
<h1 class="text-center">Statistiche visualizzazioni: {{$apartment->title}}</h1>

<canvas id="myChart" width="2" height="1"></canvas>



<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script type="text/javascript">
    const ctx = document.getElementById('myChart').getContext('2d');
    countViews = [];
    function getData(){
        axios.get('/api/statistic/'+{!! $apartment->id !!}).then(el=>{
            countViews = el.data.results
            maxCount = Math.max(...countViews);
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: '# di visualizzazioni',
                        data: countViews,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Visualizzazioni'
                            },
                            min: 0,
                            max: maxCount + 2,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

        })
    }
    window.onload = getData();

</script>
@endsection