@include('inchead')

<body>
    @include('incnavebar')
    
  
    <section class="contact-section section_padding">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-5">

                    <div class="section_tittle text-center">

                        <!-- <p>popular courses</p> -->

                        <h2> Contact Us</h2>

                    </div>

                </div>

            </div>
            <div class="d-none d-sm-block mb-5 pb-4">
                    
                <!-- <script src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.79401332953!2d80.55639931477488!3d7.264267994756512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36938aa313607%3A0x6623a95311fca052!2sBuiltapps%20Business%20Solutions!5e0!3m2!1sen!2slk!4v1576144841222!5m2!1sen!2slk"></script> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3511631664473!2d80.9102687147765!3d7.536625694564419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4af9ad88913df%3A0x35f36ace61338bfe!2sCreed%20Solution!5e0!3m2!1sen!2slk!4v1626875484228!5m2!1sen!2slk"
                    width="100%" height="480px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                   
                </div>
                <div class="col-lg-8">
                        <label for="">If you have any inquiry about our courses or the subscription please use the this form and we will get back to you via email or over the phone.</label>
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder='Enter Message'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>xxxx x xx, Colombo Road,</h3>
                            <p> Kandy, SriLanka</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <!-- <h3>+9477 634 4666</h3> -->
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>info@eexcell.lk</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <!-- footer part start-->

  @include('incfooter')