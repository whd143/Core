<?php include "include/header.inc.php"; ?>

<style type="text/css">
    .m-stopng{
        width:99%;
        background:#eeeeee;
        border:1px solid #cdcdcd;
        padding: 10px 10px 10px 2px;
        overflow: hidden;
        margin-left:0;
    }
    .seo h1{
        color: #555555;
        font-size: 14px;
        font-weight: bold;
        padding: 10px 0;
        text-shadow: 0 1px 0 #FFFFFF;
    }
    .seo textarea{
        float: left;
        height: 200px;
        width: 43%;
    }

    .seo textarea+textarea{
        float: right;
    }

    .seo input[type="submit"]{
        width:100px;
        background:#894013;
        margin:20px 0;
        padding:10px 0;
        color:#fff;
        border:0;
        border-radius:10px;
        width:200px;
    }
    .seo input[type="submit"]:hover{
        opacity:0.8;
    }
    .m-stopng li{
        float: left;
        width: 48%;
        list-style-type: none;
        background: #fff;
        margin-top: 2px;
        margin-left: 10px;
        padding: 5px;
    }
    .m-stopng li a{
        float: left;
        cursor: pointer;
        padding: 2px 0px 0px 35px;
        font-size: 14px;
        text-decoration: none;
        color: #666;
        font-family:Arial, Helvetica, sans-serif;
        font-weight:normal;
        width:100%;
    }
    .m-first{
        background:url(images/m_slider.png) no-repeat left center;
        line-height: 20px;
    }
    .m-first:hover {
        background:url(images/m_slider_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-second{
        background:url(images/m_page.png) no-repeat left center;
        line-height: 20px;
    }
    .m-second:hover {
        background:url(images/m_page_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-therd{
        background:url(images/m_services.png) no-repeat left center;
        line-height: 20px;
    }
    .m-therd:hover {
        background:url(images/m_services_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-fourth{
        background:url(images/m_folio.png) no-repeat left center;
        line-height: 20px;
    }
    .m-fourth:hover {
        background:url(images/m_folio_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-fifth{
        background:url(images/m_product.png) no-repeat left center;
        line-height: 20px;
    }
    .m-fifth:hover {
        background:url(images/m_product_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-sixth{
        background:url(images/m_links.png) no-repeat left center;
        line-height: 20px;
    }
    .m-sixth:hover {
        background:url(images/m_links_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-seventh{
        background:url(images/m_contact.png) no-repeat left center;
        line-height: 20px;
    }
    .m-seventh:hover {
        background:url(images/m_contact_hover.png) no-repeat left center;
        color: #894013;
    }
    .m-eight{
        background:url(images/m_member.png) no-repeat left center;
        line-height: 20px;
    }
    .m-eight:hover {
        background:url(images/m_member_hover.png) no-repeat left center;
        color: #894013;
    }
</style>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="panel">
                    <div class="panel-header">Welcome to Stopng.com</div>
                    <div class="panel-content">
                        <p>
                            You can manage you website contents here
                        </p>
                        <ul class="m-stopng">
                            <li><a href="slider.php" class="m-first">Slider</a></li>
                            <li><a href="pages.php" class="m-second">Pages</a></li>
                            <li><a href="view_products.php" class="m-fourth">Gallery</a></li>
                            <li><a href="social.php" class="m-sixth">Social links</a></li>
                            <li><a href="contact.php" class="m-seventh">Contact us</a></li>
                            <li><a href="reg-members.php" class="m-eight">Members</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include("include/footer.inc.php"); ?>




