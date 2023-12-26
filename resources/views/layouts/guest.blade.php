<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dalhatu Araf Specialist Hospital Vehicle Tracking</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

   {{ $slot }}

</body>

</html>

<script>
    // Toggle mobile menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>


