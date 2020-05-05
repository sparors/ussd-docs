@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">
                Peace-of-mind from <br>prototype to production
            </h1>

            <p class="text-lg">
                Build rich, interactive ussd applications quickly, with less code and fewer moving parts. Join our growing community of developers using Laravel Ussd to craft ussd applications for fun or at scale.
                <!-- Laravel Ussd is a package for building Ussd (Unstructured Supplementary Service Data) applications with laravel. Focus on your logic, we take care of the hassle. -->
            </p>

            <div class="flex my-10">
                <a href="{{ $page->production ? '/ussd-docs' : '' }}/docs/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>

                <a href="https://sparors.github.io" title="Laravel Ussd by Sparors" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6">About Sparors</a>
            </div>
        </div>

        <img src="{{ $page->production ? '/ussd-docs' : '' }}/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="{{ $page->production ? '/ussd-docs' : '' }}/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">

            <h3 id="intro-cache" class="text-2xl text-blue-900 mb-0">Save data with <br>Laravel's Cache store </h3>

            <p>Laravel provides an expressive, unified API for various caching backends. We make it painless to fully utilize it in your application with a few lines of code.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="{{ $page->production ? '/ussd-docs' : '' }}/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

            <h3 id="intro-artisan" class="text-2xl text-blue-900 mb-0">Use Artisan for <br>creating ussd states </h3>

            <p>Artisan is the command-line interface included with Laravel. We bootstrap your state snippets while you write more code with fewer keystrokes.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <img src="{{ $page->production ? '/ussd-docs' : '' }}/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">

            <h3 id="intro-ussd" class="text-2xl text-blue-900 mb-0">Simple and Fluent <br>API for creating ussds </h3>

            <p>Focus on writing your applications without needing to reinvent the wheel. We provide you with an elegant API around Laravel for 80% use case. </p>
        </div>
    </div>
</section>
@endsection
