<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Animated Violet–Orange Gradient */
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background: linear-gradient(-45deg, #9d4edd, #ff7e5f, #ffb347, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientMove 10s ease infinite;
    }

    /* Glassmorphism Register Box */
    .login {
      position: relative;
      padding: 60px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 20px;
      width: 460px;
      display: flex;
      flex-direction: column;
      gap: 25px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
      z-index: 10;
      color: #fff;
      transition: 0.3s ease;
    }

    .login:hover {
      transform: translateY(-5px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35);
    }

    .login h2 {
      text-align: center;
      font-size: 2.5em;
      font-weight: 600;
      color: #fff;
      margin-bottom: 5px;
      letter-spacing: 1px;
    }

    /* Input Fields */
    .login .inputBox input,
    .login .inputBox select {
      width: 100%;
      padding: 15px 20px;
      font-size: 1.1em;
      color: #4a148c;
      border-radius: 8px;
      border: none;
      background: rgba(255, 255, 255, 0.9);
      outline: none;
      margin-bottom: 15px;
      transition: all 0.3s ease;
    }

    .login .inputBox input:focus,
    .login .inputBox select:focus {
      box-shadow: 0 0 0 3px rgba(255, 165, 0, 0.4);
      transform: scale(1.02);
    }

    .login .inputBox ::placeholder {
      color: #6a1b9a;
    }

    /* Password fields (positioned icons) */
    .password-wrapper {
      position: relative;
    }

    .password-wrapper input {
      width: 100%;
      padding: 15px 45px 15px 20px;
      border-radius: 8px;
      border: none;
      font-size: 1.1em;
      background: rgba(255, 255, 255, 0.9);
      color: #4a148c;
      outline: none;
    }

    .toggle-eye {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #ff7e5f;
      font-size: 1.2em;
    }

    /* Submit Button */
    .login .inputBox #btn {
      width: 100%;
      padding: 15px;
      border: none;
      background: linear-gradient(135deg, #9d4edd, #ff7e5f);
      color: #fff;
      cursor: pointer;
      font-size: 1.15em;
      font-weight: 500;
      border-radius: 8px;
      transition: 0.3s ease;
    }

    .login .inputBox #btn:hover {
      background: linear-gradient(135deg, #7b2cbf, #ff9966);
      transform: scale(1.03);
    }

    /* Text Links */
    .group {
      text-align: center;
    }

    .group a {
      font-size: 1em;
      color: #fff;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .group a:hover {
      color: #ffe29f;
      text-decoration: underline;
    }

    /* Error Message */
    .error-box {
      background: rgba(255, 0, 0, 0.15);
      color: #ffb4a2;
      padding: 12px 16px;
      border: 1px solid #ff7e5f;
      border-radius: 8px;
      text-align: center;
      font-size: 0.95em;
    }
  </style>
</head>
<body>
  <section>
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

        <div class="password-wrapper">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye toggle-eye" id="togglePassword"></i>
        </div>

        <div class="password-wrapper">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
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
