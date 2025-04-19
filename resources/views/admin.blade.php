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
        <!-- Header as a separate container with dynamic user details -->
        <div id="headerContainer" class="p-6 bg-gray-200 transition-all duration-300 ease-in-out">
            <div class="flex justify-between items-center mb-0 w-full">
                <div class="flex items-center">
                    <button id="toggleButton" onclick="toggleSidebar()" class="text-gray-600 mr-4 transition-transform duration-300 ease-in-out">
                        <i class="fas fa-bars"></i>
                    </button>
                    <!-- <input class="bg-gray-200 rounded-full px-4 py-2 w-64" placeholder="Search or type command..." type="text"/> -->
                </div>
                <div class="flex items-center">
                    <img alt="User Avatar" class="rounded-full" height="32" src="https://placehold.co/32x32" width="32"/>
                    <div class="relative inline-block">
                        <!-- Replace static label with dynamic container -->
                        <span id="userTrigger" onclick="toggleUserDropdown()" class="cursor-pointer">
                            &nbsp;&nbsp;<span id="userNameDisplay">Loading...</span>
                        </span>
                        <div id="userDropdown" class="absolute right-0 top-full mt-1 w-72 bg-white rounded shadow-lg opacity-0 invisible pointer-events-none transition-all duration-300 ease-in-out">
                            <div class="px-4 py-2 border-b border-gray-200">
                                <div class="font-bold text-gray-800" id="userFullName">Loading...</div>
                                <div class="text-sm text-gray-500" id="userEmailDisplay">Loading...</div>
                            </div>
                            <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                            <div class="border-t border-gray-200 my-0"></div>
                            <form action="{{ route('logout') }}" method="POST" class="mb-0">
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
      sidebar.classList.remove('-translate-x-full');
      mainContent.classList.add('ml-64');
    } else {
      sidebar.classList.add('-translate-x-full');
      mainContent.classList.remove('ml-64');
    }
  }

  function toggleUserDropdown() {
    var dropdown = document.getElementById('userDropdown');
    if(dropdown.classList.contains('opacity-0')){
      dropdown.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
      dropdown.classList.add('opacity-100', 'visible', 'pointer-events-auto');
    } else {
      dropdown.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
      dropdown.classList.add('opacity-0', 'invisible', 'pointer-events-none');
    }
  }
  
  // Hide dropdown when clicking outside
  document.addEventListener('click', function(e) {
    var dropdown = document.getElementById('userDropdown');
    var trigger = document.getElementById('userTrigger');
    // If click is outside both the trigger and the dropdown, hide dropdown
    if (!trigger.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
      dropdown.classList.add('opacity-0', 'invisible', 'pointer-events-none');
    }
  });

  // Fetch logged in user details and update header
  document.addEventListener('DOMContentLoaded', function() {
      fetch('/user/details')
          .then(response => response.json())
          .then(data => {
              if (data.user_name) {
                  document.getElementById('userNameDisplay').innerText = data.user_name;
                  // Assuming full name is same as user_name; update if you have a separate field.
                  document.getElementById('userFullName').innerText = data.user_name;
                  document.getElementById('userEmailDisplay').innerText = data.user_email;
              }
          })
          .catch(error => console.error('Error fetching user details:', error));
  });
</script>
</body>
</html>