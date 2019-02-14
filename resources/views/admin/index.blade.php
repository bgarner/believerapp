@extends('layouts.admin_layout')

          @section('content')
            <div class="section-body">

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <i class="fa fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Believers</h4>
                          </div>
                          <div class="card-body">
                            {{ $believer_count }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                          <i class="fa fa-users"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Clients</h4>
                          </div>
                          <div class="card-body">
                            {{ $brand_count }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="fa fa-trophy"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Points Awarded</h4>
                          </div>
                          <div class="card-body">
                            {{ $point_total }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fa fa-gift"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Rewards Redeemed</h4>
                          </div>
                          <div class="card-body">
                            {{ $redemption_count }}
                          </div>
                        </div>
                      </div>
                    </div>                  
                  </div>

                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                          <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                              <div class="btn-group">
                                <a href="#" class="btn btn-primary">Week</a>
                                <a href="#" class="btn">Month</a>
                              </div>
                            </div>
                          </div>
                          <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="myChart" height="347" width="573" class="chartjs-render-monitor" style="display: block; width: 573px; height: 347px;"></canvas>
                            <div class="statistic-details mt-sm-4">
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                <div class="detail-value">$243</div>
                                <div class="detail-name">Today's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                <div class="detail-value">$2,902</div>
                                <div class="detail-name">This Week's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                <div class="detail-value">$12,821</div>
                                <div class="detail-name">This Month's Sales</div>
                              </div>
                              <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                <div class="detail-value">$92,142</div>
                                <div class="detail-name">This Year's Sales</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endsection