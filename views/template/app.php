<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Book Wise</title>

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-200">
  <header class="bg-stone-900">
    <nav class="mx-auto max-w-screen-lg flex justify-between px-8 py-4">
      <div class="font-bold text-xl tracking-wide">Book Wise</div>
        <ul class="flex space-x-4 font-bold">
          <li><a href="/" class="text-lime-500">Explorar</a></li>
          <li><a href="/meus-livros.php" class="hover:underline">Meus Livros</a></li>
        </ul>

        <ul>
          <li><a href="/login.php">Fazer Login</a></li>
        </ul>
    </nav>
  </header>
  
  <main class="mx-auto max-w-screen-lg space-y-6 p-8">

    <?php require "views/{$view}.view.php"; ?>

  </main>
</body>

</html>