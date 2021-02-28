<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') { // if session variable "username" does not exist.
    header("location: index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
} else {
    if (isset($_GET['transactionid'])) {
        $transactionid = $_GET['transactionid'];
        $line = $db->query("SELECT transactionid FROM stock_sales where transactionid = '".$transactionid."'");

        if($line->num_rows<1){
                                    echo "<script> alert('Invalid BillNo');document.location.href='http://localhost/1/pos/bill.php';window.close();</script>";
                                }
        
        // $selected_date = $_GET['from_sales_date'];
        // $selected_date = strtotime($selected_date);
        // $mysqldate = date('Y-m-d H:i:s', $selected_date);
        // $fromdate = $mysqldate;
        // $selected_date = $_GET['to_sales_date'];
        // $selected_date = strtotime($selected_date);
        // $mysqldate = date('Y-m-d H:i:s', $selected_date);

        // $todate = $mysqldate;

        ?>
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
            <title>Print Invoice</title>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        </head>
        <style type="text/css" media="print">
            .hide {
                display: none
            }
        </style>
        <script type="text/javascript">
            function printpage() {
                document.getElementById('printButton').style.visibility = "hidden";
                window.print();
                document.getElementById('printButton').style.visibility = "visible";
            }
        </script>
        <body>
        <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
        <center><img src="logo.png" align="center" height="70" width="50" style="margin-top: 5px;" /></center>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center">
                    <div align="center">
                        <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
                        ?>
                        <strong style="font-size: 37px; font-family: 'Arial';"><?php echo $line4->name; ?></strong><br/>
                        <div style="font-size: 16px;"><?php echo $line4->address; ?>, <br/>
                            <?php echo $line4->place; ?>, <br/>
                        <?php echo $line4->city; ?>,<?php echo $line4->pin; ?><br/>
                        Website<strong>:<?php echo $line4->web; ?></strong><br>Email<strong>:<?php echo $line4->email; ?></strong><br/>Phone
                        <strong>:<?php echo $line4->phone; ?></strong>
                        <br/>
                        <?php ?>
                        </div>
                    </div>
                    <table width="700" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td height="30" align="center" style="font-size: 25px;"><strong>Invoice</strong></td>
                        </tr>
                        <tr>
                            <td height="30" align="center">&nbsp;</td>
                        </tr>
                        <tr>                        

                            <td align="left">
                                <table width="700" border="0" cellspacing="0" cellpadding="0">
                                    <td width="41"><strong>Bill No:</strong></td>
                                    <td>&nbsp;<?php $bill= $_GET['transactionid']; echo strtoupper($bill); ?></td>
                                    <td><strong>Customer Name:</strong></td>
                                            <td><strong><?php $cname = $db->queryUniqueValue("SELECT customer_id FROM stock_sales where transactionid='".$transactionid."'"); echo strtoupper($cname); ?></strong>
                                    </td>
                                                                        
                                    <tr>
                                         <td width="45"><strong>Date:</strong></td>
                                        <td width="393">&nbsp;<?php                      
                                             $mysqldate = date('Y-m-d H:i:s');
                                             echo "$mysqldate";
                                         ?></td>                                        
                                    </tr>
                                    <!-- <tr>
                                        <td width="150"><strong>Total Sales</strong></td>
                                        <td width="150">
                                            &nbsp;<?php echo $age = $db->queryUniqueValue("SELECT sum(grand_total) FROM stock_sales where transactionid='".$transactionid."'" );?>
                                        </td>
                                        <td width="150">
                                            &nbsp;<?php echo $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_sales where count1=1 AND date BETWEEN '$fromdate' AND '$todate' "); ?></td>
                                    </tr>
                                     -->
                                    <!-- <tr>
                                        <td><strong>Received Amount</strong></td>
                                        <td>
                                            &nbsp;<?php echo $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_sales where count1=1 AND date BETWEEN '$fromdate' AND '$todate' "); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="150"><strong>Total OutStanding </strong></td>
                                        <td width="150">
                                            &nbsp;<?php echo $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_sales where count1=1 AND date BETWEEN '$fromdate' AND '$todate' "); ?></td>
                                    </tr> -->

                                </table>
                            </td>
                            
                        </tr>
                        <!-- <tr>
                            <td width="45">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td height="20">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                            
                                    </tr>
                                </table>
                            </td>
                        </tr> -->
                        <tr>
                            <td width="45">
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <!-- <td><strong>S.no</strong></td> -->
                                        <td>S.No</td>
                                        <td><strong>Product Name </strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Quantity</strong></td>
                                        <td><strong>Amount</strong></td>
                                        <!-- <td><strong>Total</strong></td> -->
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <?php
                                    
                                    $i=0;
                                    $result = $db->query("SELECT * FROM stock_sales where transactionid='".$transactionid."'");
                                    while ($line = $db->fetchNextObject($result)) {
                                        $i += 1;
                                        ?>

                                        <tr>
                                            <!-- <td><?php $mysqldate = $line->date;
                                                $phpdate = strtotime($mysqldate);
                                                $phpdate = date("d/m/Y", $phpdate);
                                                echo $phpdate; ?></td> -->
                                            <!-- <td><?php echo $line->id; ?></td> -->
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $line->stock_name; ?></td>
                                            <td><?php echo $line->selling_price; ?></td>
                                            <td><?php echo $line->quantity; ?></td>
                                            <td><?php echo  $line->amount; ?></td>
                                        </tr>

                                        <?php                                        
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>
                                <hr>                            
                            </td>                            
                        </tr>
                        <tr>

                            <td align="right"><strong>Total Sales:</strong>

                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Rs.'.$age = $db->queryUniqueValue("SELECT subtotal FROM stock_sales where transactionid='".$transactionid."'" );?></strong>
                            </td>   

                        </tr>
                        <tr>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;">
                                <p align="center">**INCLUSIVE OF GST**</p>
                                <p align="center">**Goods once sold cannot be taken back**</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>        
        </body>
        </html>
        <?php
    } else
        echo "Please from and to date to process report";
}
?>
