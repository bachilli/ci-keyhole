ci-keyhole
==========

A simple auth library for CodeIgniter

Don't forget to use ci_sessions to avoid cookie hijacking!

Author
------

Philippe Bachilli Pinheiro - http://br.linkedin.com/in/bachilli

Description
-----------

CI-keyhole is a library to allow or deny some methods in a Controller in a user based role.

Configuration
-------------

Load library from autoload.php or a Controller

    $autoload['libraries'] = array('keyhole');
    $this->load->library('keyhole');
    
Edit config/keyhole.php

    $config['redirect_url'] = 'controller/method';
    $config['message'] = 'Your error message.';

Usage
-----

### All methods should be called in __construct()

Deny some method from not logged users

    $this->keyhole->deny(array('some_method_name'));
    $this->keyhole->deny(array('some_method_name', 'some_other_method'));

Allow some method to be accessed only by admins

    $this->keyhole->admin(array('admin_method_only'));
    $this->keyhole->admin(array('admin_other_method'));

Login a user with the specified $user_id

    $this->keyhole->login($user_id)

Login a admin user

    $this->keyhole->login($user_id, TRUE)

Logout user

    $this->keyhole->logout()

### Methods deny(), admin()

Redirect to url and display a $this->session->flashdata('error') message. Both configured in 'config/keyhole.php'

### Method login()

Saves a session like this:

    $this->session->set_userdata('user_id', $user_id);
    $this->session->set_userdata('logged_in', TRUE);
    $this->session->set_userdata('is_admin', TRUE);

Future
------

- [ ] Allow more user roles
- [ ] Better functions
- [ ] Suggest!



