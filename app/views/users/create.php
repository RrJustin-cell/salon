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

    /* === Animated Violet-Orange Gradient Background === */
    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background: linear-gradient(-45deg, #a855f7, #fb923c, #7c3aed, #f97316);
      background-size: 400% 400%;
      animation: gradientMove 10s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* === Hide old images & leaves === */
    section .bg,
    section .trees,
    .leaves {
      display: none;
    }

    /* === Glassmorphism Form === */
    .login {
      position: relative;
      padding: 60px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
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
      color: #6d28d9;
      margin-bottom: 10px;
    }

    /* === Input Fields === */
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
      color: #6d28d9;
    }

    /* === Button === */
    .login .inputBox #btn {
      width: 100%;
      padding: 15px;
      border: none;
      outline: none;
      background: linear-gradient(135deg, #7c3aed, #f97316);
      color: #fff;
      cursor: pointer;
      font-size: 1.25em;
      font-weight: 500;
      border-radius: 5px;
      transition: 0.4s;
    }

    .login .inputBox #btn:hover {
      background: linear-gradient(135deg, #5b21b6, #ea580c);
      transform: scale(1.02);
    }

    /* === Text Links === */
    .group {
      text-align: center;
    }

    .group a {
      font-size: 1em;
      color: #5b21b6;
      font-weight: 500;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }

    /* === Error Box === */
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

    /* === Eye Icon === */
    .fa-eye, .fa-eye-slash {
      color: #6d28d9;
    }
  </style>
</head>
<body>
  <section>
    <!-- Create Form -->
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
          <i class="fa-solid fa-eye" id="togglePassword"
            style="position: absolute; right: 15px; top: 35%; transform: translateY(-50%); cursor: pointer;"></i>
        </div>

        <!-- Confirm Password -->
        <div style="position: relative;">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required
            style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"
            style="position: absolute; right: 15px; top: 35%; transform: translateY(-50%); cursor: pointer;"></i>
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
