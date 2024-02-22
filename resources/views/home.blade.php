<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | @isset($SiteOption)
        {{ $SiteOption[0]->value }}
        @endisset
    </title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('../layouts/navbar')
    <!--  Banner Hero-->
    <div class="hero min-h-screen backdrop-brightness-50" style="background-image: url('./image/man-gym-workout-dumbbells-1109.jpg');">
        <div class=""></div>
        <div class="hero-content text-center text-neutral-content backdrop-brightness-50 px-30 py-15 rounded-md">
            <div class="max-w-lg">
                <h1 class="mb-5 text-orange-400 text-lg font-bold">Welcome To Our Fitness Factory! </h1>
                <p class="mb-5 text-4xl font-bold text-white leading-tight">Build Your Body Transform Your Life
                </p>
                @auth
                <a href="{{ route('user.dashboard')}}"><button class="btn btn-primary">Dashboard</button></a>
                @else
                <a href="{{ route('login')}}"><button class="bg-white hover:bg-orange-500 ease-in duration-300 text-black px-7 py-3 rounded-md">Get Started</button></a>
                @endauth
            </div>
        </div>
    </div>
    <!--  Banner Hero-->
    <!-- Work process -->
    <section class="work-process padd">
        <div class="">
            <div class="works-header">
                <h2> Our <span class="text-orange-500">Services</span></h2>
                <p>Let's take a look at our services. </p>
            </div>
            <div class="works">
                <div class="single-work">
                    <img src="./image/Strength Training1.png" alt="">
                    <h3>Strength Training </h3>
                    <p>This includes free weights, weight machines, and resistance training equipment to help build muscle strength.</p>
                </div>
                <div class="single-work">
                    <img src="./image/Functional Training2.png" alt="">
                    <h3>Functional Training </h3>
                    <p>Some fitness centers have dedicated spaces for functional training exercises, such as TRX suspension training, kettlebell workouts, and agility drills.</p>
                </div>
                <div class="single-work">
                    <img src="./image/Sports Facilities3.png" alt="">
                    <h3>Sports Facilities </h3>
                    <p>We provide Some fitness centers include facilities for sports like basketball, racquet sports (tennis, squash), or indoor soccer.

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Work process -->
    <!-- Work out process -->
    <section class="workout-process padd">
        <div class="container">
            <div class="works-header">
                <h2>Our <span class="text-orange-500">Workouts</span>
                </h2>
                <p>Practice with our high quality equipments. </p>
            </div>
            <div class="work-outs">
                <div class="work-outs-show">
                    <img src="./image/1.jpg" alt="">
                    <h3>Burpees</h3>
                </div>
                <div class="work-outs-show">
                    <img src="./image/2.jpg" alt="">
                    <h3>Jumping Jack</h3>
                </div>
                <div class="work-outs-show">
                    <img src="./image/3.jpg" alt="">
                    <h3>Front Squat
                    </h3>
                </div>
                <div class="work-outs-show">
                    <img src="./image/4.jpg" alt="">
                    <h3>Incline Bench Press
                    </h3>
                </div>
                <div class="work-outs-show">
                    <img src="./image/5.jpg" alt="">
                    <h3>Push Up</h3>
                </div>
                <div class="work-outs-show">
                    <img src="./image/6.jpg" alt="">
                    <h3>Reverse Lunge</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Work out process -->
    <!-- Members -->
    <section class="work-process padd">
        <div class="">
            <div class="works-header">
                <h2>Customer <span class="text-orange-500">Review</span></h2>
                <p>Lets our customer gives us Performance </p>
            </div>
            <div class="works">
                <div class="single-work">
                    <img src="./image/r1.jpg" alt="">
                    <h3>Sarah Thompson </h3>
                    <p> The personalized workout plans have transformed my fitness journey. Highly recommend!</p>
                </div>
                <div class="single-work">
                    <img src="./image/r2.jpg" alt="">
                    <h3>Alex Rodriguez </h3>
                    <p>Great Variety of Classes and Atmosphere! I love the diverse range of fitness classes offered at FlexFit Gym.</p>
                </div>
                <div class="single-work">
                    <img src="./image/r3.jpg" alt="">
                    <h3>Emily Johnson </h3>
                    <p>Results-Driven and Friendly Environment! Joining PowerPulse Fitness was one of the best decisions I made.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Members -->

    <!-- Footer -->
    @include('../layouts/footer')