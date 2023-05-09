<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>新的使用者註冊啦～～～</title>
</head>
<body>
<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <main class="mt-8">
        <h2 class="text-gray-700 dark:text-gray-200">新的使用者註冊啦～～～</h2>

        <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
            歡迎 {{$user->name}} 加入！ 趕快去關心一下人家吧！
        </p>

        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Thanks, <br>
        </p>

{{--        <a href="http://localhost:8000/login">--}}
{{--            <button class="px-6 py-2 mt-8 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">--}}
{{--                Login--}}
{{--            </button>--}}
{{--        </a>--}}
    </main>


    <footer class="mt-8">
        <p class="text-gray-500 dark:text-gray-400">
             此為系統自動發出信件，如有任何問題請勿回覆。
        </p>

    </footer>
</section>
</body>
</html>
