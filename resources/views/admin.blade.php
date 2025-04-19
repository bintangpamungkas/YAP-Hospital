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
    <div id="sidebar" class="w-64 transition-transform duration-300 ease-in-out transform translate-x-0">
        @include('components.admin.sidebar')
    </div>
    <div class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <button id="toggleButton" onclick="toggleSidebar()" class="text-gray-600 mr-4 transition-transform duration-300 ease-in-out">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- <input class="bg-gray-200 rounded-full px-4 py-2 w-64" placeholder="Search or type command..." type="text"/> -->
            </div>
            <div class="flex items-center">
                <!-- <button class="text-gray-600 mr-4">
                    <i class="fas fa-moon"></i>
                </button> -->
                <!-- <button class="text-gray-600 mr-4">
                    <i class="fas fa-bell"></i>
                </button> -->
                <img alt="User Avatar" class="rounded-full" height="32" src="https://placehold.co/32x32" width="32"/>
                <div class="relative inline-block group">
                    <span class="cursor-pointer">&nbsp;&nbsp;Musharof</span>
                    <div class="absolute right-0 top-full mt-1 w-40 bg-white rounded shadow-lg opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all">
                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard content area -->
        @yield('content')
    </div>
</div>
<script>
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var toggleButton = document.getElementById('toggleButton');

    if (sidebar.classList.contains('-translate-x-full')) {
      sidebar.classList.remove('-translate-x-full');
      sidebar.classList.add('translate-x-0');
      toggleButton.style.transform = "translateX(0)";
    } else {
      sidebar.classList.remove('translate-x-0');
      sidebar.classList.add('-translate-x-full');
      toggleButton.style.transform = "translateX(-16rem)";
    }
  }
</script>
</body>
</html>