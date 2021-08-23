@include('inchead')
<body>
@include('incnavebar')
        <!-- feature_part start-->

    <section class="feature_part single_feature_padding">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-5">

                    <div class="text-center">

                        <!-- <p>popular courses</p> -->

                        <h2> English Everyday</h2>
                        <label for="">Course line up</label>                     

                    </div>

                </div>

            </div>

            <div class="row">
               <div class="col-md-12">
                <label>Eexcel provides innovative ways to master English speaking by guiding through the basics of social language to more advanced usage in social interactions. Our online courses will get you on your way to acquiring the confidence and natural flow to express yourself freely without having to worry about embarrassing and mistakes.
                    Learn from actual conversations in actual situations.
                    Feel confident in understanding and being understood.
                    Sound more natural and avoid mistakes.
                    Learn thousands of words, expressions, idioms commonly used in actual conversations.
                </label>
               </div>
                <!-- <div class="col-sm-6 col-xl-3 align-self-center">

                    <div class="single_feature_text ">

                        <h2>Awesome <br> Feature</h2>

                        <p>Set have great you male grass yielding an yielding first their you're have called the abundantly fruit were man </p>

                        <a href="#" class="btn_1">Read More</a>

                    </div>

                </div> -->
               @foreach ($courses as $course)
                <div class="col-sm-12 col-xl-6">

                    <div class="single_feature">

                        <div class="">

                            {{-- <span class="single_feature_icon"><i class="ti-layers"></i></span> --}}

                            <h4> {{ $course->name }}</h4>

                            <div>{!! $course->description !!}</div>

<h4>
    {{ $course->price }}
</h4>
<a class="btn_1" href="{{$course->link}}">{{ $course->link_text }} </a> 


                        </div>

                    </div>

                </div>
                @endforeach
                 </div>

        </div>

    </section>


    <!-- learning part end-->
@include('incfooter')
