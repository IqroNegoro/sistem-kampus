<!DOCTYPE html>
<!-- <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en"> -->
<html >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @routes
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>