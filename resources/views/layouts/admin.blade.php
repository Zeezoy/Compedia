<!DOCTYPE html>
<html>
<head>
    <title>Compedia Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#121415] font-sans">
    <div class="flex">
        <aside class="flex flex-col w-80 min-h-screen bg-[#1E2021] text-white px-3 pt-8 pb-12">
            <h1>
                Compedia
            </h1>
            <div class="flex flex-col">
                <button>
                    <a href="">
                        Dashboard
                    </a>
                </button>
                <button>
                    <a href="">
                        Competitions
                    </a>
                </button>
            </div>
            <div>
                <button>
                    <a href="">
                        Logout
                    </a>
                </button>
            </div>
        </aside>

        <main class="flex flex-col gap-12 px-16 py-8">
            @yield('content')
        </main>

    </div>
</body>
</html>