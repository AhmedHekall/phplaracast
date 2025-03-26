<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => 'My Notes']) ?>


<main>
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <ul>
                     <?php foreach ($notes as $note): ?>
                            <li class="mt-6">
                                   <a href="/note?id=<?= $note['id']; ?>" class="text-blue-500 hover:underline">
                                          <?= htmlspecialchars($note['body'])  ?>
                                   </a>

                            </li>

                     <?php endforeach; ?>

              </ul>


              <p class="mt-6">
                     <a class="text-black-500 hover:underline" href="/note/create">Create New </a>
              </p>
       </div>
</main>
<?php view('partials/footer.php') ?>