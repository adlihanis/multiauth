<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('KOLEJ TUN DR ISMAIL') }}
        </h2>
    </x-slot>

@extends('layouts.bootstrap')
@include('layouts.style')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="container-fluid bg">
    <div class="row">
        
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
      </div>

      <!-- Content Row -->
      <div class="row">
        
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Staff</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$staffSum}}</div>
                <a href="#" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-house-door icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Student</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$studentSum}}</div>
                <a href="#" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-box-seam icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Admin</div>
                <div class="h5 mb-0 font-weight-bold">{{$adminSum}}</div>
                <a href="#" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-calendar-week icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       <!-- Content Row -->
       <div class="row">
<!-- Pie Chart -->
<div class="col-xl-5 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Number of Student Course</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pi">
                <div id="myPieChart"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    Highcharts.chart('myPieChart', {
        title: {
            text: 'Number of Students per Course'
        },
        series: [{
            type: 'pie',
            name: 'Course',
            data: [
                @foreach($courseDetails as $course)
                @if($course->course)
                ['{{$course->course}}', {{$course->count}}],
                @endif
                @endforeach
            ]
        }],
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            itemMarginTop: 10,
            itemMarginBottom: 10,
            labelFormatter: function () {
                return this.name + ': ' + this.y;
            }
        },
        plotOptions: {
            pie: {
                showInLegend: true,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                }
            }
        }
    });
</script>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold">Student Blocks</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie">
                                        <div id="myPie"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    Highcharts.chart('myPie', {
        title: {
            text: 'Number of students per block'
        },
        series: [{
            type: 'pie',
            name: 'Block',
            data: [
                @foreach($blockDetails as $block)
                @if($block->block)
                ['{{$block->block}}', {{$block->count}}],
                @endif
                @endforeach
            ]
        }],
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical',
            itemMarginTop: 10,
            itemMarginBottom: 10,
            labelFormatter: function () {
                return this.name + ': ' + this.y;
            }
        },
        plotOptions: {
            pie: {
                showInLegend: true,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                }
            }
        }
    });
</script>
</x-app-layout>


