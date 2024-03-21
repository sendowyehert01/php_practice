<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <p class="mb-6">
        <a href="/notes" class="text-blue-500 underline">Go Back</a>
      </p>
          <p><?= $note['body'] ?></p>

          <form action="" method="POST" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="text-sm text-red-500">Delete</button>
          </form>
    </div>
  </main>
  
<?php require base_path('views/partials/foot.php') ?>