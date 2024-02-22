<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | @isset($SiteOption)
        {{ $SiteOption[0]->value }}
        @endisset
    </title>
    <script defer src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('../layouts/navbar')

    <!--  Banner Hero-->
    <div class="about-hero bg-no-repeat	bg-cover" style="background-image: url({{asset('../image/about2.jpg')}});">
        <div class=""></div>
        <div class=" about-hero-content text-center text-neutral-content">
            <div class=" mx-auto">
                <h1 class="mb-5 text-7xl font-semibold text-orange-600">WE ARE GYM AND FITNESS
                </h1>
            </div>
        </div>

    </div>
    <!--  Banner Hero-->
    <!-- Work process -->
    <section class="about padd">
        <div class="container">
            <div class="about-content">
                <h3 class="about-title text-center font-semibold"> <span>About</span> Us</h3>
                <p>A well-equipped gym managed by a well-qualified instructor with experienced trainers.Located in the heart of
                    Galle Town. We have recieved positive comments from almost all our customers.it is specially recommended for
                    women looking for a decent place for physical personal trainings, to maintain fitness and good health.</p>
            </div>
            <div class="about-content-wrapper">
                <div>
                    <h3 class="about-content-title"> Our Mission</h3>
                    <p class="about-text ">
                        Fitness Factory is a gym. Don’t let that word “gym” scare you because we’re redefining that term. Fitness
                        Factory, today’s gym, is a place where ambitious, motivated individuals work to reach their goals and is an
                        intelligent approach to fitness. Here, you will become better at whatever it is you do. We welcome you to
                        Fitness Factory.
                    </p>
                </div>
                <div>
                    <h3 class="about-content-title">Our Vision</h3>
                    <p class="about-text	">
                        At Fitness Factory, members who actively and regularly participate in our health and wellness programs will
                        experience improvements in physical well-being as well as joy and contentment.Members will be leaders in
                        creating lasting and meaningful relationships that promote total well-being and care for self and others.
                    </p>
                </div>
            </div>
            <div>

            </div>
        </div>
    </section>
    <!-- Work process -->
    <!-- our People -->
    <section class="about-people padd">
        <div class="container">
            <div class="about-people-content">
                <h2 class="about-title text-center font-semibold">OUR ACTIVE <span>PEOPLE</span></h2>
                <p class="about-people-text">Gym and Fitness is powered by a vibrant team of over 50 extraordinary individuals -
                    our success springs from their collective efforts!
                </p>
            </div>
            <div class="about-people-cards">
                <div class="people-card">
                    <div class="people-card-img">
                        <img src="./image/r1.jpg" alt="">
                    </div>
                    <h4>Sarah Thompson</h4>
                </div>
                <div class="people-card">
                    <div class="people-card-img">
                        <img src="./image/r2.jpg" alt="">
                    </div>
                    <h4>Alex Rodriguez</h4>
                </div>
                <div class="people-card">
                    <div class="people-card-img">
                        <img src="./image/r3.jpg" alt="">
                    </div>
                    <h4>Emily Johnson</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- our People -->

    <!-- Footer -->
    @include('../layouts/footer')