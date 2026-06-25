<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion de Commandes — Clients</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal { display: none !important; }
    .modal:target { display: flex !important; }
  </style>
</head>
<body class="bg-gray-50 font-sans antialiased flex">

  <div class="flex h-screen">
  <aside class="w-1/5 bg-[#1E272E] text-white flex flex-col p-6 space-y-8">
    <div class="h-16 flex items-center px-6 border-b border-gray-100">
      <a href="<?=path("dashboard","dashboard")?>" class="text-2xl font-bold text-[#00A8CC] "> 
        <i class="fa-solid fa-check-double mr-2"></i>Gestion Tache
      </a>
    </div>
    
    <nav class="space-y-2">
      <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition">
        <a href="<?=path("dashboard","dashboard")?>">
          <i class="fa-solid fa-house w-6"></i> <span>Dashboard</span>
        </a>
      </div>

      <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition">
        <a href="<?=path("tache","liste")?>">
          <i class="fa-solid fa-list-check w-6"></i> <span>Mes Tâches</span>
      </a>
          
        </a>
      </div>      
    </nav>
  </aside>


  <main class="flex-1 ml-64 min-h-screen">
          
    <?= $content ?>

  </main>

</body>
</html>
