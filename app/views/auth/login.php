<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Animated Violet-Orange Gradient Background */
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

    /* Glassmorphism Login Box */
    .login {
      position: relative;
      padding: 60px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 20px;
      width: 450px;
      display: flex;
      flex-direction: column;
      gap: 30px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
      color: #fff;
      z-index: 10;
      transition: 0.4s ease;
    }

    .login:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    }

    .login h2 {
      text-align: center;
      font-size: 2.5em;
      font-weight: 600;
      color: #fff;
      letter-spacing: 1px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input {
      width: 100%;
      padding: 15px 45px 15px 20px;
      font-size: 1.1em;
      color: #4a148c;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.9);
      border: none;
      outline: none;
      transition: box-shadow 0.3s ease, transform 0.2s;
    }

    .inputBox input:focus {
      box-shadow: 0 0 0 3px rgba(255, 165, 0, 0.4);
      transform: scale(1.02);
    }

    .inputBox ::placeholder {
      color: #6a1b9a;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #ff7e5f;
    }

    /* Button */
    .login button {
      width: 100%;
      padding: 15px;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      color: #fff;
      background: linear-gradient(135deg, #9d4edd, #ff7e5f);
      transition: all 0.3s ease;
    }

    .login button:hover {
      background: linear-gradient(135deg, #7b2cbf, #ff9966);
      transform: scale(1.03);
    }

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

    /* Error box */
    .error-box {
      background: rgba(255, 0, 0, 0.15);
      color: #ffb4a2;
      padding: 10px;
      border: 1px solid #ff7e5f;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.95em;
    }
  </style>
</head>
<body>
  <section>
    <div class="login">
      <h2>Login</h2>
      <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('auth/login') ?>">
        <div class="inputBox">
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="inputBox">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p style="font-size: 0.9em;">
          Don't have an account?
          <a href="<?= site_url('auth/register'); ?>">Register here</a>
        </p>
      </div>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
