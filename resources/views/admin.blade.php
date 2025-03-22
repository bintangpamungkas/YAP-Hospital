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
    <!-- Sidebar -->
    <div class="bg-white w-64 p-6">
        <div class="flex items-center mb-8">
            <img alt="Logo" class="mr-2" height="32" src="https://placehold.co/32x32" width="32"/>
            <span class="text-xl font-bold">TailAdmin</span>
        </div>
        <nav>
            <ul>
                <li class="mb-4">
                    <a class="flex items-center text-purple-600" href="#">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-user mr-2"></i>
                        <span>User Profile</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-tasks mr-2"></i>
                        <span>Task</span>
                    </a>
                    <ul class="ml-6 mt-2">
                        <li class="mb-2">
                            <a class="flex items-center text-gray-600" href="#">
                                <span>List</span>
                                <span class="ml-auto text-xs text-purple-600">PRO</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-600" href="#">
                                <span>Kanban</span>
                                <span class="ml-auto text-xs text-purple-600">PRO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-file-alt mr-2"></i>
                        <span>Forms</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-table mr-2"></i>
                        <span>Tables</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-file mr-2"></i>
                        <span>Pages</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto">
            <h3 class="text-gray-600 mb-2">SUPPORT</h3>
            <ul>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-comments mr-2"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Main Content -->
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
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Customers Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-2xl text-gray-600 mr-4"></i>
                    <div>
                        <h3 class="text-gray-600">Customers</h3>
                        <h2 class="text-3xl font-bold">3,782</h2>
                        <span class="text-green-500">↑ 11.01%</span>
                    </div>
                </div>
            </div>
            <!-- Orders Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center mb-4">
                    <i class="fas fa-box text-2xl text-gray-600 mr-4"></i>
                    <div>
                        <h3 class="text-gray-600">Orders</h3>
                        <h2 class="text-3xl font-bold">5,359</h2>
                        <span class="text-red-500">↓ 9.05%</span>
                    </div>
                </div>
            </div>
            <!-- Monthly Target Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-4">Monthly Target</h3>
                <div class="flex items-center justify-center mb-4">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full border-8 border-gray-200"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-3xl font-bold">75.55%</span>
                        </div>
                    </div>
                </div>
                <p class="text-center text-gray-600">You earn $3287 today, it's higher than last month. Keep up your good work!</p>
            </div>
        </div>
        <!-- Monthly Sales Chart -->
        <div class="bg-white p-6 rounded-lg shadow mt-6">
            <h3 class="text-gray-600 mb-4">Monthly Sales</h3>
            <img alt="Monthly Sales Chart" class="w-full" height="200" src="https://placehold.co/400x200" width="400"/>
        </div>
        <!-- Statistics -->
        <div class="bg-white p-6 rounded-lg shadow mt-6">
            <h3 class="text-gray-600 mb-4">Statistics</h3>
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h4 class="text-gray-600">Target</h4>
                    <h2 class="text-2xl font-bold">$20K</h2>
                    <span class="text-red-500">↓</span>
                </div>
                <div>
                    <h4 class="text-gray-600">Revenue</h4>
                    <h2 class="text-2xl font-bold">$20K</h2>
                    <span class="text-green-500">↑</span>
                </div>
                <div>
                    <h4 class="text-gray-600">Today</h4>
                    <h2 class="text-2xl font-bold">$20K</h2>
                    <span class="text-green-500">↑</span>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <button class="text-gray-600 mr-4">Overview</button>
                    <button class="text-gray-600 mr-4">Sales</button>
                    <button class="text-gray-600">Revenue</button>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-gray-600 mr-2"></i>
                    <span>Mar 7, 2025 - Mar 13, 2025</span>
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>
</body>
</html>