<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    include('incl/secound_menu.php')
    ?>
    <div class="contact-area mt-4">
        <div class="container">
            <div class="section-title text-center mb-4 ptb-100">
                <h2>Contact Information</h2>
            </div>

            <form id="contactForm">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Your Name *</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Write Your Name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Enter your phone number" required data-error="Please enter your number" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="msg_subject" id="msg_subject" placeholder="Enter your subject" class="form-control" required data-error="Please enter your subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Your Message</label>
                            <textarea name="message" class="form-control" id="message" placeholder="Type your message" cols="30" rows="6" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="send-btn mb-4">
                            <button type="submit" class="default-btn btn btn-success pb-3 pt-3 ps-4 pe-4">Submit Now</button>
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>
<style>
    /*================================================
Contact Form Area CSS
=================================================*/

    .contact-area {
        background-color: #F7F7F7;
    }

    #contactForm {
        max-width: 1050px;
        margin: auto;
    }

    #contactForm .form-group {
        margin-bottom: 25px;
    }

    #contactForm .form-group label {
        display: block;
        margin-bottom: 10px;
        color: var(--black-color);
        font-weight: 500;
        font-size: 15px;
    }

    #contactForm .form-group .form-control {
        height: 55px;
        padding: 15px 20px;
        line-height: initial;
        color: var(--paragraph-color);
        background-color: var(--white-color);
        border: 1px solid #E5E7EC;
        -webkit-box-shadow: -12px 8px 25px rgba(217, 35, 12, 0.03);
        box-shadow: -12px 8px 25px rgba(217, 35, 12, 0.03);
        border-radius: 5px;
        -webkit-transition: var(--transition);
        transition: var(--transition);
        font-size: 15px;
        font-weight: 400;
    }

    #contactForm .form-group .form-control::-webkit-input-placeholder {
        color: var(--paragraph-color);
    }

    #contactForm .form-group .form-control:-ms-input-placeholder {
        color: var(--paragraph-color);
    }

    #contactForm .form-group .form-control::-ms-input-placeholder {
        color: var(--paragraph-color);
    }

    #contactForm .form-group .form-control::placeholder {
        color: var(--paragraph-color);
    }

    #contactForm .form-group .form-control:focus {
        border: 1px solid var(--main-color);
    }

    #contactForm .form-group .form-control:focus::-webkit-input-placeholder {
        color: transparent;
        -webkit-transition: var(--transition);
        transition: var(--transition);
    }

    #contactForm .form-group .form-control:focus:-ms-input-placeholder {
        color: transparent;
        -webkit-transition: var(--transition);
        transition: var(--transition);
    }

    #contactForm .form-group .form-control:focus::-ms-input-placeholder {
        color: transparent;
        -webkit-transition: var(--transition);
        transition: var(--transition);
    }

    #contactForm .form-group .form-control:focus::placeholder {
        color: transparent;
        -webkit-transition: var(--transition);
        transition: var(--transition);
    }

    #contactForm .form-group .form-select {
        height: 55px;
        padding: 15px 20px;
        line-height: initial;
        color: var(--paragraph-color);
        background-color: var(--white-color);
        border: 1px solid #E5E7EC;
        -webkit-box-shadow: -12px 8px 25px rgba(217, 35, 12, 0.03);
        box-shadow: -12px 8px 25px rgba(217, 35, 12, 0.03);
        border-radius: 5px;
        -webkit-transition: var(--transition);
        transition: var(--transition);
        font-size: 15px;
        font-weight: 400;
    }

    #contactForm .form-group .form-select:focus {
        border: 1px solid var(--main-color);
    }

    #contactForm .form-group textarea.form-control {
        min-height: 115px;
    }

    #contactForm .list-unstyled {
        padding: 0;
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }

    #contactForm div#msgSubmit {
        margin-bottom: 0;
    }

    #contactForm .text-danger {
        color: #dc3545 !important;
        font-size: 18px !important;
        margin-bottom: 0 !important;
        margin-top: 15px !important;
    }

    #contactForm .send-btn {
        margin-top: 25px;
    }

    #contactForm .send-btn .default-btn {
        border: none;
    }

    #contactForm .form-cookies-consent {
        margin-bottom: 0;
    }

    #contactForm .form-cookies-consent a {
        color: var(--main-color);
    }

    #contactForm .form-cookies-consent a:hover {
        color: var(--optional-color);
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked,
    #contactForm .form-cookies-consent [type="checkbox"]:not(:checked) {
        display: none;
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked+label,
    #contactForm .form-cookies-consent [type="checkbox"]:not(:checked)+label {
        position: relative;
        padding-left: 25px;
        cursor: pointer;
        display: inline-block;
        margin-bottom: 0;
        color: var(--paragraph-color);
        font-weight: 400;
        font-size: 15px;
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked+label:before,
    #contactForm .form-cookies-consent [type="checkbox"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 15px;
        height: 15px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        border: 1px solid #DDDDDD;
        border-radius: 5px;
        background: var(--white-color);
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked+label:after,
    #contactForm .form-cookies-consent [type="checkbox"]:not(:checked)+label:after {
        content: '';
        width: 5px;
        height: 5px;
        background: var(--main-color);
        position: absolute;
        top: 9.5px;
        left: 5px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        border-radius: 30px;
    }

    #contactForm .form-cookies-consent [type="checkbox"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    #contactForm .form-cookies-consent [type="checkbox"]:hover+label:before {
        border-color: var(--main-color);
    }

    #contactForm .form-cookies-consent [type="checkbox"]:checked+label:before {
        border-color: var(--main-color);
    }

    #contactForm .form-cookies-consent p {
        display: inline-block;
        margin-bottom: 0;
        margin-right: 25px;
    }

    #contactForm .form-cookies-consent p:last-child {
        margin-right: 0;
    }
</style>