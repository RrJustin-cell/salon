<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Background Gradient */
    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background: linear-gradient(135deg, #a259ff, #38bdf8);
    }

    /* Hide old design elements */
    section .bg,
    section .trees,
    .leaves {
      display: none;
    }

    /* Form Container */
    .login {
      position: relative;
      padding: 60px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.4);
      border-radius: 20px;
      width: 500px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
      z-index: 200;
    }

    .login h2 {
      text-align: center;
      font-size: 2.5em;
      font-weight: 600;
      color: #4c1d95; /* deep violet */
      margin-bottom: 10px;
    }

    .login .inputBox input,
    .login .inputBox select {
      width: 100%;
      padding: 15px 20px;
      outline: none;
      font-size: 1.1em;
      color: #4c1d95;
      border-radius: 5px;
      background: #fff;
      border: none;
      margin-bottom: 20px;
    }

    .login .inputBox ::placeholder {
      color: #4c1d95;
    }

    /* Button */
    .login .inputBox #btn {
      width: 100%;
      padding: 15px;
      border: none;
      outline: none;
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      color: #fff;
      cursor: pointer;
      font-size: 1.25em;
      font-weight: 500;
      border-radius: 5px;
      transition: 0.4s;
    }

    .login .inputBox #btn:hover {
      background: linear-gradient(135deg, #5b21b6, #0ea5e9);
    }

    /* Error Message */
    .error-box {
      background: rgba(255, 0, 0, 0.1);
      color: #d64c42;
      padding: 12px 16px;
      border: 1px solid #f5c2c7;
      border-radius: 6px;
      margin-bottom: 16px;
      margin-top: 10px;
      text-align: center;
      font-size: 15px;
    }

    /* Eye Icon Styling */
    .toggle-eye {
      position: absolute;
      right: 15px;
      top: 35%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #4c1d95;
      font-size: 1.2em;
    }
  </style>
</head>
<body>
  <section>
    <!-- Create User Form -->
    <div class="login">
      <h2>Create User</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?= site_url('users/create'); ?>" class="inputBox" onsubmit="return validatePasswords()">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <!-- Password -->
        <div style="position: relative;">
          <input type="password" id="password" name="password" placeholder="Password" required
            style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
          <i class="fa-solid fa-eye toggle-eye" id="togglePassword"></i>
        </div>

        <!-- Confirm Password -->
        <div style="position: relative;">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required
            style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
          <i class="fa-solid fa-eye toggle-eye" id="toggleConfirmPassword"></i>
        </div>

        <!-- Role -->
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" id="btn">Create User</button>
      </form>
    </div>
  </section>

  <script>
    // Toggle password visibility
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');

    // Validate password match
    function validatePasswords() {
      const pw = document.getElementById('password').value;
      const cpw = document.getElementById('confirmPassword').value;
      if (pw !== cpw) {
        alert("Passwords do not match!");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
