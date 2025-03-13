document.addEventListener('DOMContentLoaded', function() {
  const loginModal = document.getElementById('loginModal');
  const openLoginModalBtn = document.getElementById('openLoginModal'); // Button to trigger modal
  const closeLoginModalBtn = document.getElementById('closeLoginModal');

  if (openLoginModalBtn) {
    openLoginModalBtn.addEventListener('click', function() {
      loginModal.classList.remove('hidden');
    });
  }

  if (closeLoginModalBtn) {
    closeLoginModalBtn.addEventListener('click', function() {
      loginModal.classList.add('hidden');
    });
  }
  
  // Optional: close modal when clicking outside the modal box
  loginModal.addEventListener('click', function(e) {
    if (e.target === loginModal) {
      loginModal.classList.add('hidden');
    }
  });
});
