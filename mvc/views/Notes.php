<?php include("layouts/header.php");?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Notes</h1>
                    </div>

                    <div class="row">
                        
                        <?php
                            $num = mysqli_num_rows($data['result']);
                            $i = 1;
                            while($row = mysqli_fetch_assoc($data['result'])) {
                                if ($i % 2 != 0 ) {
                                    echo '<div class="col-lg-6">'; 
                                }

                                echo '
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample' . $row["id"] . '" class="d-block card-header py-3" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample' . $row["id"] . '">
                                        <h6 class="m-0 font-weight-bold text-primary">' . $row["tieude"] . '</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardExample' . $row["id"] . '">
                                        <div class="card-body">
                                        ' . $row["noidung"] . '
                                        </div>
                                    </div>
                                </div>
                                ';

                                if ($i % 2 == 0 || $num == $i) {
                                    echo "</div>";
                                }
                                $i++;
                            }

                        ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <?php include("layouts/footer.php");?>