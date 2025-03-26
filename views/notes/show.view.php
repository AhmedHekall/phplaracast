<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => 'Show Note']) ?>

<main>
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <p class="mb-6">
                     <a href="/notes" class="text-red-500 hover:underline"> GoBack..</a>

              </p>

              <li class="mb-5">
                     <?= htmlspecialchars($note['body']) ?>
              </li>
              <div class="mt-6 flex items-center justify-end gap-x-6">

                     <footer class="mt-6">

                            <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                   href="note/edit?id=<?= $note['id'] ?>">Edit</a>
                     </footer>



                     <form class="mt-6" method="post" action="/note">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                            <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                   type="submit">DELETE</button>

                     </form>
              </div>


       </div>
</main>
<?php view('partials/footer.php') ?>