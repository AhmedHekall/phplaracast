<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => 'Edit Note']) ?>



<main>
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <form method="post" action="/note">
                     <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">


                                   <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                          <div class="col-span-full">
                                                 <input type="hidden" value="patch" name="_method">
                                                 <input type="hidden" value="<?= $note['id'] ?>" name="id">
                                                 <h1 class="mb-6">

                                                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Edit Note</label>
                                                 </h1>
                                                 <div class="mt-2">
                                                        <textarea name="body" id="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= $note['body'] ?></textarea>
                                                        <?php if (isset($errors['body'])):  ?>
                                                               <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                                        <?php endif ?>
                                                 </div>
                                          </div>




                                   </div>
                            </div>





                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                   <a
                                          href="/note?id=<?= $note['id'] ?>"
                                          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cencel
                                   </a>


                                   <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ubdate</button>
                            </div>
              </form>



       </div>
</main>
<?php view('partials/footer.php') ?>