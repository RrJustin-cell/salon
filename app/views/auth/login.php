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

    /* Login Box */
    .login {
      background: #ffffff;
      padding: 50px;
      border-radius: 20px;
      width: 400px;
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
    }

    .login .inputBox {
      position: relative;
    }

    .login .inputBox input {
      width: 100%;
      padding: 15px 45px 15px 15px;
      font-size: 1em;
      border: 2px solid #C06C84;
      border-radius: 8px;
      outline: none;
      color: #355C7D;
      transition: 0.3s;
    }

    .login .inputBox input:focus {
      border-color: #6C5B7B;
    }

    .login .inputBox ::placeholder {
      color: #999;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #6C5B7B;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, #F67280, #C06C84);
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s;
    }

    .login button:hover {
      background: linear-gradient(135deg, #C06C84, #6C5B7B);
      transform: translateY(-2px);
    }

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

    /* Error message */
    .error-box {
      background: rgba(255, 0, 0, 0.1);
      color: #d64c42;
      padding: 10px;
      border: 1px solid #d64c42;
      border-radius: 5px;
      margin-bottom: 10px;
      text-align: center;
      font-size: 0.9em;
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
          Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
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
