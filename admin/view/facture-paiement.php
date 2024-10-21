<?php require_once('../../model/select-facture2.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('head.php'); ?>
    <style type="text/css">
        @media print{
            @page{
                size:A4;
                margin:0;
            }
            body{
                margin:0;
                font-size: 12pt;
            }
        }
        body{margin-top:20px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #9fa8b9;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #f5f6fa;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #ffffff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #9fa8b9;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #f5f6fa;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}


.custom-table {
    border: 1px solid #e0e3ec;
}
.custom-table thead {
    background: #007ae1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #fafafa;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}
.custom-table > tbody td {
    border: 1px solid #e6e9f0;
}


.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.text-success {
    color: #00bb42 !important;
}

.text-muted {
    color: #9fa8b9 !important;
}

.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}

.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}
    </style>
</head>

<body class="animsition">
    <div class="container">
<div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-actions-btns mb-5">
                                      
                                        <a onclick="window.print()" class="btn btn-secondary">
                                            <i class="icon-printer"></i> Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                             <div align="center">
                                    <img src="../../image/logo.png" width="70" height="120">
                                </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <a href="index.html" class="invoice-logo">
                                        WILLFIT Gym <br>
                                        salle de Sport
                                    </a>
                                </div>
                               
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right" style="color:black">
                                        Massamba, 11 .<br>
                                        Basoko / GB, Ngaliema - Kinshasa.<br>
                                        0851111855
                                    </address>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <address>
                                            <?php echo $_GET['id']."-".$_GET['nom'] ?><br>
                                            <?php  
                                            $requser=$pdo->prepare("SELECT * FROM abonne WHERE code_abonne=?");
                                            $requser->execute(array($_GET['id']));
                                            $adresse_info=$requser->fetch(); 
                                            echo $adresse_info['adresse'];
                                            ?>
                                            
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Facture N° - #<?php echo date('hms') ?></div>
                                            <div><?php echo $_GET['dates'] ?></div>
                                        </div>
                                    </div>                                                  
                                </div>
                                
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Produit</th>
                                                    <th>Pu</th>
                                                    <th>Quantité</th>
                                                    <th>Montant Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($info3=$requete2->fetch()){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $info3['designation']; ?></td>
                                                        <td><?php echo $info3['prix']; ?></td>
                                                        <td><?php echo $info3['qte_com']; ?></td>
                                                        <td><?php echo $info3['pt']; ?></td>
                                                    </tr>
                                                    <?php 
                                                } ?>
                                                <tr>
                                                    
                                                    <td colspan="2">
                                                        <h5 class="text-success"><strong>Total</strong></h5>
                                                    </td>  
                                                    <td>
                                                        
                                                    </td>         
                                                    <td>
                                                        <h5 class="text-success"><strong><?php
                                  $nblmd=$pdo->prepare("SELECT SUM(pt) AS prix_total FROM achat WHERE code_abonne=?");
                                  $nblmd->execute(array($_GET['id']));
                                  $nblmd=$nblmd->fetch()['prix_total'];
                                  echo $nblmd;
                                ?></strong>$</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-footer">
                            plus qu'une salle de sport
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <script src="vendors/scripts/core.js"></script>
        <script src="vendors/scripts/script.min.js"></script>
        <script src="vendors/scripts/process.js"></script>
        <script src="vendors/scripts/layout-settings.js"></script>
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <!-- buttons for Export datatable -->
        <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.print.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
        <script src="src/plugins/datatables/js/pdfmake.min.js"></script>
        <script src="src/plugins/datatables/js/vfs_fonts.js"></script>
        <!-- Datatable Setting js -->
        <script src="vendors/scripts/datatable-setting.js"></script>

</body>

</html>
<!-- end document-->
