<?php
    session_start();
    $role = $_SESSION['role'];
    if(!isset($_SESSION['username']) || $role!="Chairman"){
      header('Location: /ams');
    }

    include 'head.php';
    include 'nav.php';
    include '../count.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-5 col-md-6 col-sm-9 col-xs-16">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL DEPARTMENT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $dept_count?>" data-speed="5" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-9 col-xs-16">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL UNITS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $unit_count?>" data-speed="1" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-9 col-xs-16">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL OFFICES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $office_count?>" data-speed="5" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-9 col-xs-16">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL ASSETS</div>
                            <div class="number count-to" data-from="1" data-to="<?php echo $asset_count?>" data-speed="5" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!-- <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2></h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
            </div>

            <div class="row clearfix">
            </div>
        </div>
    </section>
<?php
    include 'foot.php';
?>