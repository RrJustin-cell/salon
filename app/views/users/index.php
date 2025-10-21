<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      color: #fff;
    }

    /* Animated violet-skyblue gradient */
    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100vh;
      overflow: hidden;
      padding: 20px;
      background: linear-gradient(-45deg, #a855f7, #38bdf8, #7c3aed, #0ea5e9);
      background-size: 400% 400%;
      animation: gradientFlow 10s ease infinite;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Glassmorphic container */
    .glass-container {
      position: relative;
      margin: 40px auto;
      padding: 40px;
      width: 100%;
      max-width: 1000px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
      color: #fff;
      z-index: 200;
    }

    .glass-container h1 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 2.3em;
      font-weight: 700;
      color: #4c1d95;
      text-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 15px;
    }

    /* Buttons */
    .logout-btn {
      padding: 10px 18px;
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      border: none;
      border-radius: 8px;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background: linear-gradient(135deg, #5b21b6, #0ea5e9);
      transform: translateY(-2px);
    }

    /* Search form */
    .search-form {
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.15);
      padding: 8px 14px;
      border-radius: 12px;
      backdrop-filter: blur(6px);
    }

    .search-form input {
      border-radius: 6px;
      padding: 10px;
      border: none;
      font-size: 14px;
      color: #4c1d95;
    }

    .search-form input:focus {
      outline: none;
      box-shadow: 0 0 8px rgba(124, 58, 237, 0.7);
    }

    .search-form button {
      padding: 10px 18px;
      font-size: 14px;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      color: #fff;
      transition: 0.3s ease;
    }

    .search-form button:hover {
      background: linear-gradient(135deg, #5b21b6, #0ea5e9);
      transform: translateY(-2px);
    }

    /* Table styling */
    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      margin-bottom: 20px;
    }

    th, td {
      padding: 16px;
      text-align: center;
      font-size: 15px;
    }

    th {
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      font-size: 14px;
    }

    td {
      color: #1e3a8a;
      text-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    tr:last-child td { border-bottom: none; }

    tr:hover {
      background: rgba(255, 255, 255, 0.25);
      transition: 0.3s ease;
    }

    /* Action links */
    a {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s ease;
      margin: 0 4px;
      display: inline-block;
    }

    a[href*="update"] {
      background: #0ea5e9;
      color: #fff;
    }

    a[href*="update"]:hover {
      background: #0284c7;
      transform: translateY(-2px);
    }

    a[href*="delete"] {
      background: #9333ea;
      color: #fff;
    }

    a[href*="delete"]:hover {
      background: #7e22ce;
      transform: translateY(-2px);
    }

    /* Create button */
    .button-container {
      text-align: center;
      margin-top: 20px;
    }

    .btn-create {
      width: 50%;
      padding: 15px;
      border: none;
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      color: #fff;
      font-size: 1.25em;
      font-weight: 500;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
      display: inline-block;
      text-decoration: none;
    }

    .btn-create:hover {
      background: linear-gradient(135deg, #5b21b6, #0ea5e9);
      transform: translateY(-2px);
    }

    /* User info box */
    .user-status {
      background: rgba(255, 255, 255, 0.2);
      padding: 10px 15px;
      border-radius: 8px;
      display: inline-block;
      color: #4c1d95;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .user-status strong { font-weight: 600; }
    .user-status .username { color: #1e3a8a; font-weight: 500; }

    .user-status.error {
      background: rgba(255, 0, 0, 0.15);
      border: 1px solid #d32f2f;
      color: #d32f2f;
    }

    /* Pagination */
    .pagination-container {
      display: flex;
      justify-content: center;
      margin: 25px 0;
    }

    .pagination-container ul {
      display: flex;
      list-style: none;
      gap: 8px;
      padding: 0;
      margin: 0;
    }

    .pagination-container li a,
    .pagination-container li span {
      display: block;
      padding: 10px 16px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(6px);
      color: #fff;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .pagination-container li a:hover {
      background: linear-gradient(135deg, #7c3aed, #38bdf8);
      color: #fff;
      transform: translateY(-2px);
    }

    .pagination-container li.active span {
      background: #4c1d95;
      color: #fff;
      border-color: #7c3aed;
      font-weight: bold;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .top-bar {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
      }

      .search-form {
        width: 100%;
        justify-content: space-between;
      }

      .search-form input {
        flex: 1;
        min-width: 0;
      }

      table { font-size: 13px; }
      th, td { padding: 8px; }
      .btn-create { width: 100%; font-size: 1em; }
    }
  </style>
</head>

<body>
  <section>
    <div class="glass-container">
      <h1><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h1>

      <?php if(!empty($logged_in_user)): ?>
        <div class="user-status">
          <strong>Welcome:</strong> <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
        </div>
      <?php else: ?>
        <div class="user-status error">Logged in user not found</div>
      <?php endif; ?>

      <div class="top-bar">
        <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>

        <?php if ($logged_in_user['role'] === 'admin'): ?>
          <form action="<?=site_url('users');?>" method="get" class="search-form">
            <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
            <input name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
            <button type="submit">Search</button>
          </form>
        <?php endif; ?>
      </div>

      <div class="table-responsive">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>

          <?php foreach ($users as $user): ?>
            <tr>
              <td><?=html_escape($user['id']); ?></td>
              <td><?=html_escape($user['username']); ?></td>
              <td><?=html_escape($user['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td>*******</td>
                <td><?= html_escape($user['role']); ?></td>
              <?php endif; ?>
              <td>
                <a href="<?=site_url('/users/update/'.$user['id']);?>">Update</a>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <a href="<?=site_url('/users/delete/'.$user['id']);?>">Delete</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>

      <div class="button-container">
        <?php if ($logged_in_user['role'] === 'admin'): ?>
          <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</body>
</html>
