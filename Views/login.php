<?php
require_once 'layouts/head.php';

if(isset($_SESSION['user'])){
    header('Location: /');
}
?>


    <div   class="body grid justify-center global align-content"  >
        <div class="w-full max-w-xs">
            <form  action="/signin" method="post"  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <p class="text-green-500 text-xs text-2xl  italic p-2"><?php
                    if(isset($_SESSION['index'])){
                        echo $_SESSION['index'];
                        unset($_SESSION['index']);
                    }
                    ?></p>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="email" placeholder="email" name="email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none  border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
                    <p class="text-red-500 text-xs text-1xl  italic p-2"><?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?></p>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/register">
                        register
                    </a>
                </div>
                <div class="text-grey-dark mt-6">
                    you don't have an account ?
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/register">
                        register
                    </a>.
                </div>
            </form>
        </div>
    </div>

<?php
require_once 'layouts/footer.php';

?>