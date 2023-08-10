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
    <p class="text">Belum memiliki akun? <a href="#">Register</a></p>
    <p class="or">Or</p>
    <form id="loginWithSSO">
        <!-- Register with Udinus -->
        <!-- Button Register -->
        <button type="submit" class="sso">Login with Udinus</button>
    </form>

    <div id="message"></div>

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
                        $('#message').text('Login successful');
                    },
                    error: function(xhr, status, error) {
                        $('#message').text('Login failed');
                    }
                });
            });
        });
    </script>
<?= $this->endSection() ?>
