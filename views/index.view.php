<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/header.php' ?>


<main>
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <p>Hallo <?= $_SESSION['user']['email'] ?? 'Guest' ?> . this is home page</p>

       </div>
</main>
<?php require 'partials/footer.php' ?>