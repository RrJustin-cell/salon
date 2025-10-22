<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('auth');
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /** 
     * USERS LIST / INDEX PAGE 
     */
    public function index()
    {
        // Check kung may naka-login
        if (!isset($_SESSION['user'])) {
            redirect('/auth/login');
            exit;
        }

        $logged_in_user = $_SESSION['user']; 
        $data['logged_in_user'] = $logged_in_user;

        if ($logged_in_user['role'] === 'admin') {
            // Pagination setup
            $page = isset($_GET['page']) ? (int)$this->io->get('page') : 1;
            $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';
            $records_per_page = 10;

            $users = $this->UsersModel->page($q, $records_per_page, $page);
            $data['users'] = $users['records'];
            $total_rows = $users['total_rows'];

            $this->pagination->set_options([
                'first_link'     => '⏮ First',
                'last_link'      => 'Last ⏭',
                'next_link'      => 'Next →',
                'prev_link'      => '← Prev',
                'page_delimiter' => '&page='
            ]);
            $this->pagination->set_theme('custom');
            $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
            $data['page'] = $this->pagination->paginate();

        } else {
            // Regular user → only own data
            $user = $this->UsersModel->get_user_by_id($logged_in_user['id']);
            $data['users'] = [$user];
            $data['page'] = '';
        }

        $this->call->view('users/index', $data);
    }

    /** 
     * CREATE NEW USER (ADMIN ONLY)
     */
    public function create()
    {
        $error = null;

        if ($this->io->method() === 'post') {
            $username = trim($this->io->post('username'));
            $email = trim($this->io->post('email'));
            $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);
            $role = $this->io->post('role');

            $existing_user = $this->UsersModel->get_user_by_username($username);
            $existing_email = $this->UsersModel->get_user_by_email($email);

            if ($existing_user || $existing_email) {
                $error = "User with the same username or email already exists!";
            } else {
                $data = [
                    'username'   => $username,
                    'email'      => $email,
                    'password'   => $password,
                    'role'       => $role,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->UsersModel->insert($data)) {
                    redirect('/users');
                } else {
                    $error = "Failed to create user. Please try again.";
                }
            }
        }

        $this->call->view('users/create', ['error' => $error]);
    }

    /** 
     * UPDATE USER 
     */
    public function update($id)
    {
        $logged_in_user = $_SESSION['user'] ?? null;
        $user = $this->UsersModel->get_user_by_id($id);

        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($this->io->method() === 'post') {
            $username = trim($this->io->post('username'));
            $email = trim($this->io->post('email'));
            $password = $this->io->post('password');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            if (!empty($logged_in_user) && $logged_in_user['role'] === 'admin') {
                $data['role'] = $this->io->post('role');
            }

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            if ($this->UsersModel->update($id, $data)) {
                redirect('/users');
            } else {
                echo "Failed to update user.";
            }
        } else {
            $data['user'] = $user;
            $data['logged_in_user'] = $logged_in_user;
            $this->call->view('users/update', $data);
        }
    }

    /** 
     * DELETE USER 
     */
    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect('/users');
        } else {
            echo "Failed to delete user.";
        }
    }

    /** 
     * REGISTER (FOR NEW USERS)
     */
    public function register()
    {
        $error = null;

        if ($this->io->method() === 'post') {
            $username = trim($this->io->post('username'));
            $email = trim($this->io->post('email'));
            $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);
            $role = 'user';

            $existing_user = $this->UsersModel->get_user_by_username($username);
            $existing_email = $this->UsersModel->get_user_by_email($email);

            if ($existing_user || $existing_email) {
                $error = "That username or email is already taken!";
            } else {
                $data = [
                    'username'   => $username,
                    'email'      => $email,
                    'password'   => $password,
                    'role'       => $role,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->UsersModel->insert($data)) {
                    redirect('/auth/login');
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
        }

        $this->call->view('auth/register', ['error' => $error]);
    }

    /** 
     * LOGIN 
     */
    public function login()
    {
        $error = null;

        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UsersModel->get_user_by_username($username);

            if ($user && $this->auth->login($username, $password)) {
                $_SESSION['user'] = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role']
                ];
                redirect('/users');
            } else {
                $error = "Invalid username or password!";
            }
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    /** 
     * DASHBOARD (ADMIN ONLY)
     */
    public function dashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            redirect('/auth/login');
            return;
        }

        $page = isset($_GET['page']) ? (int)$this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

        $users = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $users['records'];
        $total_rows = $users['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/dashboard', $data);
    }

    /** 
     * LOGOUT 
     */
    public function logout()
    {
        $this->auth->logout();
        redirect('/auth/login');
    }
}
