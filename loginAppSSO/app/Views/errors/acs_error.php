<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Error</title>
</head>
<body>
    <h1>Error Information</h1>
    <?php if (!empty($errorMessage)) : ?>
        <p>Error Message: <?php echo htmlspecialchars($errorMessage); ?></p>
    <?php else : ?>
        <p>An unknown error occurred during the ACS process.</p>
    <?php endif; ?>
</body>
</html>