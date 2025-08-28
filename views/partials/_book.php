<div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
  <div class="flex gap-2">
    <div class="w-1/3">
      <img src="<?= $book->image ?>" alt="Imagem do Livro" class="w-60 rounded">
    </div>

    <div class="flex flex-col gap-1">
      <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline">
        <?= $book->title ?>
        (<?= $book->year_of_release ?>)
      </a>
      <div class="text-xs italic"><?= $book->author ?></div>
      <div class="text-xs italic"><?= str_repeat('⭐', (int)($book->note_review ?? 0)) ?>(<?= $book->count_reviews ?? 0 ?> Avaliações)</div>
    </div>
  </div>

  <div class="text-sm mt-2"><?= $book->description ?></div>
</div>