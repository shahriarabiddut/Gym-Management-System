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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        section {
            max-width: 600px;
            margin: 2em auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 0.5em 1em;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 600px) {
            section {
                margin: 1em;
            }
        }
    </style>
</head>

<body>
    @include('../layouts/navbar')

    <!--  Banner Hero-->
    <div class="about-hero bg-no-repeat	bg-cover" style="background-image: url({{asset('../image/about2.jpg')}});">
        <div class=""></div>
        <div class=" about-hero-content text-center text-neutral-content">
            <div class=" mx-auto">
                <h1 class="mb-5 text-7xl font-semibold text-orange-600">Contact Us
                </h1>
            </div>
        </div>

    </div>
    <!--  Banner Hero-->
    <section>
        <!-- Session Messages Starts -->
        @if(Session::has('success'))
        <div class="p-3 mb-2 bg-success text-white">
            <p>{{ session('success') }} </p>
        </div>
        @endif
        @if(Session::has('danger'))
        <div class="p-3 mb-2 bg-danger text-white">
            <p>{{ session('danger') }} </p>
        </div>
        @endif
        <!-- Session Messages Ends -->
        <form action="{{route('contact.store')}}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </section>

    <!-- Footer -->
    @include('../layouts/footer')