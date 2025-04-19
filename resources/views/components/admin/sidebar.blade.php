<div class="bg-white w-64 p-6 h-full">
    <div class="flex items-center mb-8">
        <img alt="Logo" class="mr-2" height="32" src="https://placehold.co/32x32" width="32"/>
        <span class="text-xl font-bold">TailAdmin</span>
    </div>
    <nav>
        <ul>
            <li class="mb-4">
                <a class="flex items-center text-gray-600" href="{{ route('admin.training.index') }}">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>
                    <span>Training</span>
                </a>
            </li>
            <li class="mb-4">
                <a class="flex items-center text-gray-600" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users mr-2"></i>
                    <span>Users</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Removed all other menu items -->
</div>
