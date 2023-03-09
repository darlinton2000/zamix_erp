@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $requisitionCount }}</h3>
                    <p>Requisições</p>
                </div>
                <div class="icon">
                    <i class="far fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $productCount }}</h3>
                    <p>Produtos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cart-plus"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $stockCount }}</h3>
                    <p>Estoque</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary" id='calendar'></div>
        </div>
        
        <div class="col-md-8">
            <canvas class="box box-primary" id="grafico"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
            });
            calendar.render();
            calendar.setOption('height', 366);
            calendar.updateSize();
        });
    </script>

    <script>
        var ctx = document.getElementById('grafico').getContext('2d');
        var grafico = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                    'Outubro', 'Novembro', 'Dezembro'
                ],
                datasets: [{
                        label: 'Produtos que Entraram no Estoque',
                        backgroundColor: 'rgba(65,105,225)',
                        data: {!! $graphicValues1 !!}
                    },
                    {
                        label: 'Produtos que sairam do Estoque',
                        backgroundColor: 'rgba(220,20,60)',
                        data: {!! $graphicValues2 !!}
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@stop
