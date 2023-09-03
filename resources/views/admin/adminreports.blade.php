@extends('admin.components.layout')

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="chartType">Select Chart or Table:</label>
            <select id="chartType" class="form-select">
                <option value="chart">Chart</option>
                <option value="table">Table</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="dataInterval">Select Data Interval:</label>
            <select id="dataInterval" class="form-select">
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        </div>
        <div class="col-md-4" id="yearSelectContainer" style="display: none;">
            <label for="year">Select Year:</label>
            <select id="year" class="form-select">
                <option value="2022">2022</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                <canvas id="completedReservationsChart" width="800" height="300"></canvas>
            </div>
            <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                <canvas id="accumulatedMoneyChart" width="800" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@push('jsscripts')
<script>
    let myChart;
    let myChart2;

    function initializeReservationData(year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding"];

        services.forEach(function(service){
            $.get('/reservationDataMonth', {service: service, year: year}, function(response){
                var data = response;
                updateReservationChart(service, data);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateReservationChart(service, data){
        var existingDatasetIndex = myChart.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor();

        if(existingDatasetIndex !== -1){
            myChart.data.datasets[existingDatasetIndex].data = data;
        } else {
            var newDataset = {
                label: service,
                data: data,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 1,
                fill: false
            };
            myChart.data.datasets.push(newDataset);
        }
        myChart.update();
    }

    function initializeMoneyData(year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding"];

        services.forEach(function(service){
            $.get('/moneyDataMonth', {service: service, year: year}, function(response){
                var data = response;
                updateMoneyChart(service, data);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateMoneyChart(service, data){
        var existingDatasetIndex = myChart2.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor();

        if(existingDatasetIndex !== -1){
            myChart2.data.datasets[existingDatasetIndex].data = data;
        } else {
            var newDataset = {
                label: service,
                data: data,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 1,
                fill: false
            };
            myChart2.data.datasets.push(newDataset);
        }
        myChart2.update();
    }

    function getRandomColor(){
        var letters = '0123456789ABCDEF';
        var color = "#";
        for (var i = 0; i < 6; i++){
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    $(document).ready(function() {
        var initialYear = 2023;

        var ctx = $('#completedReservationsChart')[0].getContext('2d');
        var ctx2 = $('#accumulatedMoneyChart')[0].getContext('2d');

        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: []
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: []
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        initializeReservationData(initialYear);
        initializeMoneyData(initialYear);
    });
</script>
@endpush