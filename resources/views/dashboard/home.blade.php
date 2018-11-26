@extends('dashboard.layout.App')
@section('content')

<h1>Welcome {{auth()->user()->name}}</h1>
<hr>
<div class="row flex-row">
                            <div class="col-xl-6">
                                <!-- Line Chart 01 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Line Chart 01</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="line-chart-01"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Line Chart 01 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Line Chart 02 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Line Chart 02</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="line-chart-02"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Line Chart 02 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Area Chart 01 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Area Chart 01</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="area-chart-01"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Area Chart 01 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Area Chart 02 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Area Chart 02</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="area-chart-02"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Area Chart 02 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Vertical Bar 01 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Vertical Bar 01</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="vertical-chart-01"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertical Bar 01 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Vertical Bar 02 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Vertical Bar 02</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="vertical-chart-02"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertical Bar 02 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Horizontal Bar 01 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Horizontal Bar 01</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="horizontal-chart-01"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Horizontal Bar 01 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Horizontal Bar 02 -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Horizontal Bar 02</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="horizontal-chart-02"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Horizontal Bar 02 -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Doughnut Chart -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Doughnut Chart</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="doughnut-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Doughnut Chart -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Pie Chart -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Pie Chart</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="pie-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Pie Chart -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Radar Chart -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Radar Chart</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="radar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Radar Chart -->
                            </div>
                            <div class="col-xl-6">
                                <!-- Polar Chart -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Polar Chart</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="chart">
                                            <canvas id="polar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Polar Chart -->
                            </div>
                        </div>
@endsection