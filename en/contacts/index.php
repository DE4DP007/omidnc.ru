<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contacts");
?>

<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/head1.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </h1>

        <ol class="breadcrumb">
            <li><a href="index.html">Main</a>
            </li>
            <li class="active">Contacts</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!-- Content Row -->
<div class="row">
    <!-- Map Column -->
    <div class="col-md-8">
        <?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view", 
	"omimap", 
	array(
		"KEY" => "ABQIAAAAOSNukcWVjXaGbDo6npRDcxS1yLxjXbTnpHav15fICwCqFS-qhhSby0EyD6rK_qL4vuBSKpeCz5cOjw",
		"INIT_MAP_TYPE" => "HYBRID",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:42.987339229133;s:10:\"google_lon\";d:47.489977159118;s:12:\"google_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:110:\"Department of Mathematics and Computer Science ###RN###Dagestan Scientific Center, Russian Academy of Sciences\";s:3:\"LON\";d:47.489647865295;s:3:\"LAT\";d:42.987823042568;}}}",
		"MAP_WIDTH" => "600",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(
			0 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => "",
		"COMPONENT_TEMPLATE" => "omimap"
	),
	false
);?>
        <!-- Embedded Google Map
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
        -->
    </div>

    <!-- Contact Details Column -->
    <div class="col-md-4">
        <h3>
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/head.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </h3>
        <p>
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/adress.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </p>
        <p><i class="fa fa-phone"></i>
            <abbr title="Phone"><b>Phone number</b></abbr>:
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/phone.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </p>
        <p><i class="fa fa-envelope-o"></i>
            <abbr title="Email"><b>Email</b></abbr>:
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/email.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </p>
        <p><i class="fa fa-clock-o"></i>
            <abbr title="Hours"><b>Working hours</b></abbr>:
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/contacts/time.php",
                Array(),
                Array("MODE"=>"html")
            );?>
        </p>

        <?//============= MAKE A COMPONENT! ==============?>
        <ul class="list-unstyled list-inline list-social-icons text-center">
            <li>
                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
            </li>
        </ul>
        <?//============= MAKE A COMPONENT! ==============?>

    </div>


</div>
<!-- /.row -->

<br><hr>

<!-- Contact Form -->
<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<div class="text-center contact-form omi-card omi-card-shadowed">
    <div class="col-md-10 col-sm-12" id="contactform">
        <h3>Contact us</h3>
        <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Your Name (full name):</label>
                    <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Phone number:</label>
                    <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Email:</label>
                    <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Message:</label>
                    <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary btn-lg">
                <span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Send
            </button>
        </form>
    </div>
</div>





<!-- Contact Form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="<?=SITE_TEMPLATE_PATH?>/js/jqBootstrapValidation.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/contact_me.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>