<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* Animated Violet-Orange Gradient Background */
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(-45deg, #7c3aed, #fb923c, #f97316, #8b5cf6);
      background-size: 400% 400%;
      animation: gradientShift 10s ease infinite;
    }

    @keyframes gradientShift {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    /* Glassmorphism Form Container */
    .form-container {
      width: 420px;
      padding: 40px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
      color: #fff;
      display: flex;
      flex-direction: column;
      gap: 15px;
      animation: fadeIn 1.2s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-container h1 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 2em;
      font-weight: 700;
      letter-spacing: 1px;
      color: #fff;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    /* Inputs and Select */
    .form-group {
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 45px 12px 15px;
      font-size: 1em;
      border-radius: 10px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.9);
      color: #333;
      transition: 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.7);
    }

    /* Eye Icon */
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #9333ea;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: #fb923c;
    }

    /* Buttons */
    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #7c3aed, #fb923c);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-submit:hover {
      background: linear-gradient(135deg, #5b21b6, #f97316);
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-return {
      display: block;
      text-align: center;
      margin-top: 10px;
      padding: 12px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-return:hover {
      background: linear-gradient(135deg, #8b5cf6, #f97316);
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <div class="form-group">
        <input type="password" placeholder="Password" name="password" id="password">
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
