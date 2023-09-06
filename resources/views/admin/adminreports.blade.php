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
                <option value="monthly" select>Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        </div>
        <div class="col-md-4" id="yearSelectContainer">
            <label for="year">Select Year:</label>
            <select id="year" class="form-select">
                <option value="2022">2022</option>
                <option value="2023" selected>2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>
    </div>
    <div id="charts">
        <div class="row" id="monthlycharts">
            <div class="col-md-12">
                <h4>Completed Reservation</h4>
                <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                    <canvas id="completedReservationsChart" width="800" height="300"></canvas>
                </div>
                <hr>
                <br>
                <h4>Accumulated Amount</h4>
                <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                    <canvas id="accumulatedMoneyChart" width="800" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="row" id="yearlycharts">
            <div class="col-md-12">
                <h4>Completed Reservation</h4>
                <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                    <canvas id="completedReservationsChartYearly" width="800" height="300"></canvas>
                </div>
                <hr>
                <br>
                <h4>Accumulated Amount</h4>
                <div class="chart-container" style="overflow-x: auto; max-height: 600px;">
                    <canvas id="accumulatedMoneyChartYearly" width="800" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div id="tables" hidden>
        <div id="tablemonthly">
            <h4>Completed Reservation</h4>
            <div class="overflow-scroll scrollable-container">
                <table class="table table-hover">
                    <thead>
                        <th><strong>Service</strong></th>
                        <th><strong>Jan</strong></th>
                        <th><strong>Feb</strong></th>
                        <th><strong>Mar</strong></th>
                        <th><strong>Apr</strong></th>
                        <th><strong>May</strong></th>
                        <th><strong>June</strong></th>
                        <th><strong>July</strong></th>
                        <th><strong>Aug</strong></th>
                        <th><strong>Sept</strong></th>
                        <th><strong>Oct</strong></th>
                        <th><strong>Nov</strong></th>
                        <th><strong>Dec</strong></th>
                    </thead>
                    <tbody id="monthlyreservation">

                    </tbody>
                </table>
            </div>
            <hr>
            <br>
            <h4>Accumulated Amount</h4>
            <div class="overflow-scroll scrollable-container">
                <table class="table table-hover">
                    <thead>
                        <th><strong>Service</strong></th>
                        <th><strong>Jan</strong></th>
                        <th><strong>Feb</strong></th>
                        <th><strong>Mar</strong></th>
                        <th><strong>Apr</strong></th>
                        <th><strong>May</strong></th>
                        <th><strong>June</strong></th>
                        <th><strong>July</strong></th>
                        <th><strong>Aug</strong></th>
                        <th><strong>Sept</strong></th>
                        <th><strong>Oct</strong></th>
                        <th><strong>Nov</strong></th>
                        <th><strong>Dec</strong></th>
                    </thead>
                    <tbody id="monthlyamount">

                    </tbody>
                </table>
            </div>
        </div>

        <div id="tableyearly" hidden>
            <h4>Completed Reservation</h4>
            <div class="overflow-scroll scrollable-container">
                <table class="table table-hover">
                    <thead>
                        <th><strong>Service</strong></th>
                        <th><strong>2022</strong></th>
                        <th><strong>2023</strong></th>
                    </thead>
                    <tbody id="yearlyreservation">

                    </tbody>
                </table>
            </div>
            <hr>
            <br>
            <h4>Accumulated Amount</h4>
            <div class="overflow-scroll scrollable-container">
                <table class="table table-hover">
                    <thead>
                        <th><strong>Service</strong></th>
                        <th><strong>2022</strong></th>
                        <th><strong>2023</strong></th>
                    </thead>
                    <tbody id="yearlyamount">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('jsscripts')
