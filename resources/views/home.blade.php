
<!doctype html>
<html lang="en">

<head>
    <title>Stock Trading Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>{{$manager->mana_name}}  </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="#" class="active"><i class="lnr lnr-home"></i> <span>Management   </span></a></li>
                        <?php $managerName=$manager->mana_name;  ?>
                        <li><a href="/changepwd?managerName={{$managerName}}" class=""><i class="lnr lnr-home"></i> <span>ChangePassword   </span></a></li>

                        <li>
                            
                            <div id="subPages" class="collapse ">
                                <ul class="nav">

                                </ul>
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$stockName}}</h3>
                            <p class="panel-subtitle">Period: Jun 3, 2018 - Jun 10, 2018</p>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                        <form method="post" action="/home"> 
                            {!! csrf_field() !!}   
                            </div>
                            <div class="col-md-9">
                                <select name="stockCode" class="form-control" selected="{{$stockName}}">

                                    @foreach($stocks as $stock)
                                    <option value="{{$stock->stockCode}}">{{$stock->stockName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                            <div class="form-group">
                                  <input type="hidden" name="manager" value={{$manager->mana_name}}>
                                  <input type="hidden" name="message" value={{$message}}>
                            </div>
                        </form>

                        </div>


                        <br>
                        <br>
                        <br>
                        <div class="panel-body">
                            <div class="row">
                         

                           </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div id="headline-chart" class="ct-chart"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{$newest->TradedNum}}</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                                        <span class="info-label">Latest Transaction Amount</span>
                                    </div>
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{$newest->TradedPrice}}</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                                        <span class="info-label">Latest Transaction Price</span>
                                    </div>
                                    <br>

                                    <form method="post" action="/home">
                                        {!! csrf_field() !!}   
                                    <br>
                                    <br>
                                    <input type="hidden" name="manager" value={{$manager->mana_name}}>
                                    <input type="hidden" name="message" value={{$message}}>
                                    <input type="hidden" name="stockCode" value={{$newest->stockCode}}>
                                    <div class="input-group">
                                        <input class="form-control" type="number" step="0.01" min="0" max="0.1" name="bound" placeholder="Upper/Lower Bound" >
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" >Set</button></span>
                                    </div>
                                    </form>

                                    <br>
                                    <form method="post" action="/home">
                                         {!! csrf_field() !!}  
                                    <input type="hidden" name="manager" value={{$manager->mana_name}}>
                                    <input type="hidden" name="message" value={{$message}}>
                                    <input type="hidden" name="stockCode" value={{$newest->stockCode}}>
                                    <input type="hidden" name="suspend" value="suspend">
                                    <div class="col-md-6">                                       
                                            <button type="submit" class="btn btn-danger btn-block">Suspend</button>
                                        </div>
                                    </form>

                                    <form method="post" action="/home">
                                        {!! csrf_field() !!}  
                                    <input type="hidden" name="manager" value={{$manager->mana_name}}>
                                    <input type="hidden" name="message" value={{$message}}>
                                    <input type="hidden" name="stockCode" value={{$newest->stockCode}}>
                                    <input type="hidden" name="restart" value="restart">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-block">Restart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
                    <div class="row">
                        <div class="col-md-6">
                            
                            <!-- END MULTI CHARTS -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- TODO LIST -->
                             
                            <!-- END TODO LIST -->
                        </div>
                        <div class="col-md-6">
                            <!-- TIMELINE -->
                             
                            <!-- END TIMELINE -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- TASKS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Buy Instruction</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Stock Code</th>
                                                <th>Trade Amount</th>
                                                <th>Trade Price</th>
                                                <th>Date &amp; Time</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                @foreach($buyinstructions as $buyinstruction)
                                                <tr>
                                                <td>{{$buyinstruction->stockCode}}</td>
                                                <td>{{$buyinstruction->TradedNum}}</td>
                                                <td>{{$buyinstruction->TradedPrice}}</td>
                                                <td>{{$buyinstruction->Time}}</td>
                                                <td><span class="label label-success">Check</span></td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                                        <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TASKS -->
                        </div>
                        <div class="col-md-6">
                            <!-- VISIT CHART -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Sell Instruction</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Stock Code</th>
                                                <th>Trade Amount</th>
                                                <th>Trade Price</th>
                                                <th>Date &amp; Time</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($sellinstructions as $sellinstruction)
                                                <tr>
                                                <td>{{$sellinstruction->stockCode}}</td>
                                                <td>{{$sellinstruction->TradedNum}}</td>
                                                <td>{{$sellinstruction->TradedPrice}}</td>
                                                <td>{{$sellinstruction->Time}}</td>
                                                <td><span class="label label-success">Check</span></td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                                        <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END VISIT CHART -->
                        </div>
                        <div class="col-md-4">
                            <!-- REALTIME CHART -->
                            <!-- INPUTS -->
                           
                            <!-- END INPUTS -->
                            
                            <!-- END REALTIME CHART -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">GROUP.5</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
    <script>
    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 400,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);


        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });
    </script>
</body>

</html>
