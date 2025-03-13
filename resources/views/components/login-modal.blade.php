<div id="loginModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
  <!-- Transparent overlay with increased opacity and blur effect -->
  <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm"></div>
  <!-- Modal box with increased rounding via "rounded-xl" -->
  <div class="relative bg-black bg-opacity-40 rounded-xl shadow-lg max-w-md w-full p-6 z-10">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-bold text-white">Login</h3>
      <button id="closeLoginModal" class="text-gray-300 text-2xl">&times;</button>
    </div>
    <form>
      <div class="mb-4">
        <label for="user_username" class="block text-gray-200 mb-1">Username</label>
        <input id="user_username" name="user_username" type="text" class="w-full border border-gray-400 rounded px-3 py-2 bg-transparent text-white" placeholder="Username">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-200 mb-1">Password</label>
        <input id="password" name="user_password" type="password" class="w-full border border-gray-400 rounded px-3 py-2 bg-transparent text-white" placeholder="Password">
      </div>
      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
    </form>
  </div>
</div>
