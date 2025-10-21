<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
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
      flex-direction: column;
      background: linear-gradient(135deg, #7e57c2, #ff7043, #f48fb1);
      background-size: 300% 300%;
      animation: gradientMove 8s ease infinite;
      color: #fff;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
      text-align: center;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
    }

    a {
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    a:hover {
      color: #ffe0b2;
    }

    .container {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      width: 90%;
      max-width: 900px;
      overflow-x: auto;
    }

    .create-btn {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 20px;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .create-btn:hover {
      background: rgba(255, 255, 255, 0.35);
      transform: translateY(-2px);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    th {
      background: rgba(255, 255, 255, 0.2);
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.15);
      transition: 0.3s;
    }

    .actions a {
      display: inline-block;
      margin-right: 8px;
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 0.9em;
      font-weight: 500;
      transition: 0.3s;
    }

    .actions a:first-child {
      background: rgba(126, 87, 194, 0.6);
    }

    .actions a:first-child:hover {
      background: rgba(126, 87, 194, 0.9);
    }

    .actions a:last-child {
      background: rgba(255, 87, 34, 0.6);
    }

    .actions a:last-child:hover {
      background: rgba(255, 87, 34, 0.9);
    }

    @media (max-width: 600px) {
      th, td {
        padding: 10px;
        font-size: 0.9em;
      }
    }
  </style>
</head>
<body>

  <h1>User Management</h1>

  <div class="container">
    <a href="<?= site_url('users/create'); ?>" class="create-btn"><i class="fa fa-plus"></i> Create New User</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $user['id']; ?></td>
            <td><?= htmlspecialchars($user['username']); ?></td>
            <td><?= htmlspecialchars($user['email']); ?></td>
            <td><?= htmlspecialchars($user['role']); ?></td>
            <td class="actions">
              <a href="<?= site_url('users/edit/'.$user['id']); ?>"><i class="fa fa-pen"></i> Edit</a>
              <a href="<?= site_url('users/delete/'.$user['id']); ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
