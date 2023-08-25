<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
    <h2>Login</h2>
    <form id="loginForm">
        <!-- Username -->
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <!-- Password -->
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <!-- Button Login -->
        <button type="submit">Login</button>
    </form>
    <p class="text">Haven't registered yet? <a href="<?= site_url('register') ?>">Register</a></p>
    <p class="or">Or</p>
    <form id="loginWithSSO">
        <!-- Register with Udinus -->
        <!-- Button Login -->
        <!-- <a href="<?= site_url('ssoLogin') ?>"><button type="submit" class="sso">Login with Udinus</button></a> -->
        <button type="button" class="sso" onclick="window.location.href='<?= site_url('sso/ssoLogin') ?>'">Login with Udinus</button>
        <button type="button" class="sso" onclick="window.location.href='<?= site_url('auth/google') ?>'">Login with Google</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    url: '/api/login', // Your API endpoint
                    method: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        window.location.href = '/home';
                    },
                    error: function(xhr, status, error) {
                        alert('Login failed!');
                    }
                });
            });
        });
    </script>
<?= $this->endSection() ?>
