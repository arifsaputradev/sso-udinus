<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
    <h2>Registration</h2>
    <form id="registrationForm">
        <!-- Name -->
        <input type="text" id="name" name="name" placeholder="Name" required><br>
        <!-- Username -->
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <!-- Email -->
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <!-- Password -->
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <!-- Button Register -->
        <button type="submit">Register</button>
    </form>
    <p class="text">Have an account already? <a href="<?= site_url('login') ?>">Login</a></p>
    <p class="or">Or</p>
    <form id="registerWithSSO">
        <!-- Register with Udinus -->
        <!-- Button Register -->
        <button type="submit" class="sso">Register with Udinus</button>
    </form>
    <div id="message"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registrationForm').submit(function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    url: '/api/register', // Your API endpoint
                    method: 'POST',
                    data: {
                        name: name,
                        username: username,
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        window.location.href = '/login';
                    },
                    error: function(xhr, status, error) {
                        alert('Registration failed!');
                    }
                });
            });
        });
    </script>
<?= $this->endSection() ?>
