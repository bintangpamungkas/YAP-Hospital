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
                <div class="flex items-center" onclick="toggleUserDropdown()">
                    <img alt="User Avatar" class="rounded-full" height="40" src="https://placehold.co/40" width="40"/>
                    <div class="relative inline-block">
                        <!-- Replace static label with dynamic container -->
                        <span id="userTrigger" class="cursor-pointer">
                            &nbsp;&nbsp;<span id="userNameDisplay">Loading...</span>
                        </span>
                        <div id="userDropdown" class="absolute right-0 top-full mt-5 w-72 bg-white rounded shadow-lg opacity-0 invisible pointer-events-none transition-all duration-300 ease-in-out">
                            <div class="px-4 py-2 border-b border-gray-200">
                                <div class="font-bold text-gray-800" id="userFullName">Loading...</div>
                                <div class="text-sm text-gray-500" id="userEmailDisplay">Loading...</div>
                            </div>
                            <a href="{{ route('admin.profile') }}" class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100"></a>
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"/>
                                </svg>
                                Profile
                            </a>
                            <div class="border-t border-gray-200 my-0"></div>
                            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"/>
                                    </svg>
                                    Logout
                                </button>
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
    if (dropdown.classList.contains('opacity-0')) {
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