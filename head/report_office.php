<?php
    session_start();
    $role = $_SESSION['role'];
    if(!isset($_SESSION['username']) || $role!="Chairman"){
      header('Location: /ams');
    }

    include '../conn.php';
    include 'head.php';
    include 'nav.php';
  //  include 'links.php';
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> REPORT</h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>REPORT:OFFICE</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>DEPARTMENT NAME</th>
                                            <th>UNIT CODE</th>
                                            <th>OFFICE NAME</th>
                                            <th>ROOM NUMBER</th>
                                            <th>OFFICE FLOOR NUMBER</th>
                                            <th>EST NUMBER OF FEMALE</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                            <?php
                                $result = " SELECT * FROM ksl_unit ";

                                $query = mysqli_query($db, $result);
                                    $sn = 0;
                                while($row = mysqli_fetch_array($query))
                                    {
                                        $sn++;
                                        $dept_name=$row['dept_name'];
                                        $unit_code=$row['unit_code'];
                                        $office_name=$row['office_name'];
                                        $room_number=$row['room_number'];
                                        $flor=$row['flor'];
                                        $date=$row['date'];

                                        echo "<tr>";
                                        echo "<td> $sn </td>";
                                        echo "<td> $dept_name </td>";
                                        echo "<td> $unit_code </td>";
                                        echo "<td> $office_name </td>";
                                        echo "<td> $room_name </td>";
                                        echo "<td> $flor </td>";
                                        echo "<td> $date </td>";

                                        echo "<td>  </td>";
                                        echo "</tr>";
                                    }
                            ?>                                        

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    <?php
        include'foot.php';
    ?>
