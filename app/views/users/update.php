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

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #7e57c2, #4fc3f7);
      background-attachment: fixed;
    }

    .form-container {
      width: 420px;
      padding: 45px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      color: #fff;
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .form-container h1 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 2em;
      font-weight: 600;
      color: #fff;
      letter-spacing: 1px;
    }

    .form-group {
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      border-radius: 8px;
      border: none;
      outline: none;
      background: rgba(255, 255, 255, 0.9);
      color: #333;
      transition: box-shadow 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      box-shadow: 0 0 0 3px rgba(126, 87, 194, 0.4);
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #7e57c2;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #7e57c2, #4fc3f7);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-submit:hover {
      opacity: 0.9;
      transform: scale(1.02);
    }

    .btn-return {
      display: block;
      text-align: center;
      margin-top: 10px;
      padding: 10px;
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 8px;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .btn-return:hover {
      background: linear-gradient(135deg, #7e57c2, #4fc3f7);
      transform: scale(1.02);
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
