<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>TailAdmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    @include('components.admin.sidebar')
    <div class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <button class="text-gray-600 mr-4">
                    <i class="fas fa-bars"></i>
                </button>
                <input class="bg-gray-200 rounded-full px-4 py-2 w-64" placeholder="Search or type command..." type="text"/>
            </div>
            <div class="flex items-center">
                <button class="text-gray-600 mr-4">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="text-gray-600 mr-4">
                    <i class="fas fa-bell"></i>
                </button>
                <img alt="User Avatar" class="rounded-full" height="32" src="https://placehold.co/32x32" width="32"/>
                <span class="ml-2">Musharof</span>
            </div>
        </div>
        <!-- Dashboard content area -->
        @yield('content')
    </div>
</div>
</body>
</html>