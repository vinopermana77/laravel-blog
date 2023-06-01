<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>User</strong>
                            </div>
                            <div class="number dashtext-1">{{ $users->count() }}</div>
                        </div>
                        <div class="progress progress-template">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-contract"></i></div><strong>Posts on blogs</strong>
                            </div>
                            <div class="number dashtext-2">{{ $posts->count() }}</div>
                        </div>
                        <div class="progress progress-template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="bar-chart block no-margin-bottom">
                        <canvas id="barChartExample1"></canvas>
                    </div>
                    <div class="bar-chart block">
                        <canvas id="barChartExample2"></canvas>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="line-cahrt block">
                        <canvas id="lineCahrt"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>