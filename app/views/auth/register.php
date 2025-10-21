<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Background Gradient using your palette */
    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #F8B195, #F67280, #C06C84, #6C5B7B, #355C7D);
      background-size: 400% 400%;
      animation: gradientMove 10s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Form Container */
    .login {
      background: #ffffff;
      padding: 50px;
      border-radius: 20px;
      width: 450px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #355C7D;
      margin-bottom: 10px;
    }

    .login .inputBox input,
    .login .inputBox select {
      width: 100%;
      padding: 15px 20px;
      outline: none;
      font-size: 1.1em;
      color: #355C7D;
      border-radius: 8px;
      border: 2px solid #C06C84;
      margin-bottom: 18px;
      transition: 0.3s;
    }

    .login .inputBox input:focus {
      border-color: #6C5B7B;
    }

    .login .inputBox ::placeholder {
      color: #999;
    }

    /* Submit Button */
    .login .inputBox #btn {
      width: 100%;
      padding: 14px;
      border: none;
      outline: none;
      background: linear-gradient(135deg, #F67280, #C06C84);
      color: #fff;
      cursor: pointer;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 8px;
      transition: 0.3s;
    }

    .login .inputBox #btn:hover {
      background: linear-gradient(135deg, #C06C84, #6C5B7B);
      transform: translateY(-2px);
    }

    /* Text Links */
    .group {
      text-align: center;
    }

    .group a {
      font-size: 0.95em;
      color: #355C7D;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }

    /* Error Message */
    .error-box {
      background: rgba(255, 0, 0, 0.1);
      color: #d64c42;
      padding: 10px;
      border: 1px solid #f5c2c7;
      border-radius: 6px;
      margin-bottom: 12px;
      text-align: center;
      font-size: 0.9em;
    }

    /* Eye Icon Styling */
    .toggle-eye {
      position: absolute;
      right: 15px;
      top: 35%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6C5B7B;
      font-size: 1.2em;
    }
  </style>
</head>
<body>
  <section>
    <!-- Register Form -->
    <div class="login">
      <h2>Register</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="<?= site_url('auth/register'); ?>" class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <!-- Password field -->
        <div style="position: relative;">
          <input type="password" id="password" name="password" placeholder="Password" required
            style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 8px; border: 2px solid #C06C84; font-size: 1.1em; color: #355C7D;">
          <i class="fa-solid fa-eye toggle-eye" id="togglePassword"></i>
        </div>

        <!-- Confirm Password field -->
        <div style="position: relative;">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required
            style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 8px; border: 2px solid #C06C84; font-size: 1.1em; color: #355C7D;">
          <i class="fa-solid fa-eye toggle-eye" id="toggleConfirmPassword"></i>
        </div>

        <button type="submit" id="btn">Register</button>
      </form>

      <div class="group">
        <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
      </div>
    </div>
  </section>

  <script>
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
  </script>
</body>
</html>
