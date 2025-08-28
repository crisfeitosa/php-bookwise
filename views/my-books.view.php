<h1 class="mt-6 font-bold text-lg">Meus livros</h1>

<div class="grid grid-cols-4 gap-4">
  <div class="col-span-3 flex flex-col gap-4">
    <?php 
      foreach($books as $book) {
        require 'partials/_book.php';
      }
    ?>
  </div>

  <div>
    <div class="border border-stone-700 rounded">
      <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro!</h1>

      <form class="p-4 space-y-4" method="POST" action="/book-create">
        <?php if ($validations = flash()->get('validations')): ?>
          <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">
            <ul>
              <?php foreach ($validations as $validation): ?>
                <li><?= $validation ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <div class="flex flex-col">
          <label class="text-stone-400 mb-1">Título</label>
          <input type="text" name="title" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full">
        </div>

        <div class="flex flex-col">
          <label class="text-stone-400 mb-1">Autor</label>
          <input type="text" name="author" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full">
        </div>

        <div class="flex flex-col">
          <label class="text-stone-400 mb-1">Descrição</label>
          <textarea name="description" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full"></textarea>
        </div>

        <div class="flex flex-col">
          <label class="text-stone-400 mb-1">Ano de Lançamento</label>

          <select name="year_of_release" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full">
            <?php foreach(range(1800, date('Y')) as $year): ?>
              <option value="<?= $year ?>"><?= $year ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-700">Salvar</button>
      </form>
    </div>
  </div>
</div>