<?php
require_once 'layouts/head.php';
// шаблон регистрации
if(isset($_SESSION['user'])){
    header('Location: /profile');
}
?>
<!-- component -->
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center ">
        <div class="bg-white px-6 py-3 rounded shadow-md text-black ">
            <form action="/signup" method="post">
                <h1 class="mb-4 text-3xl text-center">Register</h1>
                <input
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mb-2"
                    name="full_name"
                    placeholder="Full Name" />
                <input
                    type="email"
                    class="block border border-grey-light w-full p-3 rounded mb-2"
                    name="email"
                    placeholder="Email" /><p class="text-red-500 text-xs text-1xl  italic p-2">
                    <?php
                    if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                    }
                    ?></p>

                <input type="text" id="tel" name="telephone"  class="block border border-grey-light w-full p-3 rounded mb-2"
                       placeholder="+998(99)-012-34-56" required />
                <p class="text-red-500 text-xs text-1xl  italic p-2">
                    <?php
                    if(isset($_SESSION['telephone'])){
                        echo $_SESSION['telephone'];
                        unset($_SESSION['telephone']);
                    }
                    ?></p>

                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-2"
                    name="password"
                    placeholder="Password" />
                <input
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-2"
                    name="password_confirm"
                    placeholder="Confirm Password" />

                <div class="flex items-center justify-between">
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/">
                        Log in
                    </a>
                </div>

                <p class="text-red-500 text-xs text-2xl  italic p-2">
                    <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </p>
            </form>



            <div class="text-grey-dark mt-6">
                Already have an account?
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/">
                    Log in
                </a>.
            </div>
        </div>
    </div>


    <?php
    require_once 'layouts/footer.php';

    ?>

