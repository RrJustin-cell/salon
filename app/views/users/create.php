create

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

 <style>
  body {
    min-height: 100vh;
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #e6fff0, #bfffd8, #deffe9); /* light green gradient */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .glass-container {
    width: 100%;
    max-width: 480px;
    padding: 40px;
    background: rgba(240, 255, 245, 0.75);
    backdrop-filter: blur(16px);
    border-radius: 20px;
    box-shadow: 0 12px 28px rgba(51, 214, 132, 0.25);
    border: 1px solid rgba(182, 255, 193, 0.5);
    text-align: center;
  }

  h2 {
    font-size: 2em;
    font-weight: 600;
    color: #33d684; /* green */
    margin-bottom: 30px;
    letter-spacing: 1px;
  }

  .form-group input,
  .form-group select {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ccffe0;
    border-radius: 12px;
    font-size: 14px;
    background: #f0fff5;
    color: #2bb36b; /* dark green text */
    transition: 0.3s ease;
    box-sizing: border-box;
    box-shadow: inset 0 2px 6px rgba(182, 255, 193, 0.25);
  }

  .form-group input:focus,
  .form-group select:focus {
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

  .btn-return {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 22px;
    background: #33d684;
    color: #fff;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 500;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .btn-return:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(51, 214, 132, 0.3);
    background: #2bb36b;
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
</style>

</head>
<body>
  <div class="glass-container">
    <h2>Create User</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('users/create'); ?>">
      <div class="form-group">
        <input 
          type="text" 
          name="username" 
          placeholder="Username" 
          required
          value="<?= isset($username) ? html_escape($username) : '' ?>"
        >
      </div>

      <div class="form-group">
        <input 
          type="email" 
          name="email" 
          placeholder="Email" 
          required
          value="<?= isset($email) ? html_escape($email) : '' ?>"
        >
      </div>

      <div class="form-group">
        <input 
          type="password" 
          name="password" 
          id="password" 
          placeholder="Password" 
          required
        >
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="form-group">
        <input 
          type="password" 
          name="confirm_password" 
          id="confirmPassword" 
          placeholder="Confirm Password" 
          required
        >
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <select name="role" required>
          <option value="">-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role=="admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role=="user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>

      <button type="submit" class="btn-submit">Create User</button>
    </form>

    <a href="<?= site_url('users'); ?>" class="btn-return">Back</a>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
