<?php
include_once("init.php");
    
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POSNIC - Stock</title>

    <!-- Stylesheets -->
    <!---->
    <link rel="stylesheet" href="css/style.css">

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    <!-- jQuery & JS files -->
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
    <script src="js/view_sales.js"></script>

<script>
	//var c=sessionStorage.getItem('checked-checkboxesviewsales');
	//alert(c);
</script>
		
    
</head>
<body>

<!-- TOP BAR -->
<?php include_once("tpl/top_bar.php"); ?>
<!-- end top-bar -->


<!-- HEADER -->
<div id="header-with-tabs">

    <div class="page-full-width cf">

        <ul id="tabs" class="fl">
            <li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
			<li>
            <li><a href="view_sales.php" class="active-tab sales-tab">Sales</a></li>
            <li><a href="view_customers.php" class=" customers-tab">Customers</a></li>
            <li><a href="view_purchase.php" class=" purchase-tab">Purchase</a></li>
            <li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
            <li><a href="view_product.php" class=" stock-tab">Stocks / Products</a></li>
            <li><a href="view_payments.php" class="payment-tab">Payments / Outstandings</a></li>
            <li><a href="view_report.php" class="report-tab">Reports</a></li>
        </ul>
        <!-- end tabs -->

        <!-- Change this image to your own company's logo -->
        <!-- The logo will automatically be resized to 30px height. -->
        <a href="#" id="company-branding-small" class="fr"><img src="<?php if (isset($_SESSION['logo'])) {
                echo "upload/" . $_SESSION['logo'];
            } else {
                echo "upload/posnic.png";
            } ?>" alt="Point of Sale"/></a>

    </div>
    <!-- end full-width -->

</div>
<!-- end header -->


<!-- MAIN CONTENT -->
<div id="content">

    <div class="page-full-width cf">

        <div class="side-menu fl">

            <h3>Sales</h3>
            <ul>
                <li><a href="add_sales.php">Add Sales</a></li>
                <li><a href="view_sales.php">View Sales</a></li>
                <li><a href="bill.php">Bill</a></li>

            </ul>

        </div>
        <!-- end side-menu -->

        <div class="side-content fr">

            <div class="content-module">

                <div class="content-module-heading cf">

                    <h3 class="fl">Sales</h3>
                    <span class="fr expand-collapse-text">Click to collapse</span>
                    <span class="fr expand-collapse-text initial-expand">Click to expand</span>
 
                </div>
                <!-- end content-module-heading -->

                <div class="content-module-main cf">                    
                    
                    <table>
                        <form action="print_invoice.php" method="GET" name="search" target="_blank">
                            <input name="transactionid" type="text" class="round my_text_box" placeholder="Sales ID" style="width: 30%;" >

                            <script type="text/javascript">
                                function valid()
                                {
                                    if (document.search.transactionid.value == "")
                                    {
                                        alert("Please Fill Valid BillNo");
                                        document.search.transactionid.focus();
                                        return false;
                                    }
                                    return true;
                                }
                            </script>   
                                                      
                            &nbsp;&nbsp;<input name="Search" type="submit" class="my_button round blue   text-upper"value="Print" onclick="return valid()">                          

                        </form>
                        <!-- <form action="" method="get" name="limit_go">
                            Page per Record<input name="limit" type="text" class="round my_text_box" id="search_limit"
                                                  style="margin-left:5px;"
                                                  value="<?php if (isset($_GET['limit'])) echo $_GET['limit']; else echo "10"; ?>"
                                                  size="3" maxlength="3">
                            <input name="go" type="button" value="Go" class=" round blue my_button  text-upper"
                                   onclick="return confirmLimitSubmit()">
                        </form> -->

                            </table>
                            
                        </form>


                </div>
            </div>
            <div id="footer">
              <p>Copyrights 2021 © Quik Tech Softwares. All Rights Reserved.
    </p>

            </div>
            <!-- end footer -->

</body>
</html>
