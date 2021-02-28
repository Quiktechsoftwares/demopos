<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POSNIC - Add Customer</title>

    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_customer.css">

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- jQuery & JS files -->
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
    <script src="js/add_customer.js"></script>

    <script type="text/javascript">
        function validate()
        {
            if(document.form1.dob.value == "")
            {
                alert("Please Select Customer Date of Birth ");
                document.form1.dob.focus();
                return false;
            }

         /*   if(document.form1.l_sph.value == "")
            {
                alert("Please Please Fill L_SPH VALUE ");
                document.form1.l_sph.focus();
                return false;
            }

            if(document.form1.l_cyl.value == "")
            {
                alert("Please Please Fill L_CYL VALUE ");
                document.form1.l_cyl.focus();
                return false;
            }

            if(document.form1.l_axis.value == "")
            {
                alert("Please Please Fill L_AXIS VALUE ");
                document.form1.l_axis.focus();
                return false;
            }

            if(document.form1.l_va.value == "")
            {
                alert("Please Please Fill L_V/A VALUE ");
                document.form1.l_va.focus();
                return false;
            }


            if(document.form1.r_sph.value == "")
            {
                alert("Please Please Fill R_SPH VALUE ");
                document.form1.r_sph.focus();
                return false;
            }

            if(document.form1.r_cyl.value == "")
            {
                alert("Please Please Fill R_CYL VALUE ");
                document.form1.r_cyl.focus();
                return false;
            }

            if(document.form1.r_axis.value == "")
            {
                alert("Please Please Fill R_AXIS VALUE ");
                document.form1.r_axis.focus();
                return false;
            }

            if(document.form1.r_va.value == "")
            {
                alert("Please Please Fill R_V/A VALUE ");
                document.form1.r_va.focus();
                return false;
            }



            if(document.form1.lr_sph.value == "")
            {
                alert("Please Please Fill L_SPH VALUE ");
                document.form1.lr_sph.focus();
                return false;
            }

            if(document.form1.lr_cyl.value == "")
            {
                alert("Please Please Fill L_CYL VALUE ");
                document.form1.lr_cyl.focus();
                return false;
            }

            if(document.form1.lr_axis.value == "")
            {
                alert("Please Please Fill L_AXIS VALUE ");
                document.form1.lr_axis.focus();
                return false;
            }

            if(document.form1.lr_va.value == "")
            {
                alert("Please Please Fill L_V/A VALUE ");
                document.form1.lr_va.focus();
                return false;
            }


            if(document.form1.rr_sph.value == "")
            {
                alert("Please Please Fill R_SPH VALUE ");
                document.form1.rr_sph.focus();
                return false;
            }

            if(document.form1.rr_cyl.value == "")
            {
                alert("Please Please Fill R_CYL VALUE ");
                document.form1.rr_cyl.focus();
                return false;
            }

            if(document.form1.rr_axis.value == "")
            {
                alert("Please Please Fill R_AXIS VALUE ");
                document.form1.rr_axis.focus();
                return false;
            }

            if(document.form1.rr_va.value == "")
            {
                alert("Please Please Fill R_V/A VALUE ");
                document.form1.rr_va.focus();
                return false;
            }

            if(document.form1.op1.value == "select")
            {
                alert("Plese Select BIFOCAL value");
                document.form1.op1.focus();
                return false;
            }*/
            return true;
        }
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
            <li><a href="view_sales.php" class=" sales-tab">Sales</a></li>
            <li><a href="view_customers.php" class="active-tab customers-tab">Customers</a></li>
            <li><a href="view_purchase.php" class="purchase-tab">Purchase</a></li>
            <li><a href="view_supplier.php" class="  supplier-tab">Supplier</a></li>
            <li><a href="view_product.php" class="stock-tab">Stocks / Products</a></li>
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

            <h3>Customers Management</h3>
            <ul>
                <li><a href="add_customer.php">Add Customer</a></li>
                <li><a href="view_customers.php">View Customers</a></li>
                <li><a href="customer.php">Customers</a></li>
            </ul>

        </div>
        <!-- end side-menu -->

        <div class="side-content fr">

            <div class="content-module">

                <div class="content-module-heading cf">

                    <h3 class="fl">Add Customer</h3>
                    <span class="fr expand-collapse-text">Click to collapse</span>
                    <span class="fr expand-collapse-text initial-expand">Click to expand</span>

                </div>
                <!-- end content-module-heading -->

                <div class="content-module-main cf">


                    <?php
                    //Gump is libarary for Validatoin

                    if (isset($_POST['name'])) {
                        $_POST = $gump->sanitize($_POST);
                        $gump->validation_rules(array(
                            'name' => 'required|max_len,100|min_len,3',
                            'address' => 'max_len,200',
                            'contact1' => 'alpha_numeric|max_len,20',
                            'contact2' => 'alpha_numeric|max_len,20',
                            // 'l_sph'   => 'alpha_numeric|max_len,5',
                            // 'l_cyl'   => 'alpha_numeric|max_len,5',
                            // 'l_axis'   => 'alpha_numeric|max_len,5',
                            // 'l_va'   => 'alpha_numeric|max_len,5',                         
                            // 'r_sph'   => 'alpha_numeric|max_len,5',
                            // 'r_cyl'   => 'alpha_numeric|max_len,5',
                            // 'r_axis'   => 'alpha_numeric|max_len,5',
                            // 'r_va'   => 'alpha_numeric|max_len,5'                         
                        ));

                        $gump->filter_rules(array(
                            'name' => 'trim|sanitize_string|mysqli_escape',
                            'address' => 'trim|sanitize_string|mysqli_escape',
                            'contact1' => 'trim|sanitize_string|mysqli_escape',
                            'contact2' => 'trim|sanitize_string|mysqli_escape',
                            // 'l_sph'   => 'trim|sanitize_string|mysqli_escape',
                            // 'l_cyl'   => 'trim|sanitize_string|mysqli_escape',
                            // 'l_axis'   => 'trim|sanitize_string|mysqli_escape',
                            // 'l_va'   => 'trim|sanitize_string|mysqli_escape',             
                            // 'r_sph'   => 'trim|sanitize_string|mysqli_escape',
                            // 'r_cyl'   => 'trim|sanitize_string|mysqli_escape',
                            // 'r_axis'   => 'trim|sanitize_string|mysqli_escape',
                            // 'r_va'   => 'trim|sanitize_string|mysqli_escape'
                        ));

                        $validated_data = $gump->run($_POST);
                        $name = "";
                        $address = "";
                        $contact1 = "";
                        $contact2 = "";
                        $l_sph ="";
                        $l_cyl ="";
                        $l_axis ="";
                        $l_va ="";
                        $r_sph ="";
                        $r_cyl ="";
                        $r_axis ="";
                        $r_va ="";
                        $lr_sph ="";
                        $lr_cyl ="";
                        $lr_axis ="";
                        $lr_va ="";
                        $rr_sph ="";
                        $rr_cyl ="";
                        $rr_axis ="";
                        $rr_va ="";
                        $lense="";

                        if ($validated_data === false) {
                            echo $gump->get_readable_errors(true);
                        } else {


                            
                            $dob = mysqli_real_escape_string($db->connection, $_POST['dob']);
                            $name = mysqli_real_escape_string($db->connection, $_POST['name']);
                            $address = mysqli_real_escape_string($db->connection, $_POST['address']);
                            $contact1 = mysqli_real_escape_string($db->connection, $_POST['contact1']);
                            $contact2 = mysqli_real_escape_string($db->connection, $_POST['contact2']);
                            $l_sph = mysqli_real_escape_string($db->connection, $_POST['l_sph']);
                            $l_cyl = mysqli_real_escape_string($db->connection, $_POST['l_cyl']);
                            $l_axis = mysqli_real_escape_string($db->connection, $_POST['l_axis']);
                            $l_va = mysqli_real_escape_string($db->connection, $_POST['l_va']);
                            $r_sph = mysqli_real_escape_string($db->connection, $_POST['r_sph']);
                            $r_cyl = mysqli_real_escape_string($db->connection, $_POST['r_cyl']);
                            $r_axis = mysqli_real_escape_string($db->connection, $_POST['r_axis']);
                            $r_va = mysqli_real_escape_string($db->connection, $_POST['r_va']);
                            $lense = mysqli_real_escape_string($db->connection, $_POST['op1']);
                            $lr_sph =  mysqli_real_escape_string($db->connection, $_POST['lr_sph']);
                            $lr_cyl =  mysqli_real_escape_string($db->connection, $_POST['lr_cyl']);
                            $lr_axis = mysqli_real_escape_string($db->connection, $_POST['lr_axis']);
                            $lr_va =   mysqli_real_escape_string($db->connection, $_POST['lr_va']);
                            $rr_sph =  mysqli_real_escape_string($db->connection, $_POST['rr_sph']);
                            $rr_cyl =  mysqli_real_escape_string($db->connection, $_POST['rr_cyl']);
                            $rr_axis = mysqli_real_escape_string($db->connection, $_POST['rr_axis']);
                            $rr_va =   mysqli_real_escape_string($db->connection, $_POST['rr_va']);


                            $count = $db->countOf("customer_details", "customer_name='$name'");
                            if ($count == 1) {
                                echo "<div class='error-box round'>Dublicat Entry. Please Verify</div>";
                            } else {

                                if ($db->query("insert into customer_details values(NULL,'$dob','$name','$address','$contact1','$contact2','$l_sph','$l_cyl','$l_axis','$l_va','$r_sph','$r_cyl','$r_axis','$r_va','$lr_sph','$lr_cyl','$lr_axis','$lr_va','$rr_sph','$rr_cyl','$rr_axis','$rr_va','0','$lense')"))
                                    echo "<div class='confirmation-box round'>[ $name ] Customer Details Added !</div>";
                                else
                                    echo "<div class='error-box round'>Problem in Adding !</div>";

                            }
                        }
                    }

                    ?>

                    <form name="form1" method="post" id="form1" action="" onsubmit="return validate()">

                        <p><strong>Add Customer Details </strong> - Add New ( Control +A)</p>
                        <table class="form" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <!-- <td><span class="man">*</span>CustomerNo:</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="cno" placeholder="CUSTOMER NUMBER" maxlength="10" id="cno" class="round default-width-input" value="<?php echo isset($cno) ? $cno: ''; ?>"></td>
 -->
                                
                            </td>
                            </tr>

                            <tr>
                                <td><span class="man">*</span>Name:</td>
                                <td><input name="name" placeholder="ENTER YOUR FULL NAME" type="text" id="name"
                                           maxlength="200" class="round default-width-input" onkeypress="return lettersOnly(event)"
                                           value="<?php echo isset($name) ? $name : ''; ?>"/></td>
                                <td><b><span class="man">*</span></b><b>Contact</b><b>-1</b></td>
                                <td><input name="contact1" placeholder="ENTER YOUR CONTACT1" type="text"
                                           id="buyingrate" maxlength="20" class="round default-width-input" onkeypress="return numbersonly(event)"
                                           value="<?php echo isset($contact1) ? $contact1 : ''; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Address:</b></td>
                                <td><textarea name="address" placeholder="ENTER YOUR ADDRESS" cols="15"
                                              class="round full-width-textarea"><?php echo isset($address) ? $address : ''; ?></textarea>
                                </td>
                                <td><b>Contact</b><b>-2</b></td>
                                <td><input name="contact2" placeholder="ENTER YOUR CONTACT2" type="text"
                                           id="sellingrate" maxlength="20" class="round default-width-input" onkeypress="return numbersonly(event)"
                                           value="<?php echo isset($contact2) ? $contact2 : ''; ?>"/></td>

                                           <td>Date of Birth:</td>
                                <td>
                                    <input type="date" name="dob" id="dob" style="height: 30px; width: 99%;font-size: 15px;" class="round default-width-input"
                                value="<?php date_default_timezone_set("Asia/Kolkata"); echo isset($dob)? $dob:''?>" ></td>
                                <!-- <input name="date" id="test1" placeholder="" value="<?php date_default_timezone_set("Asia/Kolkata");echo date('Y-m-d'); echo isset($dob)? $dob: ''?>" type="date" id="name" class="round default-width-input" maxlength="200" > -->
                            </tr>   

                           <!-- <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RIGHT EYE</td>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEFT EYE</td>
                                
                            </tr>

                           <tr>
                                <td><b>Distance</b></td>
                                <td> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="l_sph" placeholder="SPH" size="2">
                                    <input type="text" name="l_cyl" placeholder="CYL" size="2">
                                    <input type="text" name="l_axis" placeholder="AXIS" size="2">
                                    <input type="text" name="l_va" placeholder="V/A" size="2">
                                </td>

                                <td><b>Distance</b></td>
                                <td> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="r_sph" placeholder="SPH" size="2">
                                    <input type="text" name="r_cyl" placeholder="CYL" size="2">
                                    <input type="text" name="r_axis" placeholder="AXIS" size="2">
                                    <input type="text" name="r_va" placeholder="V/A" size="2">
                                </td>
                                <td>
                                    <b>Lense Type:</b> 
                                </td>
                                <td>                                                                    
                                    <select name="op1" style="font-size: 15px;">
                                        <option value="select">Please Select Lense Type</option>
                                        <option value="Bifocal">BIFOCAL</option>
                                        <option value="Kryptok">KRYPTOK</option>
                                        <option value="Executive">EXECUTIVE</option>
                                        <option value="D">D</option>
                                        <option value="Progressive">PROGRESSIVE</option>
                                        <option value="Transition">TRANSITION</option>
                                        <option value="Photo chromatic">PHOTO CHROMATIC</option>
                                        <option value="Single vision">SINGLE VISION</option>
                                        <option value="None">None of them</option>
                                    </select>
                                </td>

                            </tr>

                            <tr>                        
                                <td><b>Near</b></td>
                                <td> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lr_sph" placeholder="SPH" size="2">
                                    <input type="text" name="lr_cyl" placeholder="CYL" size="2">
                                    <input type="text" name="lr_axis" placeholder="AXIS" size="2">
                                    <input type="text" name="lr_va" placeholder="V/A" size="2">
                                </td>

                                <td><b>Near</b></td>
                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rr_sph" placeholder="SPH" size="2">
                                    <input type="text" name="rr_cyl" placeholder="CYL" size="2">
                                    <input type="text" name="rr_axis" placeholder="AXIS" size="2">
                                    <input type="text" name="rr_va" placeholder="V/A" size="2">
                                </td></tr> -->

                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <input class="button round blue image-right ic-add text-upper" type="submit"
                                           name="Submit" value="Add">
                                    (Control + S)
                                <td>
                                    &nbsp;
                                </td>
                                <td align="right"><input class="button round red text-upper" type="reset" name="Reset"
                                                         value="Reset"></td>
                            </tr>
                        </table>
                    </form>


                </div>
                <!-- end content-module-main -->


            </div>
            <!-- end content-module -->


        </div>
        <!-- end full-width -->

    </div>
    <!-- end content -->


    <!-- FOOTER -->
    <div id="footer">
       <p>Copyrights 2021 © Quik Tech Softwares. All Rights Reserved.
    </p>

    </div>
    <!-- end footer -->

</body>
</html>