<script>
    // Monthly Chart
    let myChart;
    let myChart2;

    // Yearly Chart
    let myChart3;
    let myChart4;

    // Monthy Chart Functions: Completed Reservation
    function initializeReservationData(year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding"];
        $("#monthlyreservation").empty();

        services.forEach(function(service){
            $.get('/reservationDataMonth', {service: service, year: year}, function(response){
                var data = response;
                updateReservationChart(service, data);

                var newRow = $('<tr>');
                newRow.append('<td>' + service + '</td>');

                for(var month in data){
                    if (data.hasOwnProperty(month)) {
                        newRow.append('<td>' + data[month] + '</td>');
                    }
                }


                $("#monthlyreservation").append(newRow);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateReservationChart(service, data){
        var existingDatasetIndex = myChart.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor(service);

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

    // Monthly Chart Functions: Accumulated Amount
    function initializeMoneyData(year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding", "Donations"];
        $("#monthlyamount").empty();
        services.forEach(function(service){
            $.get('/moneyDataMonth', {service: service, year: year}, function(response){
                var data = response;
                updateMoneyChart(service, data);


                var newRow = $('<tr>');
                newRow.append('<td>' + service + '</td>');

                for(var month in data){
                    if (data.hasOwnProperty(month)) {
                        newRow.append('<td>' + data[month] + '</td>');
                    }
                }


                $("#monthlyamount").append(newRow);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateMoneyChart(service, data){
        var existingDatasetIndex = myChart2.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor(service);

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

    // Yearly CHart Functions: Completed Reservation
    function initializeReservationDataYear (year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding"];
        services.forEach(function(service){
            $.get('/reservationDataYear', {service: service, year: year}, function(response){
                var data = response;
                updateReservationChartYear(service, data);

                var newRow = $('<tr>');
                newRow.append('<td>' + service + '</td>');

                for(var month in data){
                    if (data.hasOwnProperty(month)) {
                        newRow.append('<td>' + data[month] + '</td>');
                    }
                }


                $("#yearlyreservation").append(newRow);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateReservationChartYear(service, data){
        var existingDatasetIndex = myChart3.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor(service);

        if(existingDatasetIndex !== -1){
            myChart3.data.datasets[existingDatasetIndex].data = data;
        } else {
            var newDataset = {
                label: service,
                data: data,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 1,
                fill: false
            };
            myChart3.data.datasets.push(newDataset);
        }
        myChart3.update();
    }

    // Yearly Chart Functions:
    function initializeMoneyDataYear(year){
        var services = ["Blessing", "Baptism", "Funeral Mass", "Anointing Of The Sick", "Kumpil", "First Communion", "Wedding", "Donations"];
        services.forEach(function(service){
            $.get('/moneyDataMonthYear', {service: service, year: year}, function(response){
                var data = response;
                updateMoneyChartYear(service, data);

                var newRow = $('<tr>');
                newRow.append('<td>' + service + '</td>');

                for(var month in data){
                    if (data.hasOwnProperty(month)) {
                        newRow.append('<td>' + data[month] + '</td>');
                    }
                }


                $("#yearlyamount").append(newRow);
            }).fail(function(error){
                console.error('Error Fetching Data:', error);
            })
        })
    }

    function updateMoneyChartYear(service, data){
        var existingDatasetIndex = myChart4.data.datasets.findIndex(function(dataset){
            return dataset.label === service;
        });

        var color = getRandomColor(service);

        if(existingDatasetIndex !== -1){
            myChart4.data.datasets[existingDatasetIndex].data = data;
        } else {
            var newDataset = {
                label: service,
                data: data,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 1,
                fill: false
            };
            myChart4.data.datasets.push(newDataset);
        }
        myChart4.update();
    }


    function getRandomColor(service){
        if(service == "Blessing"){
            return "#008080";
        }
        if(service == "Funeral Mass"){
            return "#4169E1";
        }
        if(service == "First Communion"){
            return "#DC143C";
        }
        if(service == "Kumpil"){
            return "#FFD700";
        }
        if(service == "Anointing Of The Sick"){
            return "#98FB98";
        }
        if(service == "Baptism"){
            return "#9370DB";
        }
        if(service == "Wedding"){
            return "#FA8072";
        }
        if(service == "Donations"){
            return "#708090";
        }
    }

    $(document).ready(function() {
        var initialYear = new Date().getFullYear();

        var ctx = $('#completedReservationsChart')[0].getContext('2d');
        var ctx2 = $('#accumulatedMoneyChart')[0].getContext('2d');
        var ctx3 = $('#completedReservationsChartYearly')[0].getContext('2d');
        var ctx4 = $('#accumulatedMoneyChartYearly')[0].getContext('2d');

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

        myChart3 = new Chart(ctx3, {
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

        myChart4 = new Chart(ctx4, {
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
        initializeReservationDataYear(initialYear);
        initializeMoneyDataYear(initialYear);

        $('#charts').attr('hidden', 'hidden');
        $('#charts').removeAttr('hidden');

        $('#yearlycharts').attr('hidden', 'hidden');
        $('#dataInterval').on('change', function(){
            var selectedInterval = $(this).val();
            if(selectedInterval == "monthly"){
                $('#yearSelectContainer').removeAttr('hidden');
                $('#monthlycharts').removeAttr('hidden');
                $('#tablemonthly').removeAttr('hidden');
                $('#yearlycharts').attr('hidden', 'hidden');
                $('#tableyearly').attr('hidden', 'hidden');
            } else {
                $('#yearSelectContainer').attr('hidden', 'hidden');
                $('#monthlycharts').attr('hidden', 'hidden');
                $('#yearlycharts').removeAttr('hidden');
                $('#tablemonthly').attr('hidden', 'hidden');
                $('#tableyearly').removeAttr('hidden');
            }
        });

        $('#year').on('change', function(){
            initialYear = $(this).val();
            // console.log($(this).val());
            initializeReservationData(initialYear);
            initializeMoneyData(initialYear);
        })

        $('#chartType').on('change', function(){
            var selectedtype = $(this).val();
            if(selectedtype == "chart"){
                $('#charts').removeAttr('hidden');
                $('#tables').attr('hidden', 'hidden');
            } else {
                $('#charts').attr('hidden', 'hidden');
                $('#tables').removeAttr('hidden');
            }
        })

    });
</script>
@endpush