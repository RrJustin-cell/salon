<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
  body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #e6fff0, #bfffd8, #deffe9); /* light green gradient */
    padding: 20px;
  }

  .glass-container {
    width: 100%;
    max-width: 400px;
    padding: 40px;
    background: rgba(240, 255, 245, 0.75); /* light white/green tint */
    backdrop-filter: blur(16px);
    border-radius: 20px;
    border: 1px solid rgba(182, 255, 193, 0.5);
    box-shadow: 0 12px 28px rgba(51, 214, 132, 0.25);
    text-align: center;
  }

  h2 {
    font-size: 2em;
    font-weight: 600;
    color: #33d684; /* green */
    margin-bottom: 30px;
    letter-spacing: 1px;
  }

  .form-group input {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ccffe0;
    border-radius: 12px;
    background: #f0fff5;
    color: #2bb36b; /* dark green text */
    font-size: 14px;
    transition: 0.3s ease;
    box-shadow: inset 0 2px 6px rgba(182, 255, 193, 0.25);
    box-sizing: border-box;
  }

  .form-group input:focus {
    border-color: #33d684;
    box-shadow: 0 0 8px rgba(51, 214, 132, 0.4);
    outline: none;
  }

  .toggle-password {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 1.1em;
    color: #33d684;
  }

  .btn-submit {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #4dff94, #33d684); /* green gradient */
    color: #fff;
    font-size: 1.1em;
    font-weight: 500;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(51, 214, 132, 0.35);
  }

  .error-message {
    background: #f0fff5;
    color: #2bb36b;
    border: 1px solid #ccffe0;
    padding: 10px 15px;
    border-radius: 12px;
    margin-bottom: 20px;
    text-align: center;
    font-size: 0.9em;
  }

  .text-center a {
    color: #33d684;
    font-weight: 500;
    text-decoration: none;
    transition: 0.3s;
  }

  .text-center a:hover {
    text-decoration: underline;
  }
</style>

</head>
<body>
  <div class="glass-container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="text-center mt-4">
      <p class="text-sm">
        Don't have an account? 
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
