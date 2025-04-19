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
    <!-- Make sidebar fixed -->
    <div id="sidebar" class="fixed left-0 top-0 h-screen w-64 transition-transform duration-300 ease-in-out transform translate-x-0">
        @include('components.admin.sidebar')
    </div>
    <!-- Add transition classes to main content -->
    <div id="mainContent" class="flex-1 ml-64 transition-all duration-300 ease-in-out">
        <!-- Header as a separate container with transition -->
        <div id="headerContainer" class="p-6 bg-gray-200 transition-all duration-300 ease-in-out">
            <div class="flex justify-between items-center mb-0 w-full">
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
        </div>
        <!-- Dashboard content area remains unchanged -->
        <div class="p-6">
            @yield('content')
        </div>
    </div>
</div>
<script>
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var mainContent = document.getElementById('mainContent');

    if (sidebar.classList.contains('-translate-x-full')) {
      // Show sidebar: add left margin back to main content
      sidebar.classList.remove('-translate-x-full');
      mainContent.classList.add('ml-64');
    } else {
      // Hide sidebar: remove left margin for full width
      sidebar.classList.add('-translate-x-full');
      mainContent.classList.remove('ml-64');
    }
  }
</script>
</body>
</html>