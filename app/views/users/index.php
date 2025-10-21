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

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #7e57c2, #4fc3f7);
      background-attachment: fixed;
    }

    .login {
      position: relative;
      padding: 50px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(18px);
      border-radius: 20px;
      width: 420px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #fff;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #ffffff;
      letter-spacing: 1px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 18px;
      font-size: 1em;
      color: #333;
      border-radius: 8px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.9);
      transition: box-shadow 0.3s ease;
    }

    .inputBox input:focus,
    .inputBox select:focus {
      box-shadow: 0 0 0 3px rgba(126, 87, 194, 0.4);
    }

    .inputBox #btn {
      width: 100%;
      padding: 14px;
      border: none;
      outline: none;
      background: linear-gradient(135deg, #7e57c2, #4fc3f7);
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.4s;
    }

    .inputBox #btn:hover {
      opacity: 0.9;
      transform: scale(1.02);
    }

    .group {
      text-align: center;
    }

    .group a {
      font-size: 0.95em;
      color: #fff;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }

    /* Password icon */
    .fa-eye, .fa-eye-slash {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #7e57c2;
    }

    /* Error box */
    .error-box {
      background-color: rgba(255, 82, 82, 0.15);
      color: #ffebee;
      padding: 12px 16px;
      border: 1px solid rgba(255, 82, 82, 0.3);
      border-radius: 8px;
      text-align: center;
      font-size: 15px;
    }
  </style>
</head>
<body>

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
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye" id="togglePassword"></i>
      </div>

      <!-- Confirm Password -->
      <div style="position: relative;">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
      </div>

      <!-- Role -->
      <select name="role" required>
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit" id="btn">Create User</button>
    </form>
  </div>

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
