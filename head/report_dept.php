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
                            <h2>REPORT:DEPARTMENT</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>DEPARTMENT NAME</th>
                                            <th>DEPARTMENT CODE</th>
                                            <th>USR REG</th>
                                            <th>DATE</th>
                                            <th>NUMBER OF COMMUNITY BENEFITING</th>
                                            <th> EST NUMBER OF MALE</th>
                                            <th> EST NUMBER OF FEMALE</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                        <th>S/N</th>
                                            <th>STATE</th>
                                            <th>PROGRAMME</th>
                                            <th>PROJECT</th>
                                            <th>NUMBER OF COMMUNITY BENEFITING</th>
                                            <th> EST NUMBER OF MALE</th>
                                            <th> EST NUMBER OF FEMALE</th>
                                            <th>DATE</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>



                            <?php
                                $result = "SELECT * FROM ksl_dept";

                                $query = mysqli_query($db, $result);
                                    $sn = 0;
                                while($row = mysqli_fetch_array($query))
                                    {
                                        $sn++;
                                        $dept_name=$row['dept_name'];
                                        $dept_code=$row['dept_code'];
                                        $date=$row['date'];

                                        echo "<tr>";
                                        echo "<td> $sn </td>";
                                        echo "<td> $dept_name </td>";
                                        echo "<td> $date </td>";

                                        // echo "<td>  </td>";
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