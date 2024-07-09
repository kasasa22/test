<x-layout bodyClass="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-navbars.navs.guest signup='register' signin='login'></x-navbars.navs.guest>
            </div>
        </div>
    </div>
    <div class="page-header justify-content-center min-vh-100"
        style="background-image: url('myImage.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <h1 class="text-light text-center">Welcome to the Math Quest Challenge System.</h1>
        </div>
    </div>
        <x-footers.guest></x-footers.guest>
</x-layout>
