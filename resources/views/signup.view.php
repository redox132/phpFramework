<?php


use App\Database;

$connected = false;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Create Account</h2>

    <form action="/signup" method="POST" class="space-y-5">
      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name" 
               class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" 
               class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" 
               class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>



       <?php if (isset( $_SESSION['success'])) : ?>
			<p class="text-green-700">Account created successfully. You can now log in.</p>
            <?php 
				unset($_SESSION['success']);
             ?>
        <?php endif ?>

       <?php if (!empty($_SESSION['signupErrors'])) : ?>
          <div class="mb-4 text-red-600 bg-red-100 p-3 rounded">
              <ul class="list-disc pl-5">
                  <?php foreach ($_SESSION['signupErrors'] as $error) : ?>
                      <li><?= htmlspecialchars($error) ?></li>
                  <?php endforeach; ?>
              </ul>
          </div>
          <?php unset($_SESSION['signupErrors']); ?>
      <?php endif; ?>


      <!-- Submit -->
      <button type="submit"
              class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
        Sign Up
      </button>
    </form>

    <p class="text-sm text-center text-gray-600 mt-4">
      Already have an account?
      <a href="/login" class="text-blue-600 hover:underline">Log in</a>
    </p>
  </div>

</body>
</html>
